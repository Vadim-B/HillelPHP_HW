<?php


namespace Hillel\HomeWork;


abstract class Model
{
  public static function find($id)
  {
    $sql =  'SELECT * FROM ' . strtolower(static::class) . ' WHERE id = ' . $id;
//    var_dump($sql);

    $sqlResult = array('Petr', 'petr@gmail.com', $id); // or null
    return $sqlResult;
  }

  public function create()
  {
    $cols = get_object_vars($this);
    unset($cols['id']);

    $keys = array_keys($cols);
    $values = array_values($cols);

    $sql = 'INSERT INTO ' . strtolower(static::class) . ' (' . implode(', ', $keys) . ') VALUES (' . implode(', ', $values) .')';
//    var_dump($sql);

    $newUserId = 99;
    $this->id = $newUserId;
  }

  public function update()
  {
    // если update() вызвали напрямую
    if (!$this->id) {
      throw new \InvalidArgumentException('Add user id');
    } elseif (!self::find($this->id)) {
      throw new \InvalidArgumentException('User with id: ' .$this->id . ' not found');
    }

    $cols = get_object_vars($this);
    unset($cols['id']);

    $keys = array_keys($cols);

    $sql = 'UPDATE ' . strtolower(static::class) . ' SET ' . implode(', ', array_map(fn($key) => $key . ' = ' . $cols[$key], $keys)) .' WHERE id = ' . $this->id;
    var_dump($sql);
  }

  public function save()
  {
    if (!$this->id || !self::find($this->id)) {
      return $this->create();
    }
    return $this->update();
  }

  public function delete()
  {
    if (!self::find($this->id)) {
      throw new \InvalidArgumentException('User with id: ' . $this->id . ' not found');
    }

    $sql = 'DELETE FROM ' . strtolower(static::class) . ' WHERE id = ' . $this->id;
    var_dump($sql);
  }
}
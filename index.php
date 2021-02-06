<?php

require_once './autoloader.php';

final class User extends \Hillel\HomeWork\Model
{
  protected $id;
  protected $name;
  protected $email;

  public function __construct($name, $email, $id = null)
  {
    $this->validateUserData($name, $email, $id);

    $this->setName($name);
    $this->setEmail($email);
    $this->setId($id);
  }

  public function validateUserData($name = null, $email = null, $id = null)
  {
    if ($name && !is_string($name)) {
      throw new InvalidArgumentException('Input value of name isn\'t a string. Input was: ' . $name);
    }
    if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      throw new InvalidArgumentException('Input value of email isn\'t a valid. Input was: ' . $email);
    }
    if ($id && !is_numeric($id)) {
      throw new InvalidArgumentException('Input value of id isn\'t a number. Input was: ' . $id);
    }
  }

  public function setName($name)
  {
    $this->validateUserData($name);
    $this->name = $name;
  }

  public function setEmail($email)
  {
    $this->validateUserData(null, $email);
    $this->email = $email;
  }

  public function setId($id)
  {
    $this->validateUserData(null, null, $id);
    $this->id = $id;
  }
}

$userData = User::find(1);

$user1 = new User(...$userData);
var_dump($user1);

$user2 = new User('Filip', 'filip@gmail.com');
var_dump($user2);

//$resultCreate = $user2->create();

//$resultUpdate = $user2->update();

//$resultSave = $user2->save();

//$resultDelete = $user2->delete();


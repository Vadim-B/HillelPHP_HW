<?php


class Color
{
  private $red;
  private $green;
  private $blue;

  public function __construct($redShade, $greenShade, $blueShade)
  {
    $this->setRed($redShade);
    $this->setGreen($greenShade);
    $this->setBlue($blueShade);
  }

  private function shadeValidate($value)
  {
    if (!is_int($value)) {
      throw new Exception('The passed parameter is not a number');
    } elseif ($value < 0 || $value > 255) {
      throw new Exception('The value is not a shade of color');
    }
  }

  private function setRed($shade)
  {
    $this->shadeValidate($shade);
    $this->red = $shade;
  }

  private function setGreen($shade)
  {
    $this->shadeValidate($shade);
    $this->green = $shade;
  }

  private function setBlue($shade)
  {
    $this->shadeValidate($shade);
    $this->blue = $shade;
  }

  public function getRed()
  {
    return $this->red;
  }

  public function getGreen()
  {
    return $this->green;
  }

  public function getBlue()
  {
    return $this->blue;
  }

  public function equals($secondColor)
  {
    return $this == $secondColor;
  }

  public static function getRandomColor()
  {
    return new Color(random_int(0, 255), random_int(0, 255), random_int(0, 255));
  }

  private function arithmeticMean(array $arr)
  {
    return array_sum($arr) / count($arr);
  }

  public function mix($secondColor)
  {
    $red = $this->arithmeticMean(array($secondColor->getRed(), $this->red));
    $green = $this->arithmeticMean(array($secondColor->getGreen(), $this->green));
    $blue = $this->arithmeticMean(array($secondColor->getBlue(), $this->blue));

    return new Color($red, $green, $blue);
  }
}

$color = new Color(0, 200, 200);

$isColorsEquals = $color->equals(new Color(0, 200, 201));
$randomColor = Color::getRandomColor();
$mixedColor = $color->mix(new Color(100, 100, 100));

$r = $mixedColor->getRed();
$g = $mixedColor->getGreen();
$b = $mixedColor->getBlue();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Class</title>
</head>
<body>
<h1>Сравниваемые цвета <?php echo $isColorsEquals ? '' : 'не' ?> равны.</h1>
<h2>Случайный цвет:</h2>
<div class="random-color"></div>
</body>
</html>

<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    body {
        min-height: 100vh;
        background-color: rgb(<?php echo $r,', ', $g,', ', $b ?>);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    h1 {
        text-align: center;
        margin-bottom: 40px;
    }
    h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    .random-color {
        height: 200px;
        width: 400px;
        border: 1px solid #000;
        border-radius: 5px;
        background-color: rgb(<?php echo $randomColor->getRed(),', ', $randomColor->getGreen(),', ', $randomColor->getBlue() ?>);
    }
</style>

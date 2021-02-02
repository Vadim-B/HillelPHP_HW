<?php


namespace Hillel\HomeWork;


class Currency
{
  private $isoCode;

  public function __construct($isoCode)
  {
    $this->setIsoCode($isoCode);
  }

  static private function allIsoCodes() {
    return new \Payum\ISO4217();
  }

  private function isoCodeValidation($value) {
    if (!self::allIsoCodes()->findByAlpha3($value)) {
      throw new \InvalidArgumentException('Input value ' .$value .' is not currency');
    }
  }

  public function setIsoCode($isoCode)
  {
    $this->isoCodeValidation($isoCode);
    $this->isoCode = $isoCode;
  }

  public function getIsoCode()
  {
    return $this->isoCode;
  }

  public function equals($currency) {
    return $this->isoCode == $currency->isoCode;
  }
}
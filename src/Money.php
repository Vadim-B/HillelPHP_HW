<?php


namespace Hillel\HomeWork;


class Money
{
  private $amount;
  private $currency;

  public function __construct($amount, $currency)
  {
    $this->setAmount($amount);
    $this->setCurrency($currency);
  }

  private function amountValidation($value)
  {
    if (!is_numeric($value) && !is_float($value)) {
      throw new \InvalidArgumentException('Input value of amount isn\'t a number. Input was: '.$value);
    }
  }

  public function setAmount($amount)
  {
    $this->amountValidation($amount);
    $this->amount = $amount;
  }

  public function setCurrency($currency)
  {
    $this->currency = $currency;
  }

  public function getAmount()
  {
    return $this->amount;
  }

  public function getCurrency()
  {
    return $this->currency;
  }

  public function equals ($comparableValue)
  {
    return $this->amount == $comparableValue->amount && $this->currency == $comparableValue->currency;
  }

  public function addMoney($money)
  {
    if ($this->currency != $money->currency) {
      throw new \InvalidArgumentException('The added money is in a different currency. It is ' .$this->currency .' and '.$money->currency);
    }
    $this->amount = $this->amount + $money->amount;
  }

  public function getMoney()
  {
    return $this->amount .' ' .$this->currency;
  }
}
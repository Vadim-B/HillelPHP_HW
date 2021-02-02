<?php

require_once 'autoloader.php';

$currency = new \Hillel\HomeWork\Currency('USD');
$currency2 = new \Hillel\HomeWork\Currency('EUR');

//var_dump($currency->getIsoCode());
//var_dump($currency->equals($currency2));

$money = new \Hillel\HomeWork\Money(777, $currency->getIsoCode());
$money2 = new \Hillel\HomeWork\Money(888, $currency2->getIsoCode());

var_dump($money->getMoney());

var_dump($money->equals($money2));

$money->addMoney($money2);
var_dump($money->getMoney());

<?php
namespace Mhmalekian\Mttrader;

require_once 'bootstrap.php';
$config= require_once 'config.php';

$mt4_obj = new Mt4trader($config['user'],$config['pass'],$config['host'],$config['port']);
$mt4_obj->Connect();
$res = $mt4_obj->OrderSend(new Order('EURUSD',OperationType::Buy,0.1));
print_r($res);
die();

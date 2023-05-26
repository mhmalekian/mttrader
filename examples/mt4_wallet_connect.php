<?php
namespace Mhmalekian\Mttrader;

require_once 'bootstrap.php';
$config= require_once 'config.php';

$mt4_obj = new Mt4trader($config['user'],$config['pass'],$config['host'],$config['port']);
$mt4_obj->Connect();
echo $mt4_obj->GetID();
echo '\n';
die();

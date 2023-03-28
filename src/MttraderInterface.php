<?php
namespace Mhmalekian\Mttrader;
interface MttraderInterface
{
    public function Connect();
    public function GetID();
    public function ValidateConnection();
    public function Subscribe($symbol,$interval);
    public function UnSubscribe($symbol);
}

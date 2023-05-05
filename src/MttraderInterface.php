<?php
namespace Mhmalekian\Mttrader;
interface MttraderInterface
{
    public function Connect();
    public function Disconnect();
    public function AccountSummary();
    public function Quote($symbol);
    public function GetID();
    public function ValidateConnection();
    public function Subscribe($symbol,$interval);
    public function UnSubscribe($symbol);
    public function SubscribeAll($interval);
}

<?php
namespace Mhmalekian\Mttrader;


class Mt5trader extends Mttrader implements MttraderInterface
{
    const __API_BASE_URL="https://mt5.mtapi.be/";

    /**
     *
     */
    /**
     * Return id
     */
    public function GetID()
    {
        return $this->id;
    }

    /**
     * Connet Function
     */
    public function Connect($url='')
    {   if($url=='')
            $url=Mt5trader::__API_BASE_URL.'ConnectPost';
        return parent::Connect($url);
    }

    /**
     * validate object connection status
     */
    public function ValidateConnection()
    {
        $res = $this->CallApi(Mt5trader::__API_BASE_URL.'CheckConnect?id='.$this->id,false);
        //dd($res);
        if($res['code']==200 && $res['data']=='OK')
            return true;
        return false;
    }

    /**
     * Get All of symbols in forex
     */
    public function GetSymbols()
    {
        $res = $this->CallApi(Mt5trader::__API_BASE_URL.'Symbols?id='.$this->id,false);
        if($res['code']==200)
            return $res;
        return null;
    }

    /**
     * Subscribe symbole
     */
    public function Subscribe($symbol,$interval)
    {
        $res = $this->CallApi(Mt5trader::__API_BASE_URL.'Subscribe?id='.$this->id.'&symbol='.$symbol.'&interval='.$interval,false);
        if($res['code']==200 && $res['data']=='OK')
            return true;
        return false;
    }

    /**
     * UnSubscribe symbol
     */
    public function UnSubscribe($symbol)
    {
        $res = $this->CallApi(Mt5trader::__API_BASE_URL.'UnSubscribe?id='.$this->id.'&symbol='.$symbol,false);
        if($res['code']==200 && $res['data']=='OK')
            return true;
        return false;
    }

    /**
     * Subscribe All
     */
    public function SubscribeAll($interval)
    {
        $res = $this->CallApi(Mt5trader::__API_BASE_URL.'SubscribeMany?id='.$this->id.'&interval='.$interval,false);
        if($res['code']==200 && $res['data']=='OK')
            return true;
        return false;
    }



}

<?php
namespace Mhmalekian\Mttrader;


class Mt4trader extends Mttrader implements MttraderInterface
{
    const __API_BASE_URL="http://mt4.mtapi.be/";

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
            $url=Mt4trader::__API_BASE_URL.'ConnectPost';
        return parent::Connect($url);
    }

    /**
     * validate object connection status
     */
    public function ValidateConnection()
    {
        $res = $this->CallApi(Mt4trader::__API_BASE_URL,'CheckConnect?id='.$this->id,false);
        //dd($this->id);
        if($res['code']==200 && $res['data']=='OK')
            return true;
        return false;
    }




}

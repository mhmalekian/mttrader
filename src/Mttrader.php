<?php
namespace Mhmalekian\Mttrader;

class Mttrader implements MttraderInterface{
    protected $id=0;
    protected $user;
    protected $password;
    protected $host;
    protected $port;
    protected $base_url;
    function __construct($user,$password,$host,$port)
    {
        $this->user = $user;
        $this->password = $password;
        $this->host = $host;
        $this->port = $port;

    }

    //==============================Protected Methods

    protected function SetBaseUrl($base_url)
    {
        $this->base_url = $base_url;
    }

    
    /**
     * Function for call CURL API
     */
    protected function CallApi($url,$postFlag=true,$params=[])
    {
        $handle = curl_init();
        if($postFlag)
        {
            curl_setopt_array($handle,
                array(
                    CURLOPT_URL => $url,
                    // Enable the post response.
                    CURLOPT_POST       => $postFlag,
                    // The data to transfer with the response.
                    CURLOPT_POSTFIELDS => $params,
                    CURLOPT_RETURNTRANSFER     => true,
                )
            );
        }else{
            curl_setopt_array($handle,
                array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER     => true,
                )
            );
        }

        $data = curl_exec($handle);
        $httpcode = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        curl_close($handle);

        return ['data' => $data, 'code' => $httpcode];

    }
    //=====================End Of Protected Methods

    //=====================Public Functions

    /**
     * Return id
     */
    public function GetID()
    {
        return $this->id;
    }

    /**
     * MetaTrader connect api
     */
    public function Connect(){
        $params = ['user' => $this->user,
                    'password' => $this->password,
                    'host' => $this->host,
                    'port' => $this->port];

        $res =$this->CallApi($this->base_url.'ConnectPost',true,$params);
        if($res['code']==200)
        {
            $this->id = $res['data'];
            return true;
        }
        $this->id=0;
        return false;
    }

    
    /**
     * validate object connection status
     */
    public function ValidateConnection()
    {
        $res = $this->CallApi($this->base_url.'CheckConnect?id='.$this->id,false);
        //dd($this->id);
        if($res['code']==200 && $res['data']=='OK')
            return true;
        return false;
    }

    /**
     * Subscribe symbol
     */
    public function Subscribe($symbol,$interval)
    {
        $res = $this->CallApi($this->base_url.'Subscribe?id='.$this->id.'&symbol='.$symbol.'&interval='.$interval,false);
        if($res['code']==200 && $res['data']=='OK')
            return true;
        return false;
    }

    /**
     * UnSubscribe symbol
     */
    public function UnSubscribe($symbol)
    {
        $res = $this->CallApi($this->base_url.'UnSubscribe?id='.$this->id.'&symbol='.$symbol,false);
        if($res['code']==200 && $res['data']=='OK')
            return true;
        return false;
    }

    /**
     * Subscribe All
     */
    public function SubscribeAll($interval)
    {
        $res = $this->CallApi($this->base_url.'SubscribeMany?id='.$this->id.'&interval='.$interval,false);
        if($res['code']==200 && $res['data']=='OK')
            return true;
        return false;
    }


    /**
     * 
     */
    public function Disconnect()
    {

    }

    /**
     * 
     */
    public function AccountSummary(){

    }
    
    /**
     * 
     */
    public function Quote($symbol){

    }

    /**
     * 
     */
    public function SubscribeOrder()
    {}

    /**
     * 
     */
    public function OrderSend(Order $order)
    {
        $params="&symbol=".$order->getSymbol()."&operation=".$order->getOperation()->value."&volume=".$order->getVolume();
        $params.=$order->getPrice() ? "&price=".$order->getPrice() : '';
        $params.=$order->getSlippage() ? "&slippage=".$order->getSlippage() : '';
        $params.=$order->getStoploss() ? "&stoploss=".$order->getStoploss() : '';
        $params.=$order->getTakeprofit() ? "&takeprofit=".$order->getTakeprofit() : '';
        $params.=$order->getComment() ? "&comment=".$order->getComment() : '';
        $params.=$order->getStopLimitPrice() ? "&stopLimitPrice=".$order->getStopLimitPrice() : '';
        $res = $this->CallApi($this->base_url.'OrderSend?id='.$this->id.$params,false);
        return $res;
    }

}

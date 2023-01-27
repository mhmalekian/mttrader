<?php
namespace Mhmalekian\Mttrader;

class Mttrader{
    protected $id=0;
    protected $user;
    protected $password;
    protected $host;
    protected $port;
    function __construct($user,$password,$host,$port)
    {
        $this->user = $user;
        $this->password = $password;
        $this->host = $host;
        $this->port = $port;

    }

    /**
     * MetaTrader connect api
     */
    protected function Connect($url){
        $params = ['user' => $this->user,
                    'password' => $this->password,
                    'host' => $this->host,
                    'port' => $this->port];

        $res =$this->CallApi($url,true,$params);
        if($res['code']==200)
        {
            $this->id = $res['data'];
            return true;
        }
        $this->id=0;
        return false;
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

}

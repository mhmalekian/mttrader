<?php
namespace Mhmalekian\Mttrader;


class Mt4trader extends Mttrader
{
    const __API_BASE_URL="https://mt4.mtapi.be/";

    function __construct($user,$password,$host,$port)
    {
        parent::__construct($user,$password,$host,$port);
        parent::SetBaseUrl( Mt4trader::__API_BASE_URL);
    }
    
    

}

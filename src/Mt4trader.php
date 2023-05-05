<?php
namespace Mhmalekian\Mttrader;


class Mt4trader extends Mttrader
{
    const __API_BASE_URL="https://mt4.mtapi.be/";

    function __construct()
    {
        parent::SetBaseUrl( Mt4trader::__API_BASE_URL);
    }
    
    

}

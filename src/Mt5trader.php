<?php
namespace Mhmalekian\Mttrader;


class Mt5trader extends Mttrader
{
    const __API_BASE_URL="https://mt5.mtapi.be/";

    function __construct($user,$password,$host,$port)
    {
        parent::__construct($user,$password,$host,$port);
        parent::SetBaseUrl( Mt5trader::__API_BASE_URL);
    }



}

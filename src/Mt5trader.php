<?php
namespace Mhmalekian\Mttrader;


class Mt5trader extends Mttrader implements MttraderInterface
{
    const __API_BASE_URL="https://mt5.mtapi.be/";

    function __construct()
    {
        parent::SetBaseUrl( Mt5trader::__API_BASE_URL);
    }



}

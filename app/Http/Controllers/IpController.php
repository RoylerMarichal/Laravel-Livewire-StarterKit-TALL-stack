<?php

namespace App\Http\Controllers;

include 'geoiploc.php';
use Illuminate\Http\Request;

class IpController extends Controller
{
    public static function getCountry($ip, $pais)
    {
        return $pais = getCountryFromIP($ip, $pais);  //Cu
    }
}

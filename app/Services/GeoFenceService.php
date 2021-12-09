<?php

namespace App\Services;


use GuzzleHttp\Client;

class GeoFenceService
{
    public static function getDistanceFromLatLngInKm($coordinate1,$coordinate2){
        $earth_radius = 6371; // Radius of the earth in km
        $c1_lat = $coordinate1['latitude'];
        $c1_long = $coordinate1['longitude'];
        $c2_lat = $coordinate2['latitude'];
        $c2_long = $coordinate2['longitude'];
        $lat_diff = deg2rad($c2_lat - $c1_lat);
        $long_diff = deg2rad($c2_long - $c1_long);
        $a = sin($lat_diff / 2) * sin($lat_diff / 2)
            + cos(deg2rad($c1_lat)) * cos(deg2rad($c2_lat))
            * sin($long_diff / 2) * sin($long_diff / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $earth_radius * $c; // Distance in km
        return $distance;
    }

}

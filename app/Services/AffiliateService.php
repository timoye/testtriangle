<?php

namespace App\Services;


class AffiliateService
{
    public $data;
    public $data_with_distance;
    public $dublin_office;
    public $selected_data;

    public function setDublinOffice(){
        $this->dublin_office=[
            'latitude'=>'53.333780',
            'longitude'=>'-6.253470'
        ];
        return $this;
    }
    public function getData(){
        $data=file_get_contents('C:\Users\ADMIN\Downloads\testtriangle.com\affiliates.txt');

         $data= str_replace("}\n{","},{",$data);

        $this->data= json_decode("[$data]");
       return $this;
    }

    public function getDistanceForAllAffiliates(){
        $this->data_with_distance=collect($this->data)->map(function ($affiliate){
            $coordinates= [
                'latitude'=>$affiliate->latitude,
                'longitude'=>$affiliate->longitude
            ];
            $affiliate->distance_from_office=GeoFenceService::getDistanceFromLatLngInKm($coordinates,$this->dublin_office);
            return $affiliate;
        });
        return $this;
    }
    public function withinDistance($km){
        $this->selected_data =collect($this->data_with_distance)->where('distance_from_office','<=',$km)->sortBy('affiliate_id');
        return $this;
    }

    public function getSelectedData(){
        return $this->selected_data;
    }

}

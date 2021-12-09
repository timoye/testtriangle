<?php

namespace App\Services;


class AffiliateService
{
    public $data;
    public $data_with_distance;
    public $within_distance_data;
    public $dublin_office;
    public $selected_data;

    public function setDublinOffice($lat,$long){
        $this->dublin_office=[
            'latitude'=>$lat,
            'longitude'=>$long
        ];
        return $this;
    }
    public function getData($file=null){
        //$data=file_get_contents('/affiliates.txt');
        if ($file!=null){
            $data=file_get_contents($file);
        }
        else{
            $data=file_get_contents('C:\Users\ADMIN\Downloads\testtriangle.com\affiliates.txt');
        }

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
        $this->within_distance_data =collect($this->data_with_distance)
            ->where('distance_from_office','<=',$km);
        return $this;
    }

    public function selectData($select){
        $this->selected_data=$this->within_distance_data->map(function($affiliate) use($select){
            return collect($affiliate)->only($select);
        })->sortBy('affiliate_id')->toArray();
        return $this;
    }

    public function getSelectedData(){
        return array_values(array_unique($this->selected_data,SORT_REGULAR));
    }

}

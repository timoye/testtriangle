<?php

namespace App\Services;


class AffiliateService
{
    public $data;
    public $dublin_office;
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

}

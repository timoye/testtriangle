<?php

namespace App\Services;


class AffiliateService
{
    public $data;
    public function getData(){
        $data=file_get_contents('C:\Users\ADMIN\Downloads\testtriangle.com\affiliates.txt');

         $data= str_replace("}\n{","},{",$data);

        $this->data= json_decode("[$data]");
       return $this;
    }

}

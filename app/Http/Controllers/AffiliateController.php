<?php

namespace App\Http\Controllers;

use App\Services\AffiliateService;
use Illuminate\Http\Request;

class AffiliateController extends Controller
{
    public function data(){
        return (new AffiliateService())
            ->setDublinOffice('53.333780','-6.253470')
            ->getData()
            ->getDistanceForAllAffiliates()
            ->withinDistance(100)
            ->selectData(['affiliate_id','name','distance_from_office'])
            ->getSelectedData();
    }
}

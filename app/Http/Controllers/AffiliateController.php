<?php

namespace App\Http\Controllers;

use App\Services\AffiliateService;
use Illuminate\Http\Request;

class AffiliateController extends Controller
{
    public function data(){
        return (new AffiliateService())
            ->setDublinOffice()
            ->getData()
            ->getDistanceForAllAffiliates()
            ->withinDistance(100)
            ->getSelectedData();
    }
}

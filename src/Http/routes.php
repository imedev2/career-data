<?php
/**
 * Created by PhpStorm.
 * User: imedev2
 * Date: 05/12/2018
 * Time: 3:12 PM
 */

use Imedev2\Career1\Models\Company;
use Imedev2\Career1\Models\Job;

Route::get('/test', function(){

    $companies = Company::all();

    $jobs = Job::orderBy('order','ASC')
        ->select('company_id','id','title','arabic_title','description','arabic_description','no_req','visible','created_at','order','up_date','rand_url','slug')
        ->where('company_id','=',2)
            ->where('visible','=',1)
            ->get();



    return  $jobs;
});
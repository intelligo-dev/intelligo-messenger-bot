<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderByController extends TravelFlyersController {


    /**
     * @param Flyer $job
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function travelDateAsc(Flyer $job)
    {
        $job = Flyer::orderBy('created_at', 'asc')->paginate(15);

        return view('traveljobs.index', ['job' => $job]);
    }


    /**
     * @param Flyer $job
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function travelDateDesc(Flyer $job)
    {
        $job = Flyer::orderBy('created_at', 'desc')->paginate(15);

        return view('traveljobs.index', ['job' => $job]);
    }

}
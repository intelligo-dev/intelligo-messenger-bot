<?php

namespace App\Http\Controllers;

use App\Job;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderByController extends JobsController {


    /**
     * @param Job $job
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function jobDateAsc(Job $job)
    {
        $job = Job::orderBy('created_at', 'asc')->paginate(15);

        return view('jobs.index', ['job' => $job]);
    }


    /**
     * @param Job $job
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function jobDateDesc(Job $job)
    {
        $job = Job::orderBy('created_at', 'desc')->paginate(15);

        return view('jobs.index', ['job' => $job]);
    }

}
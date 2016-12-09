<?php

namespace App\Http\Controllers;

use App\Job;
use App\JobPhoto;
use App\AddPhotoToJob;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobPhotoRequest;


class JobPhotosController extends Controller {

    public function store($title, JobPhotoRequest $request) {
        $job = Job::LocatedAt($title);
        $photo = $request->file('photo');
        (new AddPhotoToJob($job, $photo))->save();
    }

    public function destroy($id) {
        JobPhoto::findOrFail($id)->delete();
        return back();
    }


}
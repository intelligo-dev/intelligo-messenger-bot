<?php

namespace App\Http\Controllers;

use App\User;
use App\Job;
use App\JobBanner;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\JobBannerRequest;
use App\Http\Requests\JobsRequest;

class JobsController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'home', 'show', 'search']]);
        parent::__construct();
    }

    public function index() {
        $job = Job::latest('created_at')->paginate(40);

        $publicUser = User::all();

        return view('jobs.index', compact('job', 'publicUser'));
    }

    public function create() {
        return view('jobs.create');
    }

    public function home() {

        $job = Job::latest('created_at')->paginate(4);

        $publicUser = User::all();

        return view('jobs.home', compact('job', 'publicUser'));
    }
    
    public function store(JobsRequest $request) {

        $job = $this->user->publish(new Job($request->all()));

        $user = Auth::user();

		event('UserCreatedJob', $user);

        flash()->success('Амжилттай', 'Амжилттай ажил нэмэгдлээ');

        return redirect($job->pathToJob());
    }


    public function show($title) {
        $job = Job::LocatedAt($title);

        return view('jobs.show', compact('job'));
    }

    public function edit($id) {
        $job = Job::where('user_id', '=', Auth::user()->id)->find($id);

        if (!$job) {
            return redirect('jobs');
        }

        return view('jobs.edit', compact('job'));
    }


    public function update($id, JobsRequest $request) {
        $job = Job::findOrFail($id);

        $job->update($request->all());

        flash()->success('Амжилттай', 'Ажлын мэдээлэл амжилттай шинэчиллээ!');

        return redirect('jobs');
    }


    public function delete($id, Job $job) {

        $job = Job::findOrFail($id);

        $job->delete();

        flash()->success("Амжилттай", "Ажлын мэдээлэл амжилттай устгалаа!");

        return redirect()->back();

    }

    public function addBannerPhoto($title, JobBannerRequest $request) {
        $photo = JobBanner::fromFile($request->file('photo'))->upload();

        Job::LocatedAt($title)->addBannerPhoto($photo);
    }

    public function destroyBannerPhoto($id) {

        JobBanner::findOrFail($id)->delete();

        return redirect()->back();

    }

    public function getLike($jobId) {
        $job = Job::find($jobId);

        if (!$job) {
           return redirect('/');
        }

        if (Auth::user()->hasLikedJob($job)) {
           return redirect()->back();
        }

        $like = $job->likes()->create([]);

        Auth::user()->likes()->save($like);

        return redirect()->back();

    }

    public function search() {
        $keyword = Input::get('keyword');

        $jobs = Job::where('title', 'LIKE', '%' .$keyword. '%')->orWhere('location', 'LIKE', '%' .$keyword. '%')->get();

        if ($jobs->isEmpty()) {
            flash()->info('Үр дүн олдсонгүй', 'Таны хайлтанд тохирох үр дүн олдсонгүй.');
            return redirect('jobs');
        }

        return view('jobs.search', ['jobs' => $jobs]);
    }


}

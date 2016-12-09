<?php

namespace App\Http\Requests;

use App\Job;
use App\Http\Requests\Request;

class JobPhotoRequest extends Request
{
    public function authorize()
    {
        return Job::where([
            'title'  => $this->title,
            'user_id' => $this->user()->id
        ])->exists();
    }

    public function rules()
    {
        return [
            'photo' => 'required|mimes:jpeg,jpg,png,bmp'
        ];
    }
}
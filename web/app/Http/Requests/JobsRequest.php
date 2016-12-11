<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class JobsRequest extends Request {

    public function authorize()
    {
        return true;
    }
    
    public function rules() {
        return [
            'title'       => 'required|max:75|min:3',
            'excerpt'     => 'required|max:250|min:1',
            'description' => 'required|max:3000|min:10',
            'location'    => 'required|max:100|min:3',
            'lat'         => 'required',
            'lng'         => 'required',
        ];
    }
}
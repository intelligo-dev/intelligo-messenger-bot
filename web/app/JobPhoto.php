<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class JobPhoto extends Model
{
    //
    protected $table = "job_photos";

    /**
     * @var array
     */
    protected $fillable = ['name', 'path', 'thumbnail_path'];


    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function job() {
        return $this->belongsTo('App\Job');
    }

    public function baseDir() {
        return 'web/public/JobPhotos/photos';
    }


    public function setNameAttribute($name) {
        $this->attributes['name'] = $name;

        //
        $this->path = $this->baseDir() . '/' . $name;

        //
        $this->thumbnail_path = $this->baseDir() . '/th-' . $name;
    }


    /**
     * @throws \Exception
     */
    public function delete() {

        \File::delete([
            $this->path,
            $this->thumbnail_path
        ]);

        parent::delete();
    }

}

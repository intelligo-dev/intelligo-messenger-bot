<?php

namespace App;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class AddPhotoToJob
{
    //

    /**
     * @var хямдрал
     */
    protected $job;

    protected $file;

    public function __construct(Job $job, UploadedFile $file, Thumbnail $thumbnail = null) {
        $this->job = $job;
        $this->file = $file;
        $this->thumbnail = $thumbnail ?: new Thumbnail;
    }

    public function save() {

        $photo = $this->job->addPhoto($this->makePhoto());

        $this->file->move($photo->baseDir(), $photo->name);

        $this->thumbnail->make($photo->path, $photo->thumbnail_path);
    }



    protected function makePhoto() {
       return new JobPhoto(['name' => $this->makeFilename()]);
    }


    protected function makeFilename() {

        $name = sha1 (
            time() . $this->file->getClientOriginalName()
        );

        $extension = $this->file->getClientOriginalExtension();

        return "{$name}.{$extension}";
    }

}

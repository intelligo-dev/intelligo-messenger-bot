<?php

namespace App;

use Image;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class JobBanner extends Model
{
    //
    protected $table = "job_banner";

    /**
     * @var array
     */
    protected $fillable = ['name', 'path', 'thumbnail_path'];

    /**
     * @var
     */
    protected $file;

    /**
     * @var
     */
    protected $name;


    public function job() {
      return $this->belongsTo('App\Job');
    }


    /**
     *
     * @param UploadedFile $file
     * @return static
     */
    public static function fromFile(UploadedFile $file) {
        $photo = new static;

        $photo->file = $file;

        $photo->fill([
            'name' => $photo->setFileName(),
            'path' => $photo->filePath(),
            'thumbnail_path' => $photo->thumbnailPath()
        ]);

        // return the photo
        return $photo;

    }


    /**
     * Get the banner photos base directory.
     */
    public function baseDir() {
        return 'web/public/JobBanner/photos';
    }


    /**
     * Get the name and extension of the banner photo.
     *
     * @return string
     */
    public function setFileName() {
        // Get the file name original name
        // and encrypt it with sha1
        $hash = sha1 (
            $this->file->getClientOriginalName()
        );

        // Get the extension of the photo.
        $extension = $this->file->getClientOriginalExtension();

        // Then set name = merge those together.
        return $this->name = "{$hash}.{$extension}";
    }



    /**
     *  Return the full file path of the banner photo, with the name.
     *
     * @return string
     */
    public function filePath() {
        return $this->baseDir() . '/' . $this->name;
        // Ex: 'BannerPhoto/photos/foo.jpg'
    }


    /**
     * Return the full file thumbnail path of the banner photo, with the name.
     *
     * @return string
     */
    public function thumbnailPath() {
        return $this->baseDir() . '/tn-' . $this->name;
        // Ex: 'BannerPhoto/photos/tn-foo.jpg'
    }


    /**
     *
     * @return $this
     */
    public function upload() {
        $this->file->move($this->baseDir(), $this->name);

        $this->makeThumbnail();

        return $this;
    }

    protected function makeThumbnail() {
        Image::make($this->filePath())
            ->fit(2000, 800)
            //->resize(null, 400, function ($constraint) {
             //   $constraint->aspectRatio();
             //   $constraint->upsize();
            //})
            ->save($this->thumbnailPath());
    }

    public function delete() {

        $image = $this->path;
        $thumbnail_image = $this->thumbnail_path;

        \File::delete([
            $image,
            $thumbnail_image
        ]);

        parent::delete();
    }

}

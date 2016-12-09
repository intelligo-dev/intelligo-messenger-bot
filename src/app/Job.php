<?php

namespace App;

use App\User;
use App\JobBanner;
use App\JobPhoto;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //

    protected $table = "jobs";

    protected $fillable = [
        'title',
        'excerpt',
        'description',
        'location',
        'lat',
        'lng'
    ];


    /**
     *
     * @param $title
     * @return mixed
     */
    public static function LocatedAt($title) {
        return static::where(compact('title'))->firstOrFail();
    }


    /**
     *
     * @param $id
     * @return mixed
     */
    public static function LocatedAtID($id) {
        return static::where(compact('id'))->firstOrFail();
    }


    /**
     *
     * @param \App\JobPhoto $JobPhoto
     * @return Model
     */
    public function addPhoto(JobPhoto $JobPhoto) {
        return $this->photos()->save($JobPhoto);
    }


    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos() {
        return $this->hasMany('App\JobPhoto');
    }


        /**
         *
         * @param \App\JobBanner $JobBanner
         * @return Model
         */
        public function addBannerPhoto(JobBanner $JobBanner) {
            return $this->bannerPhotos()->save($JobBanner);
        }

        /**
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function bannerPhotos() {
            return $this->hasMany('App\JobBanner');
        }



    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner() {
        return $this->belongsTo('App\User', 'user_id');
    }


    /**
     * @param User $user
     * @return boolean
     */
    public function ownedBy(User $user) {
        return $this->user_id == $user->id;
    }


    /**
     *
     * @return mixed
     */
    public function pathToJob() {
        return $this->title;
    }


    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function likes() {
       return $this->morphMany('App\Like', 'likeable');
    }

}

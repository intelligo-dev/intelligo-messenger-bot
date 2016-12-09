<?php


Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'PagesController@index');

    Route::get('register/confirm/{token}', 'AuthController@confirmEmail');

    Route::get('/register', [
        'uses' => '\App\Http\Controllers\AuthController@getRegister',
        'as'   => 'auth.register',
        'middleware' => ['guest']
    ]);
    Route::post('/register', [
        'uses' => '\App\Http\Controllers\AuthController@postRegister',
        'as'   => 'auth.register',
    ]);
    Route::get('/login', [
        'uses' => '\App\Http\Controllers\AuthController@getLogin',
        'as'   => 'auth.login',
        'middleware' => ['guest']
    ]);
    Route::post('/login', [
        'uses' => '\App\Http\Controllers\AuthController@postLogin',
        'as'   => 'auth.login',
        'middleware' => ['guest'],
    ]);
    Route::get('/logout', [
        'uses' => '\App\Http\Controllers\AuthController@logout',
        'as'   => 'auth.logout'
    ]);

    /**************************
     * Password Reset Routes
     *************************/
    Route::get('/password/email', '\App\Http\Controllers\PasswordController@getEmail');
    Route::post('/password/email', '\App\Http\Controllers\PasswordController@postEmail');
    Route::get('/password/reset/{token}', '\App\Http\Controllers\PasswordController@getReset');
    Route::post('/password/reset', '\App\Http\Controllers\PasswordController@postReset');



    /*****************
     * Profile Routes
     ****************/
    Route::group(["middleware" => 'custom'], function(){

        // Get Profile Dashboard
        Route::get('/user/{username}', [
            'uses' => '\App\Http\Controllers\ProfileController@getDashboardProfile',
            'as'   => 'profile.index',
            'middleware' => ['auth'],
        ]);
        // Get Your Flyers
        Route::get('/user/{username}/jobs', [
            'uses' => '\App\Http\Controllers\ProfileController@getUserFlyers',
            'as'   => 'profile.your-jobs',
            'middleware' => ['auth'],
        ]);
        // Get Edit profile
        Route::get('/user/{username}/edit', [
            'uses' => '\App\Http\Controllers\ProfileController@getEditProfile',
            'as'   => 'profile.edit-profile',
            'middleware' => ['auth']
        ]);
        /** Get a Users travel Flyers to display in their Profile */
        Route::get('{username}/jobs', [
            'uses' => '\App\Http\Controllers\ProfileController@showFlyerForProfile',
            'as'   => 'profile.your-jobs',
            'middleware' => ['auth']
        ]);

    });

    /** Edit Profile. **/
    Route::post('/user/{username}/edit', [
        'uses' => '\App\Http\Controllers\ProfileController@editProfile',
        'as'   => 'profile.edit-profile',
        'middleware' => ['auth']
    ]);

    /** Submit a post request for profile photo upload **/
    Route::post('{username}/photos', 'ProfileController@addPhoto');

    /** Delete Profile photo. */
    Route::delete('{id}', [
        'uses' => '\App\Http\Controllers\ProfileController@destroyPhoto',
        'as'   => 'profile.delete'
    ]);

});




Route::group(['middleware' => ['web']], function () {

    /** Resource Route For Travel Flyers */
    Route::resource('jobs', 'JobsController');

    /** Show a Flyer. **/
    Route::get('{title}', 'JobsController@show');

    /** Delete travel job. **/
    Route::delete('/job/{id}', [
        'uses' => '\App\Http\Controllers\JobsController@delete',
        'as'   => 'profile.destroy',
    ]);

    /** Add a photo to a job **/
    Route::post('{title}/photo', 'FlyerPhotosController@store');

    /** Delete Flyer photo **/
    Route::delete('photos/{id}', 'FlyerPhotosController@destroy');

    /** Add a photo banner to a job **/
    Route::post('{title}/banner', 'JobsController@addBannerPhoto');

    /** Delete Flyer Banner photo **/
    Route::delete('photo/{id}', [
        'uses' => '\App\Http\Controllers\JobsController@destroyBannerPhoto',
        'as'   => 'job.delete.banner',
    ]);

    /** Route to like a travel Flyer. **/
    Route::get('job/{jobId}/like', [
        'uses' => '\App\Http\Controllers\JobsController@getLike',
        'as'   => 'job.like',
        'middleware' => ['auth']
    ]);

    /** Route to like a status. **/
    Route::get('status/{statusId}/like', [
        'uses' => '\App\Http\Controllers\StatusController@getLike',
        'as'   => 'status.like',
        'middleware' => ['auth']
    ]);

    /** Route to sort travel Flyers by Date asc */
    Route::get('jobs/date/asc', [
        'uses' => '\App\Http\Controllers\OrderByController@travelDateAsc',
        'as'   => 'jobs.asc',
    ]);

    /** Route to sort travel Flyers by Date desc */
    Route::get('jobs/date/desc', [
        'uses' => '\App\Http\Controllers\OrderByController@travelDateDesc',
        'as'   => 'jobs.desc',
    ]);

    /** Route to search travel jobs */
    Route::post('jobs/search',[
        'uses' => '\App\Http\Controllers\JobsController@search',
        'as'   => 'jobs.search',
    ]);


    /****************
    * Status Routes
    ****************/

    // Post a status on your public profile.
    Route::post('/status', [
        'uses' => '\App\Http\Controllers\StatusController@postStatus',
        'as' => 'status.post',
    ]);
    // post a reply on any ones public profile.
    Route::post('/status/{statusId}/reply', [
        'uses' => '\App\Http\Controllers\StatusController@postReply',
        'as' => 'status.reply',
    ]);


    /** Leaderboards Route **/
    Route::get('leaderboards/index', [
        'uses' => '\App\Http\Controllers\PagesController@leaderBoards',
        'as'   => 'leaderboards.index',
    ]);

    /** Get a users public Profile */
    Route::get('/profile/{id}', [
        'uses' => '\App\Http\Controllers\ProfileController@showPublicProfile',
        'as'   => 'users.show',
    ]);

});

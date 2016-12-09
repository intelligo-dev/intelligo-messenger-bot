<?php


/**
 * @param null $title
 * @param null $message
 * @return \Illuminate\Foundation\Application|mixed
 * For the flash messages.
 */
function flash($title = null, $message = null) {
    // Set variable $flash to fetch the Flash Class
    // in Flash.php
    $flash = app('App\Http\Flash');

    // If 0 parameters are passed in ($title, $message)
    // then just return the flash instance.
    if (func_num_args() == 0) {
        return $flash;
    }

    // Just return a regular flash->info message
    return $flash->message($title, $message);
}



/**
 * @param $date
 * @return bool|string
 * Format the time to this
 */
function prettyDate($date) {
    return date("M d, Y", strtotime($date));
}

function displayRandomPhotoArea() {
    $photoAreas = array(
        "/src/public/css/images/default-banners/01.png",
        "/src/public/css/images/default-banners/02.png",
        "/src/public/css/images/default-banners/03.png",
        "/src/public/css/images/default-banners/04.jpg",
        "/src/public/css/images/default-banners/05.jpg",
        "/src/public/css/images/default-banners/06.jpg",

    );

    $randomNumber = rand(0, (count($photoAreas) - 1));

    echo '<img src="' . $photoAreas[$randomNumber] . '" id="Job-Banner-Default-Image" ">';
}


    /*
    |--------------------------------------------------------------------------
    | Badge Images
    |--------------------------------------------------------------------------
    |
    | These functions are for the User badges. Each function returns an image
    | for a particular badge.
    |
    */


/********************************* Point Badge Images *********************************/

function ShowPointsFor100() {
    return '/src/public/Badges/Point-Badges/100-points.png';
}

function ShowPointsFor100Shaded() {
    return '/src/public/Badges/Point-Badges/100-points-shaded.png';
}

function ShowPointsFor250() {
    return '/src/public/Badges/Point-Badges/250-points.png';
}

function ShowPointsFor250Shaded() {
    return '/src/public/Badges/Point-Badges/250-points-shaded.png';
}

function ShowPointsFor500() {
    return '/src/public/Badges/Point-Badges/500-points.png';
}

function ShowPointsFor500Shaded() {
    return '/src/public/Badges/Point-Badges/500-points-shaded.png';
}

function ShowPointsFor1000() {
    return '/src/public/Badges/Point-Badges/1000-points.png';
}

function ShowPointsFor1000Shaded() {
    return '/src/public/Badges/Point-Badges/1000-points-shaded.png';
}

function ShowPointsFor2500() {
    return '/src/public/Badges/Point-Badges/2500-points.png';
}

function ShowPointsFor2500Shaded() {
    return '/src/public/Badges/Point-Badges/2500-points-shaded.png';
}

function ShowPointsFor5000() {
    return '/src/public/Badges/Point-Badges/5000-points.png';
}

function ShowPointsFor5000Shaded() {
    return '/src/public/Badges/Point-Badges/5000-points-shaded.png';
}



/********************************* Travel Job Badge Images *********************************/

function ShowJobFor1() {
    return '/src/public/Badges/Travel-Job-Badges/first-flyer.png';
}

function ShowJobFor1Shaded() {
    return '/src/public/Badges/Travel-Job-Badges/first-flyer-shaded.png';
}

function ShowJobFor5() {
    return '/src/public/Badges/Travel-Job-Badges/fifth-flyer.png';
}

function ShowJobFor5Shaded() {
    return '/src/public/Badges/Travel-Job-Badges/fifth-flyer-shaded.png';
}

function ShowJobFor10() {
    return '/src/public/Badges/Travel-Job-Badges/tenth-flyer.png';
}

function ShowJobFor10Shaded() {
    return '/src/public/Badges/Travel-Job-Badges/tenth-flyer-shaded.png';
}

function ShowJobFor25() {
    return '/src/public/Badges/Travel-Job-Badges/twentyfifth-flyer.png';
}

function ShowJobFor25Shaded() {
    return '/src/public/Badges/Travel-Job-Badges/twentyfifth-flyer-shaded.png';
}

function ShowJobFor50() {
    return '/src/public/Badges/Travel-Job-Badges/fiftieth-flyer.png';
}

function ShowJobFor50Shaded() {
    return '/src/public/Badges/Travel-Job-Badges/fiftieth-flyer-shaded.png';
}



/********************************* Signed up Badges *********************************/


function ShowSignedUpFor7Days() {
    return '/src/public/Badges/Time-SignedUp-Badges/SignedUp-For-7.png';
}

function ShowSignedUpFor7DaysShaded() {
    return '/src/public/Badges/Time-SignedUp-Badges/SignedUp-For-7-Shaded.png';
}

function ShowSignedUpFor30Days() {
    return '/src/public/Badges/Time-SignedUp-Badges/SignedUp-For-30.png';
}

function ShowSignedUpFor30DaysShaded() {
    return '/src/public/Badges/Time-SignedUp-Badges/SignedUp-For-30-Shaded.png';
}

function ShowSignedUpFor183Days() {
    return '/src/public/Badges/Time-SignedUp-Badges/SignedUp-For-183.png';
}

function ShowSignedUpFor183DaysShaded() {
    return '/src/public/Badges/Time-SignedUp-Badges/SignedUp-For-183-Shaded.png';
}



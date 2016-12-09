@extends('home')

@section('content')

    @include('pages.partials.navigation')

    <div class="container-fluid" id="Flyers-Search-Fluid-Container">
        <div class="container" id="Flyers-Search-Sub-Container">
            <div class="" id="Flyers-Search-Jumbotron">

                <div class="col-sm-6 col-md-6">

                    {!! Form::open(array('url' => 'jobs/search')) !!}
                        <div class="typeahead-container">
                            <div class="typeahead-field">

                                <span class="typeahead-query">
                                    {!! Form::text('keyword', null, array('id' => 'job-query', 'placeholder' => 'Ажил хайх...', 'autocomplete' =>'off')) !!}
                                </span>
                                {!! Form::submit('Хайх', ['class' => 'ui inverted button', 'id' => 'Search-Button']) !!}

                            </div>
                        </div>
                    {!! Form::close() !!}

                </div>
                <div class="col-sm-3 col-md-3">
                    <a href="{{ route('jobs.desc') }}" class="ui inverted button">
                        Шинэ
                    </a>
                    <a href="{{ route('jobs.asc') }}" class="ui inverted button">
                        Хуучин
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="padding-bottom: 0;">

        <div class="col-md-6" style="padding: 0;">
            <div id="map_home"></div>
            <br><br>
        </div>

        <div class="col-md-6" id="Flyers-ShowAll-Container">
            @foreach($job as $jobs)
                <div class="col-sm-6 col-md-4">
                    <div class="row">
                        <div class="ui link cards" id="Travel-Flyer-Display-Cards">
                            <div class="card" id="Flyer-Card">
                                <div class="image">
                                    <a href="{{ route('jobs.show', $jobs->title) }}">
                                        @foreach ($jobs->bannerPhotos as $photo)
                                            <img src="/{{ $photo->thumbnail_path }}" alt="{{ $jobs->owner->username }}" data-id="{{ $photo->id }}">
                                        @endforeach
                                    </a>
                                </div>
                                <div class="content">
                                    <a href="{{ route('jobs.show', $jobs->title) }}">
                                        <h4 class="ui header"> {{ str_limit($jobs->title, $limit = 80, $end = '...') }}</h4>
                                    </a>
                                    <div class="meta"><br>
                                        @foreach ($jobs->owner->Profilephotos as $photo)
                                            <a href="{{ route('users.show', $jobs->owner->id) }}" class="avatar">
                                                <img class="ui avatar image mini" src="/travel/{{ $photo->thumbnail_path }}" alt="{{ $jobs->owner->username }}'s Profile Picture">
                                            </a>
                                        @endforeach
                                        <a href="{{ route('users.show', $jobs->owner->id) }}">
                                            <span id="Flyer-Username-Index-Page">{{ $jobs->owner->username }}</span>
                                        </a>
                                    </div><br>
                                    <div class="meta">
                                        <a>{{ str_limit($jobs->excerpt, $limit = 79, $end = '...') }}</a>
                                    </div>
                                </div>
                                <div class="extra content">
                                    <span class="right floated">
                                        {{ prettyDate($jobs->created_at) }}
                                    </span>
                                    <span>
                                        <i class="thumbs up icon"></i>{{ $jobs->likes->count() }}&nbsp;
                                        @if ($user && $user->owns($jobs))
                                            <a href="{{ route('jobs.edit', $jobs->id) }}">
                                                <i class="edit icon"></i>
                                            </a>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        {!! $job->links() !!}
    </div>  <!-- close container -->

@stop


@section('scripts.footer')
    <script type="application/javascript" src="{{ asset('src/public/js/libs/typeahead.js') }}"></script>
    <script>
                jQuery(function($) {
                // Asynchronously Load the map API
                var script = document.createElement('script');
                script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyAV4KOI-DE4LL2a9I7ySS3v1Fru0R8y60I&callback=initAutocomplete";
                document.body.appendChild(script);
            });

            function initAutocomplete() {

                var map;
                var bounds = new google.maps.LatLngBounds();
                var mapOptions = {
                    mapTypeId:google.maps.MapTypeId.TERRAIN,
                    scrollwheel: true,
                    styles: [{
                        "featureType": "administrative",
                        "elementType": "geometry",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    }, {
                        "featureType": "administrative.country",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                            "visibility": "on"
                        }]
                    }, {
                        "featureType": "administrative.province",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                            "visibility": "on"
                        }]
                    }, {
                        "featureType": "administrative.locality",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                            "visibility": "on"
                        }]
                    }, {
                        "featureType": "administrative.neighborhood",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                            "visibility": "on"
                        }]
                    }, {
                        "featureType": "administrative.land_parcel",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                            "visibility": "on"
                        }]
                    }]
                };

                // Display a map on the page
                map = new google.maps.Map(document.getElementById("map_home"), mapOptions);
                map.setTilt(5);

                // Multiple Markers
                var markers = [
                    @foreach($job as $jobs)
                        ['', {{ $jobs->lat }}, {{ $jobs->lng }} ],
                    @endforeach

                ];

                var infoWindowContent = [
                    @foreach($job as $jobs)
                    [
                        '<div class="info_content">' +
                            '<a href="{{ $jobs->title }}">' +
                                '<img class="ui top aligned small image" src="/{{ $jobs->thumbnail_path }}" alt="Test">' +
                                '<h5 id="GoogleMaps-Content-Title">{{ $jobs->title }}</h5>' +
                            '</a>' +
                        '</div>'
                    ],
                    @endforeach
                ];

                            // Display multiple markers on a map
                var infoWindow = new google.maps.InfoWindow(), marker, i;

                var image = '/src/public/css/icon.png';

                // Loop through our array of markers & place each one on the map
                for( i = 0; i < markers.length; i++ ) {
                    var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                    bounds.extend(position);
                    marker = new google.maps.Marker({
                        position: position,
                        map: map,
                        title: markers[i][0],
                        animation: google.maps.Animation.DROP,
                        icon: image
                    });

                    // Allow each marker to have an info window
                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                            infoWindow.setContent(infoWindowContent[i][0]);
                            infoWindow.open(map, marker);
                        }
                    })(marker, i));

                    // Automatically center the map fitting all markers on the screen
                    map.fitBounds(bounds);
                }

                // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
                var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
                    this.setZoom(14);
                    google.maps.event.removeListener(boundsListener);
                });

            }

        $('#job-query').typeahead({
            minLength: 1,
            source: {
                data: [
                    @foreach($job as $jobs)
                         "{{ $jobs->title }}",
                    @endforeach
                ]
            }
        });
    </script>
@stop


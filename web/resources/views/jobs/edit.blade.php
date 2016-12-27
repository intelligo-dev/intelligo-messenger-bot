@extends('home')




@section('content')

    @include('pages.partials.navigation')

    <div class="container" id="Create-Edit-Container">

        <h2 class="ui center aligned icon header">
            <i class="circular travel icon"></i>
            Оруулсан хямдралаа засах
        </h2>

        <hr>

        {!! Form::model($job, ['method' => 'PATCH', 'action' => ['JobsController@update', $job->id]]) !!}

            <div class="row">
                    {{ csrf_field() }}

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title">Гарчиг:</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') ? : $job->title }}" placeholder="Гарчиг...">
                        @if($errors->has('title'))
                            <span class="help-block">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    </div>

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('excerpt') ? ' has-error' : '' }}">
                        <label for="excerpt">Хямдралын хувь:</label>
                        <input type="text" name="excerpt" id="excerpt" class="form-control" value="{{ old('excerpt') ? : $job->excerpt }}" placeholder="Хямдралын хувь дунджаар...">
                        @if($errors->has('excerpt'))
                            <span class="help-block">{{ $errors->first('excerpt') }}</span>
                        @endif
                    </div>
                </div>


                <div class="col-md-12">

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description">Дэлгэрэнгүй тайлбар:</label>
                        <textarea class="form-control" name="description" id="description" rows="10" placeholder="Дэлгэрэнгүй тайлбар..." maxlength="3000">{{ old('description') ? : $job->description }}</textarea>
                        <div id="textarea_count"></div>
                        @if($errors->has('description'))
                            <span class="help-block">{{ $errors->first('description') }}</span>
                        @endif
                    </div>

                </div>  <!-- Close col-md-12 -->


                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                        <label>Байршил:</label>
                        <input type="text" name="location" class="form-control" id="pac-input" placeholder="Байршил хайх..." value="{{ old('location') ? : $job->location }}" >
                        @if($errors->has('location'))
                            <span class="help-block">{{ $errors->first('location') }}</span>
                        @endif
                    </div><div id="map"></div>
                </div>

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('lat') ? ' has-error' : '' }}">
                        <label for="lat">Өргөрөг:</label>
                        <input type="text" class="form-control input-sm" name="lat" id="lat" value="{{ old('lat') ? : $job->lat }}">
                        @if($errors->has('lat'))
                            <span class="help-block">{{ $errors->first('lat') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('lng') ? ' has-error' : '' }}">
                        <label for="lng">Уртраг:</label>
                        <input type="text" class="form-control input-sm" name="lng" id="lng" value="{{ old('lng') ? : $job->lng }}">
                        @if($errors->has('lng'))
                            <span class="help-block">{{ $errors->first('lng') }}</span>
                        @endif
                    </div>
                </div>


                <div class="col-md-12">
                    <hr>
                    <div class="form-group">
                        <button class="ui inverted green button">Засах</button>
                        <a href="{{ route('jobs.index') }}" class="ui inverted red button">Гарах</a>
                    </div>
                </div>

            </div>  <!-- close row -->

        {!! Form::close() !!}

    </div>  <!-- close container -->

@stop

@section('scripts.footer')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBaB_9hgeARViVKIT6O1pFKXRCSuYaol2A&libraries=places&callback=initAutocomplete"></script>
    <script>
        function initAutocomplete() {

            var lat = {{ $job->lat }};
            var lng = {{ $job->lng }};


            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: lat,
                    lng: lng
                },
                zoom: 13,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var marker = new google.maps.Marker({
                position: {
                    lat: lat,
                    lng: lng
                },
                map: map,
                animation: google.maps.Animation.DROP,
                draggable: true
            });


            var searchBox = new google.maps.places.SearchBox(document.getElementById('pac-input'));

            google.maps.event.addListener(searchBox, 'places_changed', function() {
                var places = searchBox.getPlaces();
                var bounds = new google.maps.LatLngBounds();
                var i, place;

                for (i=0; place=places[i]; i++) {
                    bounds.extend(place.geometry.location);
                    marker.setPosition(place.geometry.location);
                }

                map.fitBounds(bounds);
                map.setZoom(12);

            });

            google.maps.event.addListener(marker, 'position_changed', function() {
                var lat = marker.getPosition().lat();
                var lng = marker.getPosition().lng();

                $('#lat').val(lat);
                $('#lng').val(lng);
            });

        }
    </script>
@stop
@extends('home')

@section('content')

    @include('pages.partials.navigation')

    <div class="container" style="background-color: #fafafa;">

        <div class="col-md-12">

            @include('jobs.partials.banner-photo')
            <br>

            <div class="col-md-12">
                <div class="col-xs-6 col-sm-3 col-md-2">
                    @foreach ($job->owner->Profilephotos as $photo)
                        <a href="{{ route('users.show', $job->owner->id) }}" class="avatar">
                            <img class="ui avatar image" src="/{{ $photo->thumbnail_path }}" alt="{{ $job->owner->username }}'s Profile Picture">
                        </a>
                    @endforeach
                        <a href="{{ route('users.show', $job->owner->id) }}">
                            <span id="Flyer-Username">{{ $job->owner->username }}</span>
                        </a>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3">
                    @if ($user && $user->owns($job))
                        {{ $job->likes->count() }} {{ str_plural('like', $job->likes->count()) }}
                    @else
                            <a href="{{ route('job.like', ['jobId' => $job->id])}}" id="thumbs-like-popup">
                                <i class="thumbs outline up icon large"></i> {{ $job->likes->count() }}
                            </a>
                            <div id="popup1" class="ui custom basic popup">
                                Таалагдсан
                            </div>
                    @endif
                </div>
            </div>

            <br><br>

            <p class="text-center" id="Flyer-Title">{{ $job->title }}</p>
            <p class="text-center" id="Flyer-Sub-Description"><i class="marker icon"></i><span id="Flyer-Sub">{{ $job->location }}</span></p>
            <p class="text-center"><i>{{ $job->excerpt }}</i></p>

            <div id="Flyer-Description">
                {!! nl2br( $job->description) !!}
            </div>


            <div class="col-md-12 gallery">
                @foreach ($job->photos->chunk(4) as $set)
                    <div class="row">
                        @foreach ($set as $photo)
                            <div class="col-xs-6 col-sm-3 col-md-3 gallery_image">
                                <div class="img-wrap">
                                    <form method="post" action="/photos/{{ $photo->id }}">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="_method" value="DELETE">
                                        @if ($user && $user->owns($job))
                                            <button type="submit" class="close">&times;</button>
                                        @endif
                                        <a href="/{{ $photo->path }}" data-lity>
                                            <img src="/{{ $photo->thumbnail_path }}" alt="" data-id="{{ $photo->id }}">
                                        </a>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>

        </div>  <!-- close clo-md-12 -->

        <br>

        @if ($user && $user->owns($job))
            @if ($job->photos->count() > 36)
               <p>Хамгийн ихдээ 36 зураг оруулах боломжтой.</p>
            @else
            <div class="col-md-12" id="ProfileFormUpload">
                <h5 class="text-center">Дэлгэрэнгүй зурагнууд:</h5>
                <p>.</p>
                <form action="/travel/{{ $job->title }}/photo" method="post" class="dropzone" id="addFlyerPhotosForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                </form>
                <i>Зураг харуулах боломжгүй байна, <a href="#" onclick="window.location.reload();">Refresh</a> хийнэ үү.</i>
            </div>
            @endif
        @endif

        <div class="col-md-12">
            <br><br>
            <div id="map"></div>
            <br><br>
            <a href="{{ route('jobs.index') }}"><button class="ui inverted green button">Бүх ажлын санал</button></a>
            <br><br><hr>
        </div>

        @include('jobs.partials.job-comments')

    </div>  <!-- close container -->

@stop

@section('scripts.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.js"></script>
    <script type="application/javascript" src="{{ URL::asset('/src/public/js/dropzone.forms.js') }}"></script>
    <script type="application/javascript" src="{{ URL::asset('/src/public/js/dropzone.job.js') }}"></script>
    <script type="application/javascript" src="{{ URL::asset('src/public/js/lity.js') }}"></script>

    <!--This uses FitText.js to resize the letters when on Mobile platforms.
        This is particularly used for the Flyers Description area. -->
    <script>jQuery("#Flyer-Description").fitText(1.6, {minFontSize: '10px', maxFontSize: '18px'});</script>

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
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var marker = new google.maps.Marker({
                position: {
                    lat: lat,
                    lng: lng
                },
                map: map,
                animation: google.maps.Animation.DROP
            });
        }
    </script>
@stop
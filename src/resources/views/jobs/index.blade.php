@extends('home')

@section('content')

    @include('pages.partials.navigation')

    <div class="container-fluid" id="Flyers-Search-Fluid-Container">
        <div class="container" id="Flyers-Search-Sub-Container">
            <div class="jumbotron" id="Flyers-Search-Jumbotron">
                <div class="col-sm-9 col-md-9">

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

    <div class="container" style="padding-bottom: 18%;">

        <div class="col-md-12" id="Flyers-ShowAll-Container">
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

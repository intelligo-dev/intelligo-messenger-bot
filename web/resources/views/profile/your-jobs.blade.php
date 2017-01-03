@extends('home')

@section('content')


    @include('pages.partials.profilenavigation')

    <div class="container" id="Your-Travel-Flyers-Container">

        <h2 id="Travel-Badges">Таны оруулсан ажил</h2>

        @if (!$ProfileJobs->count())
            Та ажил оруулаагүй байна.
        @else
            @foreach($ProfileJobs as $job)
                <div class="col-sm-6 col-md-4">
                    <div class="row">
                        <div class="ui link cards" id="Travel-Flyer-Display-Cards">
                            <div class="card" id="Flyer-Card">
                                <div class="image">
                                    <a href="{{ route('jobs.show', $job->title) }}">
                                        @foreach ($job->bannerPhotos as $photo)
                                            <img src="/{{ $photo->thumbnail_path }}" alt="{{ $job->owner->username }}" data-id="{{ $photo->id }}">
                                        @endforeach
                                    </a>
                                </div>
                                <div class="content">
                                    <a href="{{ route('jobs.show', $job->title) }}">
                                        <h4 class="ui header"> {{ str_limit($job->title, $limit = 80, $end = '...') }}</h4>
                                    </a>
                                    <div class="meta"><br>
                                        @foreach ($job->owner->Profilephotos as $photo)
                                            <a href="{{ route('users.show', $job->id) }}" class="avatar">
                                                <img class="ui avatar image mini" src="/{{ $photo->thumbnail_path }}" alt="{{ $job->owner->username }}'s Profile Picture">
                                                <span id="Flyer-Username-Index-Page">{{ $job->owner->username }}</span>
                                            </a>
                                        @endforeach
                                    </div><br>
                                    <div class="meta">
                                        <a>{{ str_limit($job->excerpt, $limit = 79, $end = '...') }}</a>
                                    </div>
                                </div>
                                <div class="extra content">
                                    <span class="left floated">
                                        <a href="{{ route('jobs.show', $job->title) }}">
                                            <i class="unhide icon green large"></i>
                                        </a>
                                        <a href="{{ route('jobs.edit', $job->id) }}">
                                            <i class="edit icon blue large"></i>
                                        </a>
                                        {{ prettyDate($job->created_at) }}
                                    </span>
                                    <form method="post" action="{{ route('profile.destroy', ['id' => $job->id]) }}">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <span class="right floated">
                                            <button class="circular ui icon button red mini" onclick="return confirm('Итгэлтэй байна уу?')">
                                                <i class="remove icon"></i>
                                            </button>
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif



    </div>  <!-- Close Container -->

@endsection
<style type="text/css">
    .sale-button{
    background-color: #1ec7c0;
    border-radius: 50%;
    color: #FFF;
    height: 55px;
    width: 55px;
    padding: 6px 7px;
    text-align: center;
    text-transform: uppercase;
    z-index: 1;
    position: absolute;
    top: 8px;
    left: 8px;
    opacity: 0.8;

}
.sale-button a{
    padding-left: 1px;
    font-size: 21px !important;
    font-weight: bolder;
    color: #fff !important;
}
</style>
@extends('home')

@section('content')

    @include('pages.partials.navigation')

    <div class="container" style="padding-bottom: 0;">

        @foreach($job as $jobs)
        <div class="col-md-3" id="Flyers-ShowAll-Container">
           
            <div class="ui people shape " style="padding-left: 10px;">
                <div class="sides">
                  <div class="active side">
                    <div class="ui card" style="width: 250px;">
                     @foreach ($jobs->bannerPhotos as $photo)
                      <div class="image">

                        <img src="/{{ $photo->thumbnail_path }}" alt="{{ $jobs->owner->username }}" data-id="{{ $photo->id }}">
                      </div>
                       <div class="meta sale-button">
                            <a>{{ str_limit($jobs->excerpt, $limit = 79, $end = '...') }}</a>
                        </div>
                     @endforeach  
                      <div class="content">
                        <div class="header">
                            <a href="{{ route('jobs.show', $jobs->title) }}">{{ str_limit($jobs->title, $limit = 80, $end = '...') }}</a>
                        </div>
                        
                        <div class="description">
                          {{ str_limit($jobs->description, $limit = 80, $end = '...') }}
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
            </div>  <!-- close container -->
            @endforeach
        </div>

        {!! $job->links() !!}


@stop


@section('scripts.footer')
    <script type="application/javascript" src="{{ asset('web/public/js/libs/typeahead.js') }}"></script>
@stop


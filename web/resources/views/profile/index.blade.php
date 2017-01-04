@extends('home')

@section('content')

    @include('pages.partials.profilenavigation')

    <div class="container">

        <div class="col-md-12">
            <div class="col-sm-4 col-md-4">
                <div class="profile-content">
                    <div class="meta">Бүртгүүлсэн: {!! prettyDate($user->created_at) !!}</div>
                    <div class="meta">Сүүлд нэвтэрсэн: {!! prettyDate($user->last_login) !!}</div>
                    <div class="description">
                        @if ($user->first_name == "" && $user->first_last == "")
                            Нэр тодорхойгүй
                        @else
                            Нэр: {{$user->first_name}} {{ $user->last_name }}
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <div class="profile-content">
                    <div class="description">
                        @if ($user->country == "")
                            <i class="marker icon"></i>Улс тодорхойгүй
                        @else
                            <i class="marker icon"></i>{{$user->country}}
                        @endif
                    </div>
                    <div class="description">
                        @if ($user->gender == 'Male')
                            <i class="male icon"></i>{{$user->gender}}
                        @elseif ($user->gender == 'Female')
                            <i class="female icon"></i>{{$user->gender}}
                        @else
                            <i class="question icon"></i>Хүйс тодорхойгүй
                        @endif
                    </div>
                    <div class="description">
                        @if ($user->age > 0)
                            <i class="user icon"></i>{{$user->age}} настай
                        @else
                            <i class="user icon"></i>Нас тодорхойгүй
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <div class="profile-content">
                    <div class="description">
                        <i class="travel icon"></i>
                       {{ $user->jobs->count() }} хямдрал {{ str_plural('хямдрал', $user->jobs->count()) }}
                    </div>
                    <div class="description">
                        <i class="fa fa-diamond"></i>
                         &nbsp;{{ $user->points->points }}
                    </div>
                    <div class="description">
                        <i class="thumbs up outline icon"></i>
                        {{ $user->likes->count() }} хямдрал таалагдсан
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-12">
                <div id="Profile-Description">
                    <p id="description-text">Тайлбар:</p>
                    @if ($user->summary == "")
                        <p>Хоосон</p>
                    @else
                        {{$user->summary}}
                    @endif
                </div>
            </div>

        </div>  <!-- Close col-md-12 -->

        <div class="col-md-12" id="ProfileFormUpload">
            <hr>
            <h5 class="text-center">Өөрийн зургаа оруулна уу:</h5>
            <form action="/{{ $user->username }}/photos" method="post" class="dropzone" id="addPhotosForm" enctype="multipart/form-data">
                {{ csrf_field() }}
            </form>
        </div>


      <!--   <div class="col-md-12" id="badges-container">
            @include('profile.partials.badges')
        </div> -->

        <div class="col-md-12">
            @include('profile.partials.profile-status')
        </div>

    </div>  <!-- Close Container -->

@stop

@section('scripts.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.js"></script>
    <script type="application/javascript" src="{{ URL::asset('/web/public/js/dropzone.forms.js') }}"></script>
@stop
@extends('home')




@section('content')

    @include('pages.partials.navigation')

    <div class="container" id="Create-Edit-Container">

        <h2 class="ui center aligned icon header">
            <i class="circular travel icon"></i>
            Шинэ ажил үүсгэх
        </h2>

        <hr>

        <form method="post" action="{{ URL('jobs') }}" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="col-md-6">
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">Гарчиг:</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" placeholder="Ажлын байрны гарчиг...">
                    @if($errors->has('title'))
                        <span class="help-block">{{ $errors->first('title') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group{{ $errors->has('excerpt') ? ' has-error' : '' }}">
                    <label for="excerpt">Цалин:</label>
                    <input type="text" name="excerpt" id="excerpt" class="form-control" value="{{ old('excerpt') }}" placeholder="Цалингийн хэмжээ дунджаар...">
                    @if($errors->has('excerpt'))
                        <span class="help-block">{{ $errors->first('excerpt') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-md-12">

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description">Дэлгэрэнгүй тайлбар:</label>
                    <textarea class="form-control" name="description" id="description" rows="10" placeholder="Яг юу хийлгэх гээд байгаагаа дэлгэрэнгүй биччих..." maxlength="3000">{{ old('description') }}</textarea>
                    <div id="textarea_count"></div>
                    @if($errors->has('description'))
                        <span class="help-block">{{ $errors->first('description') }}</span>
                    @endif
                </div>

            </div>  <!-- Close col-md-12 -->


                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                        <label>Хаана хийлгэх гэж байгаагаа оруул:</label>
                        <input type="text" name="location" class="form-control" id="pac-input" placeholder="Байршил хайх..." value="{{ old('location') }}" >
                        @if($errors->has('location'))
                            <span class="help-block">{{ $errors->first('location') }}</span>
                        @endif
                    </div><div id="map"></div>
                </div>

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('lat') ? ' has-error' : '' }}">
                        <label for="lat">Өргөрөг:</label>
                        <input type="text" class="form-control input-sm" name="lat" id="lat" value="{{ old('lat') }}">
                        @if($errors->has('lat'))
                            <span class="help-block">{{ $errors->first('lat') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('lng') ? ' has-error' : '' }}">
                        <label for="lng">Уртраг:</label>
                        <input type="text" class="form-control input-sm" name="lng" id="lng" value="{{ old('lng') }}">
                        @if($errors->has('lng'))
                            <span class="help-block">{{ $errors->first('lng') }}</span>
                        @endif
                    </div>
                </div>

                <p><i>Ажилтай холбоотой зураг</i></p>

                <div class="col-md-12">
                    <hr>
                    <div class="form-group">
                        <button class="ui inverted green button">Үүсгэх</button>
                        <a href="{{ route('jobs.index') }}" class="ui inverted red button">Буцах</a>
                    </div>
                </div>

        </form>

    </div>  <!-- close container -->

    <br><br>

@stop

@section('scripts.footer')
    <script type="application/javascript" src="{{ URL::asset('web/public/js/maps/create-google-map.js') }}"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBaB_9hgeARViVKIT6O1pFKXRCSuYaol2A&libraries=places&callback=initAutocomplete"></script>
@stop


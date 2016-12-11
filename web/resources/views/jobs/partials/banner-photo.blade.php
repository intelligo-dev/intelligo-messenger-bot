
@foreach ($job->bannerPhotos as $photo)
        <div class="img-wrap-job">
            <form method="post" action="{{ route('job.delete.banner', ['id' => $photo->id]) }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <input type="hidden" name="_method" value="DELETE">
                @if ($user && $user->owns($job))
                    <button type="submit" class="close">&times;</button>
                @endif
                <img src="/{{ $photo->thumbnail_path }}" alt="{{ $job->owner->username }}" data-id="{{ $photo->id }}" id="Banner-image" class="test">
            </form>
        </div>
@endforeach





@if ($user && $user->owns($job))
    <div class="col-md-12" id="JobBannerFormUpload">
        <h5 class="text-center">Зураг:</h5>
        <form action="/{{ $job->title }}/banner" method="post" class="dropzone" id="addBannerForm" enctype="multipart/form-data">
            {{ csrf_field() }}
        </form>
    </div>
@endif

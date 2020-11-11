@extends('layouts.web',['title' => $title])

@section('content')
    @include('includes.breadcrumb')

    <!--Event Wrap Start-->
    <section class="kode_event_grid_bg">
    <div class="container">
        <div class="row">
            @foreach($videos as $video)
            <div class="col-md-4 col-sm-6">
                <div class="kode_event_wrap">
                    <figure>
                        <img src="{{ $video->snippet->thumbnails->high->url }}" alt="{{ $video->snippet->title }}">
                    </figure>
                    <div class="kode_event_des">
                        <h6><a href="{{ url('video/'.$video->id->videoId) }}">{{ $video->snippet->title }}</a></h6>
                       
                        <a href="{{ url('video/'.$video->id->videoId) }}">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!--Pagination Wrap Start-->
        <div class="kode_pagination">
            <ul class="pagination">
                @if($prev) 
                <li class="pull-left"> <a aria-label="Previous" href="{{url('videos?page='.$prev) }}">« Prev News</a></li>
                @endif

                @if($next) 
                <li class="pull-right"> <a aria-label="Next" href="{{url('videos?page='.$next) }}"> Next News »</a></li>
                @endif
            </ul>
        </div>
        <!--Pagination Wrap End-->
    </div>
</section>
<!--Event Wrap End-->
@endsection
@extends('layouts.web',['title' => $title])


@section('content')
    @include('includes.breadcrumb')
    <!--Event Wrap Start-->
    <section class="kode_event_grid_bg">
    <div class="container">
        <div class="row">
            @foreach($photos as $photo)
            <div class="col-md-4 col-sm-6">
                <div class="kode_event_wrap">
                    <figure>
                        <img src="{{ asset('storage/'.$photo->main_image) }}" alt="{{ $photo->title }}">
                    </figure>
                    <div class="kode_event_des">
                        <h6><a href="{{ url_title('view', $photo) }}">{{ $photo->title }}</a></h6>
                        
                        <a href="{{ url_title('view', $photo) }}">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!--Pagination Wrap Start-->
        <div class="kode_pagination">
            <ul class="pagination">
                {{ $photos->links() }}
            </ul>
        </div>
        <!--Pagination Wrap End-->
    </div>
</section>
<!--Event Wrap End-->
@endsection
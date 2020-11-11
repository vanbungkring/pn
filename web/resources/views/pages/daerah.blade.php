@extends('layouts.web',['title' => $title])

@include('includes.breadcrumb')

@section('content')
 <!--Team Listing Wrap Start-->
 <section class="kf_team_listing_bg">
    <div class="container">          
        <div class="row">
            @foreach($daerah as $dpd)
            <div class="col-md-4 col-sm-6">
                <div class="kode_politician dpd">
                    <figure>
                        <img src="{{ asset('images/dpd.jpg')}}" alt="dpd"/>
                        <span class="dpd">{{$dpd->title}}</span>
                    </figure>
                    <div class="kode_politician_des">
                        <h6><a href="{{url('daerah/'.$dpd->name)}}">{{$dpd->title}}</a></h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</section>
@endsection
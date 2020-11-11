@extends('layouts.web',['title' => $title])

@include('includes.breadcrumb')
@section('content')
    <!--Welcome to Democracy Wrap Start-->
    <section class="kode_about_welcome">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="kode_welcome">
                        <figure>
                            <img src="{{ asset('storage/'.$static->background)}}" alt="Image Here">
                        </figure>
                    </div>
                </div>
            
                <div class="col-md-7">
                    <div class="kode_wel_demo_des">
                        <h4>{{ $static->title}}</h4>
                       {!! $static->profile !!}
                    </div>
                </div>
                
            </div>
        </div>
    </section>
@endsection
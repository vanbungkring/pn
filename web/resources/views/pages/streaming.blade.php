@extends('layouts.web',['title' => $title])

@include('includes.breadcrumb')
@section('content')
    <!--Welcome to Democracy Wrap Start-->
    <section class="kode_about_welcome">
        <div class="container">
            <div class="row">      
                <div class="col-md-12">
                    <div class="kode_wel_demo_des">
                        <h4>{{ $static->title}}</h4>
                       {!! $static->profile !!}
                    </div>
                </div>
                
            </div>
        </div>
    </section>
@endsection

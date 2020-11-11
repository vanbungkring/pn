@extends('layouts.daerah',['title' => $title])

@section('headline')
    @include('includes.headline_daerah')
@endsection

@section('content')

@include('includes.daerah_terkini')
        
        <!--Our Latest Work Wrap Start-->
        @include('includes.gallery')
        <!--Our Latest Work Wrap End-->
        
        <!--Event Wrap Start-->

@endsection
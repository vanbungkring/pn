@extends('layouts.web')
@section('headline')
    @include('includes.headline')
@endsection
@section('content')
    @include('includes.news')
        
    <!--Program List Wrap Start-->
    <div class="kode_program_bg">
        @foreach($headlines as $key=> $headline)
            @if($key > 0)
        <div class="col-md-4">
        @if($headline->uri)
        <a class="kode_link_2" target="_blank" href="{{ $headline->uri }}">
        @else
        <a class="kode_link_2" href="{{ url_title('headline', $headline) }}">
        @endif
            <div class="kode_program_list">    
               
                    <figure>
                        <img src="{{ asset('storage/'.$headline->image) }}" alt="{{$headline->title}}">
                    </figure>
                
            </div>
            </a>
        </div>
            @endif
        @endforeach
        
    </div>
    <!--Program List Wrap Start-->    
    <!--Welcome to Democracy Wrap Start-->
    <section class="kode_welcome_bg">
        <div class="container">
            
            <ul class="kode_tab_lnk nav nav-tabs" id="tabs" data-tabs="tabs">
                @foreach($pages as $key=>$page)
                <li {{ ($key == 0) ?  'class="active"' : '' }}>
                    <a data-toggle="tab" href="#{{$page->name}}">{{$page->title}}</a>
                </li>
                @endforeach
            </ul>
            
            <div class="kode_wel_outr_wrap tab-content" id="my-tab-content">
                
                @foreach($pages as $key=> $page)
                <div class="row tab-pane  {{ ($key == 0) ?  'active' : '' }}" id="{{$page->name}}">
                    <div class="col-md-5">
                        <div class="kode_welcome">
                            <figure>
                                <img src="{{ asset('storage/'.$page->background)}}" alt="Image Here">
                            </figure>
                        </div>
                    </div>
                    
                    <div class="col-md-7">
                        <div class="kode_wel_demo_des">
                            <h4>{{ $page->title }}</h4>
                            {!! substr($page->profile,0, strpos(($page->profile),'</p>')) !!}</p>
                            <a class="kode_link_3" href="{{ url('pages/'.$page->name) }}">See More <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    
                </div>
                @endforeach    
            </div>
        </div>
    </section>
    <!--Welcome to Democracy Wrap End-->
        
        <!--Our Latest Work Wrap Start-->
        @include('includes.gallery')
        <!--Our Latest Work Wrap End-->
        <!--News & Press Release Wrap Start-->
        @include('includes.press')
        <!--News & Press Release Wrap End-->
        <!--Latest Blog Post Wrap Start-->
        
        <section class="kode_latest_outer_wrap">
        	<div class="container">
            	<div class="kode_hdg_1">
                    <h4>OPINI</h4>
                </div>
                <div class="kode_press_new_lst">
                    <div class="row">
                        @foreach($opinis as $p)
                        <div class="col-md-4 col-sm-6">
                            <div class="kode_press_news">
                                <figure class="kode_pres1_style">
                                @if(substr($p->photo,0,4) == "http" )
                                    <img src="{{ $p->photo }}" alt="{{ $p->title }}">
                                @else
                                    <img src="{{ asset('storage/'.$p->photo) }}" alt="{{ $p->title }}">
                                @endif
                                </figure>
                                <div class="kode_news_date">
                                    <ul>
                                        <li>{{ pretty_date($p->created_at) }} </li>
                                        <!--li>07 <a href="#"><i class="fa fa-heart"></i></a> </li-->
                                    </ul>
                                </div>
                                <div class="kode_news_des">
                                    <h6><a href="{{ url_title('opini', $p) }}">{{ $p->title }}</a></h6>
                                    <p></p>
                                    <a href="{{ url_title('opini', $p) }}">Read More <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="kode_pagination">
                    <a class="kode_link_3" href="{{route('opini')}}">Load More <i class="fa fa-angle-right"></i></a>
                </div>             
            </div>
        </section>
        <!--Latest Blog Post Wrap End-->
        @include('includes.daerah')

        <!--News & Press Release Wrap Start-->
        @include('includes.tags')
        
        <!--Event Wrap Start-->
        @include('includes.agenda')
        <!--Event Wrap End-->
        
        
        <!--Contact With Us Wrap Start-->
        <section class="kode_contact_bg">
        	<div class="container">
            	<div class="kode_hdg_2">
                	<h6>PROFIL</h6>
                	<h4>TEMUKAN PROFIL KADER KAMI</h4>
            	</div>
                
                <div class="row">
                    <!--Contact Us Field Wrap Start-->
                    <div class="col-md-12">
                    	<div class="kode_contact_wrap">
                            <div class="row">
                                <form method="post" class="comments-form" id="contactform">
                                        <div class="col-md-12">
                                            <div class="kode_contact_field">
                                                <input type="text" name="name" placeholder="Nama Kader">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="kode_contact_field">
                                                <select>
                                                    <option value="DPP">Kader di DPP</option>
                                                    <option value="DPD">Kader di DPD</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="kode_contact_field">
                                                <select>
                                                    <option value="Sumatera Utara">Sumatera Utara</option>
                                                    <option value="Aceh">Aceh</option>
                                                    <option value="Sumatera Barat">Aceh</option>
                                                    <option value="Lampung">Lampung</option>
                                                    <option value="Jawa Barat">Jawa Barat</option>
                                                    <option value="Bali">Bali</option>
                                                    <option value="Papua">Papua</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                                <div class="kode_contact_field">
                                                        <button><a href="{{route('anggota')}}">CARI KADER</a></button>
                                                </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--Contact Us Field Wrap End-->
                    
                </div>
                
            </div>
        </section>
        <!--Contact With Us Wrap End-->
        @if($banner) 
        <div class="splash on">
            <div class="closing">x</div>        
            <div class="butter">
            <a href="{{$banner->url}}" target="_blank"><img src="{{ asset('storage/'.$banner->image) }}"></a></div>        
        </div>
        @endif
@endsection

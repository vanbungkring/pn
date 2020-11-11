@extends('layouts.web',['title' => $title])

@section('content')
@include('includes.breadcrumb')

  <!--Team Listing Wrap Start-->
  <section class="kf_team_listing_bg">
  <div class="container">
      
      <div class="row">
          <!--Contact Us Field Wrap Start>
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
                                              <button>CARI KADER</button>
                                      </div>
                              </div>
                      </form>
                  </div>
              </div>
          </div-->
          <!--Contact Us Field Wrap End-->
          
      </div>
      
    <div class="row">
            @foreach($anggotas as $a)
            <div class="col-md-4 col-sm-6">
                <div class="kode_politician">
                    <figure>
                    @if(substr($a->photo,0,4) == "http" )
                            <img src="{{ $a->photo }}" alt="{{ $a->title }}">
                            @else
                            <img src="{{ asset('storage/'.$a->photo) }}" alt="{{ $a->title }}">
                            @endif
                        <figcaption class="kode_poli_img_des">
                            <h6>{{$a->name}}</h6>
                            <span>{{ $a->jabatan }}</span>
                            {!! $a->profile !!}
                        </figcaption>
                    </figure>
                    <div class="kode_politician_des">
                        <h6><a href="team-detail.html">{{$a->name}}</a></h6>
                        <p>{{ $a->jabatan }}</p>
                        <ul>
                            @if($a->facebook)
                            <li><a href="{{$a->facebook}}"><i class="fa fa-facebook"></i></a></li>
                            @endif
                            @if($a->twitter)
                            <li><a href="{{$a->twitter}}"><i class="fa fa-twitter"></i></a></li>
                            @endif
                            @if($a->gplus)
                            <li><a href="{{$a->gplus}}"><i class="fa fa-google-plus"></i></a></li>
                            @endif
                            @if($a->youtube)
                            <li><a href="{{$a->youtube}}"><i class="fa fa-youtube"></i></a></li>
                            @endif
                            @if($a->website)
                            <li><a href="{{$a->website}}"><i class="fa fa-globe"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--Team Listing Wrap End-->
@endsection
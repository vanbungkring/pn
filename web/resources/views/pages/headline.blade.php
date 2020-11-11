@extends('layouts.web',['title' => $title])

@include('includes.breadcrumb')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <!--News Deatail Wrap Start-->
            <div class="col-md-8">
                <div class="kode_news_detail">
                    <figure>
                            <img src="{{ asset('storage/'.$news->image) }}" alt="{{ $news->title }}">
                    </figure>
                    <h4>{{ $news->title }}</h4>
                    <ul>
                        <!--li>by <a href="#"> <span>Admin</span> </a>- 14-10-2015</li>
                        <li> <a href="#"> <i class="fa fa-heart-o"></i>144 </a> </li>
                        <li> <a href="#"> <i class="fa fa-comment-o"></i>49 </a> </li>
                        <li> <a href="#"> <i class="fa fa-eye"></i>12,998 </a> </li-->
                    </ul>
                    {!! $news->content !!}                  
                </div>
                
                <!--Recommended For You Wrap Start-->
                <div class="kode_related_event">
                    <h6>REcommended For You</h6>
                    <div class="row">
                        @foreach($mores as $more)
                        <div class="col-md-4">
                            <div class="kode_event_list">
                                <figure>
                                    <img src="{{ asset('storage/'. $more->image) }}" alt="{{ $more->title }}">
                                </figure>
                                <a href="{{ url_title('read',$more) }}">{{ $more->title }}</a>
                            </div>
                        </div>
                        @endforeach                        
                    </div>
                </div>
                <!--Recommended For You Wrap End-->
                
                <!--Next and Previous Wrap Start-->
                <div class="kf_pagination">
                    <ul class="pagination">
                        @if($prev)
                        <li class="pull-left"> <a aria-label="Previous" href="{{url_title('read',$prev)}}"><b>« Prev News</b></a></li>
                        @endif

                        @if($next) 
                        <li class="pull-right"> <a aria-label="Next" href="{{url_title('read',$next) }}"><b> Next News »</b></a></li>
                        @endif
                    </ul>
                </div>
                <!--Next and Previous Wrap End-->
                
                
            </div>
            <!--News Deatail Wrap End-->
            <div class="col-md-4">
                @include('includes.berita_terkini')
            </div>
            
        </div>
    </div>
</section>
@endsection
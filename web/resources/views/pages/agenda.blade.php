@extends('layouts.web',['title' => $title])

@section('content')
@include('includes.breadcrumb')

<section>
    <div class="container">
        <div class="row">
            <!--News Deatail Wrap Start-->
            <div class="col-md-8">
                <div class="kode_news_detail">
                    <figure>
                            <img src="{{ asset('storage/'.$news->poster) }}" alt="{{ $news->name }}">
                    </figure>
                    <h4>{{ $news->name }}</h4>
                    <ul>
                        <li> {{ pretty_date($news->created_at) }}</li>
                        <li><i class="fa fa-eye"></i>{{$views}} </li>
                        <!--li>by <a href="#"> <span>Admin</span> </a>- 14-10-2015</li>
                        <li> <a href="#"> <i class="fa fa-heart-o"></i>144 </a> </li>
                        <li> <a href="#"> <i class="fa fa-comment-o"></i>49 </a> </li>
                        <li> <a href="#"> <i class="fa fa-eye"></i>12,998 </a> </li-->
                    </ul>
                    {!! $news->content !!}
                    @include('includes.share')                   
                </div>
                
                <!--Recommended For You Wrap Start-->
                <div class="kode_related_event">
                    <h6>Agenda Lain</h6>
                    <div class="row">
                        @foreach($mores as $more)
                        <div class="col-md-4">
                            <div class="kode_event_list">
                                <figure>
                                    <img src="{{ asset('storage/'. $more->poster) }}" alt="{{ $more->title }}">
                                </figure>
                                <a href="{{ url_title('agenda', $more) }}"> {{ $more->name }}</a>
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
                        <li class="pull-left"> <a aria-label="Previous" href="{{url_title('press',$prev)}}"><b>« Prev News</b></a></li>
                        @endif

                        @if($next) 
                        <li class="pull-right"> <a aria-label="Next" href="{{url_title('press',$next) }}"><b> Next News »</b></a></li>
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
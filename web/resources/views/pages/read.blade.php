@extends('layouts.web',['title' => $title])
@section('meta')
    @include('includes.meta')
@endsection
@section('content')
@include('includes.breadcrumb')

<section>
    <div class="container">
        <div class="row">
            <!--News Deatail Wrap Start-->
            <div class="col-md-8">
                <div class="kode_news_detail">
                    <figure>
                            @if(substr($news->feature_image,0,4) == "http" )
                            <img src="{{ $news->feature_image }}" alt="{{ $news->title }}">
                            @else
                            <img src="{{ asset('storage/'.$news->feature_image) }}" alt="{{ $news->title }}">
                            @endif
                    </figure>
                    <h4>{{ $news->title }}</h4>
                    <ul>
                        <li> {{ pretty_date($news->created_at) }}</li>
                        <li><i class="fa fa-eye"></i>{{$views}} </li>
                        <!--li> <a href="#"> <i class="fa fa-heart-o"></i>144 </a> </li>
                        <li> <a href="#"> <i class="fa fa-comment-o"></i>49 </a> </li>
                        -->
                    </ul>
                    @if($news->tags)
                    <ul class="tag">
                        @foreach($news->tags as $tag)
                            <li>{{$tag->name}}</li>
                        @endforeach
                    </ul>
                    @endif
                    @if(substr($news->feature_image,0,4) == "http" )
                        <?php echo str_replace(array("\r\n", "\r", "\n"), "<br />", $news->content); ; ?>
                    @else
                        {!! $news->content !!}
                    @endif      

                @include('includes.share')                          
                </div>
                
                <!--Recommended For You Wrap Start-->
                <div class="kode_related_event">
                    <h6>BERITA TERKAIT</h6>
                    <div class="row">
                        @foreach($mores as $more)
                        <div class="col-md-4">
                            <div class="kode_event_list">
                                <figure>
                                @if(substr($more->feature_image,0,4) == "http" )
                            <img src="{{ $more->feature_image }}" alt="{{ $more->title }}">
                            @else
                            <img src="{{ asset('storage/'.$more->feature_image) }}" alt="{{ $more->title }}">
                            @endif
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

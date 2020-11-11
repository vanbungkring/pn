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
                    <iframe width="560" height="400" src="https://www.youtube.com/embed/{{$video->id}}?rel=0" frameborder="0" allowfullscreen></iframe>
                    <h4>{{ $video->snippet->title }}</h4>
                    <ul>
                        <li> {{ pretty_date($video->snippet->publishedAt) }}</li>
                        <li><i class="fa fa-eye"></i>{{$views}} </li>
                    </ul>    
                    <p>{!! $video->snippet->description !!}</p>
                    @include('includes.share')                   
                </div>
                <?php /*
                <!--Recommended For You Wrap Start-->
                <div class="kode_related_event">
                    <h6>REcommended For You</h6>
                    <div class="row">
                        @foreach($mores as $more)
                        <div class="col-md-4">
                            <div class="kode_event_list">
                                <figure>
                                    <img src="{{ asset('storage/'. $more->feature_image) }}" alt="{{ $more->title }}">
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
                */
                ?>
                
            </div>
            <!--News Deatail Wrap End-->
            <div class="col-md-4">
                @include('includes.berita_terkini')
            </div>
            
        </div>
    </div>
</section>
@endsection

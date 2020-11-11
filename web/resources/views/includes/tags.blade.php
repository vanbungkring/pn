@foreach($posts as $tags)
<section class="kode_news_bg">
        	<div class="container">
            	<div class="kode_hdg_1">
                    <h4>{{$tags['judul']}}</h4>
                </div>
                
                <div class="kode_press_new_lst">
                    <div class="row">
                        @foreach($tags['posts'] as $news)
                        <div class="col-md-4 col-sm-6">
                            <div class="kode_press_news">
                                <figure class="kode_pres1_style">
                                @if(substr($news->feature_image,0,4) == "http" )
                            <img src="{{ $news->feature_image }}" alt="{{ $news->title }}">
                            @else
                            <img src="{{ asset('storage/'.$news->feature_image) }}" alt="{{ $news->title }}">
                            @endif
                                    
                                </figure>
                                <div class="kode_news_date">
                                    <ul>
                                        <li> <a href="{{ url_title('read',$news) }}">{{ pretty_date($news->created_at)}} </a></li>
                                        <!--li>07 <a href="#"><i class="fa fa-heart"></i></a> </li-->
                                    </ul>
                                </div>
                                <div class="kode_news_des">
                                    <h6><a href="{{ url_title('read',$news) }}">{{ $news->title}}</a></h6>
                                    <a href="{{ url_title('read',$news) }}">Read More <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <div class="kode_pagination">
                <a class="kode_link_3" href="{{route('tags',['tag' => $tags['judul']])}}">Load More <i class="fa fa-angle-right"></i></a>
                </div>
                
            </div>
        </section>
@endforeach        
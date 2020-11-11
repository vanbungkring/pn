<!--News & Press Release Wrap Start-->
<section>
<div class="container">
    
    <div class="kode_hdg_1">
        <h4>BERITA</h4>
    </div>
    
    <div class="row">
                @foreach($news as $new)
                <div class="col-md-4 col-sm-6">
                    <div class="kode_press_news">
                        <figure class="kode_pres1_style">
                        @if(substr($new->feature_image,0,4) == "http" )
                            <img src="{{ $new->feature_image }}" alt="{{ $new->title }}">
                            @else
                            <img src="{{ asset('storage/'.$new->feature_image) }}" alt="{{ $new->title }}">
                            @endif
                        </figure>
                        <div class="kode_news_date">
                            <ul>
                                <li> <a href="{{ url_title('read',$new) }}">{{ pretty_date($new->created_at) }} </a></li>
                                <!--li>07 <a href="#"><i class="fa fa-heart"></i></a> </li-->
                            </ul>
                        </div>
                        <div class="kode_news_des">
                            <h6><a href="{{ url_title('read',$new) }}">{{ $new->title}}</a></h6>
                            <a href="{{ url_title('read',$new) }}">Read More <i class="fa fa-long-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        <div class="kode_pagination">
        <a class="kode_link_3" href="{{route('news')}}">Load More <i class="fa fa-angle-right"></i></a>
        </div>
        
    </div>
</section>

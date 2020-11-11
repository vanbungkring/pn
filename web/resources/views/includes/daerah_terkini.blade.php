<section>
    <div class="container">
        
        <div class="kode_hdg_1">
            <h4>BERITA</h4>
        </div>
        
        <div class="kode_press_new_lst">
            <div class="row">
                @foreach($news as $new) 
                <div class="col-md-4 col-sm-6">
                    <div class="kode_press_news">
                        <figure class="kode_pres1_style">
                            <img src="{{ asset('storage/'. $new->feature_image )}}" alt="{{ $new->title }}">
                        </figure>
                        <div class="kode_news_date">
                            <ul>
                                <li>{{ pretty_date($new->created_at) }} </li>
                            </ul>
                        </div>
                        <div class="kode_news_des">
                            <h6><a href="{{ url_title('read', $new) }}">{{ $new->title }}</a></h6>
                            
                            <a href="{{ url_title('read', $new) }}">Read More <i class="fa fa-long-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="pagination">
        <a class="kode_link_3" href="{{url('/berita',Request::segment(2))}}">Load More <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
</section>

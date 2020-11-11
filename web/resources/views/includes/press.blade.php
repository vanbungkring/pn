<section class="kode_news_bg">
    <div class="container">
        <div class="kode_hdg_1">
            <h4>SOSOK</h4>
        </div>
        
        <div class="kode_press_new_lst">
            <div class="row">
                @foreach($press as $p)
                <div class="col-md-4 col-sm-6">
                    <div class="kode_press_news">
                        <figure class="kode_pres1_style">
                            <img src="{{ asset('storage/'.$p->image) }}" alt="{{ $p->title }}">
                        </figure>
                        <div class="kode_news_date">
                            <ul>
                                <li>{{ pretty_date($p->created_at) }} </li>
                                <!--li>07 <a href="#"><i class="fa fa-heart"></i></a> </li-->
                            </ul>
                        </div>
                        <div class="kode_news_des">
                            <h6><a href="{{ url_title('sosok', $p) }}">{{ $p->title }}</a></h6>
                            <p></p>
                            <a href="{{ url_title('sosok', $p) }}">Read More <i class="fa fa-long-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        <div class="kode_pagination">
        <a class="kode_link_3" href="{{route('sosok')}}">Load More <i class="fa fa-angle-right"></i></a>

        </div>
        
    </div>
</section>

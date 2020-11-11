<section class="kode_event_grid_bg">
    <div class="container">
        <div class="kode_hdg_1">
            <h4>JADWAL</h4>
        </div>
        <div class="row">
            <div class="col-md-12 kode_news_colmn_list">
            @foreach($agendas as $agenda)    
                <div class="kode_news_list">
                    <figure>
                        <img src="{{ asset('storage/'.$agenda->poster) }}" alt="News List Image">
                    </figure>
                    <div class="kode_news_list_des">
                    <h6><a href="{{ url_title('agenda', $agenda) }}">{{ $agenda->name }}</a></h6>
                        <ul>
                            <li> <i class="fa fa-calendar"></i> {{$agenda->start_date}} </li><br/>
                            <li> <i class="fa fa-clock-o"></i> {{ $agenda->end_date}} </li><br/>
                            <li>  
                                <i class="fa fa-map-marker"></i>
                                {{ $agenda->location }}
                            </li><br/>
                        </ul>
                        @if(strlen($agenda->content) > 120)
                            <p>{!! substr($agenda->content,0,119) !!}...</p>
                        @else
                            {!! $agenda->content !!}
                        @endif
                    </div>
                </div>
            @endforeach         
        </div>
        <!--Pagination Wrap Start-->
        <div class="kode_pagination">
        <a class="kode_link_3" href="{{route('agenda')}}">Load More <i class="fa fa-angle-right"></i></a>
        </div>
        <!--Pagination Wrap End-->
    </div>
</section>

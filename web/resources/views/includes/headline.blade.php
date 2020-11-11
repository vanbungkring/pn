<div class="kode_banner">
    <ul class="bxslider">
       
            <li>
		@if($headlines[0]->uri)
                    <a target="_blank" href="{{$headlines[0]->uri}}">
                	<img src="{{ asset('storage/'.$headlines[0]->image) }}" alt="{{$headlines[0]->title}}">
		    </a>
		@else 
                    <a href="{{url_title('headline',$headlines[0])}}">
			<img src="{{ asset('storage/'.$headlines[0]->image) }}" alt="{{$headlines[0]->title}}">
		    </a>
		 @endif
                <!--div class="kode_caption">
                    
                    <h2>{{$headlines[0]->title}}</h2>
                    {!! $headlines[0]->excerpt !!}
                    @if($headlines[0]->uri)
                    <a class="kode_link_1" target="_blank" href="{{$headlines[0]->uri}}">See More <i class="fa fa-angle-right"></i></a>
                    @else 
                    <a class="kode_link_1" href="{{url_title('headline',$headlines[0])}}">See More <i class="fa fa-angle-right"></i></a>
                    @endif
                </div-->
            </li>
	    
    </ul>
    
    <!--div class="kode_breaking_news">
        <div class="kode_brekg_news_des">
            <div class="bxslider">
                <div class="item">KEHORMATAN, HARGA DIRI, TANAH AIR</div>
            </div>
        </div>
    </div-->
</div>

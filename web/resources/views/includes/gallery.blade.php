<section class="kode_latest_wrk_bg">
    <div class="container">
        <div class="kode_hdg_1">
            <h4>GALERI</h4>
        </div>
        
        <div class="kode_latest_galry">
            <ul class="kode_tab_lnk filter-item" id="filterable-item-filter-1">
                <!--li ><a data-value="all" href="#">All</a></li-->
                <li class="active"><a data-value="foto" >Foto</a></li>
                <li><a data-value="video" >Video</a></li>
            </ul>
        </div>
    </div>
    
    <!--Gallery List Wrap Start-->
    <div id="filterable-foto" class="filterable_container">
        @foreach($galleries as $gallery)
        <div class="home_gallery filterable-item 1">
            <div class="kode_galry_item">
                <figure>
                    <img src="{{ asset('storage/'. $gallery->main_image) }}" alt="{{ $gallery->title }}">
                    <figcaption>
                        <a href="{{ url_title('view',$gallery) }}"><i class="icon-add52"></i></a>
                    </figcaption>
                </figure>
                <div class="kode_galry_des">
                    <h6>{{ $gallery->title }}</h6>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div id="filterable-video" class="filterable_container">
        @foreach($youtubes as $youtube)
        <div class="home_gallery filterable-item 2">
            <div class="kode_galry_item">
                <figure>
                    <img src="{{ $youtube->snippet->thumbnails->high->url }}" alt="{{ $youtube->snippet->title }}">
                    <figcaption>
                        <a href="{{ url('video/'.$youtube->id->videoId) }}"><i class="icon-add52"></i></a>
                    </figcaption>
                </figure>
                <div class="kode_galry_des">
                    <h6><a href="{{ url('video/'.$youtube->id->videoId) }}">{{ $youtube->snippet->title }}</a></h6>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mob-galeri">
        <div id="mob-slide" class="owl-carousel">
            @foreach($galleries as $gallery)
            <div class="item">
                <div class="kode_press_news">
                    <figure class="kode_pres2_style">
                        <img src="{{ asset('storage/'. $gallery->main_image) }}" alt="{{ $gallery->title }}">
                        <figcaption><a data-rel="prettyPhoto[]" href="{{ asset('storage/'. $gallery->main_image) }}"><i class="icon-add52"></i></a></figcaption>
                    </figure>
                    <div class="kode_news_date">
                        <ul>
                            <li> <a href="#">{{ pretty_date($gallery->created_at) }} </a></li>
                        </ul>
                    </div>
                    <div class="kode_news_des">
                        <h6><a href="{{ url_title('view',$gallery) }}">{{ $gallery->title }}</a></h6>
                        <a href="{{ url_title('view',$gallery) }}">Read More <i class="fa fa-long-arrow-right"></i> </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div id="mob-slide2" class="owl-carousel">
            @foreach($youtubes as $youtube)
            <div class="item">
                <div class="kode_press_news">
                    <figure class="kode_pres2_style">
                        <img src="{{ $youtube->snippet->thumbnails->high->url }}" alt="{{ $youtube->snippet->title }}">
                        <figcaption><a data-rel="prettyPhoto[]" href="{{ $youtube->snippet->thumbnails->high->url }}"><i class="icon-add52"></i></a></figcaption>
                    </figure>

                    <div class="kode_news_des">
                        <h6><a href="{{ url('video/'.$youtube->id->videoId) }}">{{ $youtube->snippet->title }}</a></h6>
                        <a href="{{ url('video/'.$youtube->id->videoId) }}">Read More <i class="fa fa-long-arrow-right"></i> </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>	
    <!--Gallery List Wrap Start-->
    <div class="clearfix clear"></div>
    <!--Pagination Wrap Start-->
    <div class="kode_pagination">
         <a class="kode_link_3" href="{{route('foto')}}">Load More <i class="fa fa-angle-right"></i></a>
    </div>
    <!--Pagination Wrap End-->
</section>

@section('script')
<script>
    $(document).ready(function(){
        $("#mob-slide").owlCarousel({
            navigation : false,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true,
            pagination: true
        });

        $("#mob-slide2").owlCarousel({
            navigation : false,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true,
            pagination: true
        });

        $("#filterable-video").hide();
        $("#filterable-item-filter-1 a[data-value=foto]").click(function(){
            $("#filterable-foto").show();
            $("#filterable-video").hide();
            jQuery(this).parents("li").addClass("active");
            jQuery(this).parents("li").siblings().removeClass("active");
            e.preventDefault();
        });
        $("#filterable-item-filter-1 a[data-value=video]").click(function(){
            $("#filterable-video").show();
            $("#filterable-foto").hide();
            jQuery(this).parents("li").addClass("active");
            jQuery(this).parents("li").siblings().removeClass("active");
            e.preventDefault();
        });
    });
</script>
@endsection

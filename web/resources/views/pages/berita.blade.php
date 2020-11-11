@extends('layouts.web',['title' => $title])

@section('content')
    @include('includes.breadcrumb')
    <!--Team Listing Wrap Start-->
    <section>
            <div class="container">
            	<div class="row">
                    <div class="col-md-12 kode_news_colmn_list">
                        @foreach($news as $new)
                        <div class="kode_news_list">
                            <figure>
                            @if(substr($new->feature_image,0,4) == "http" )
                            <img src="{{ $new->feature_image }}" alt="{{ $new->title }}">
                            @else
                            <img src="{{ asset('storage/'.$new->feature_image) }}" alt="{{ $new->title }}">
                            @endif
                                
                            </figure>
                            <div class="kode_news_list_des">
                                <span>{{ $new->category->name }}</span>
                                <h6> <a href="{{url_title('read',$new)}}">{{ $new->title }}</a> </h6>
                                
                                {!! $new->excerpt !!}
                            </div>
                        </div>
                        @endforeach
						<div class="clearfix clear"></div>
						<!--Pagination Wrap Start-->
						<div class="kode_pagination">
							<ul class="pagination">
								{{ $news->links() }}
							</ul>
						</div>
						<!--Pagination Wrap End-->
                    </div>
                </div>
            </div>
        </section>
        <!--Team Listing Wrap End-->
@endsection
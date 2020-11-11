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
                                <img src="{{ asset('storage/'.$new->image) }}" alt="{{ $new->title }}">
                            </figure>
                            <div class="kode_news_list_des">
                                <span>Sosok</span>
                                <h6> <a href="{{ url_title('sosok',$new) }}">{{ $new->title }}</a> </h6>
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
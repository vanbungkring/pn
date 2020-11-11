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
                            @if(substr($new->photo,0,4) == "http" )
                            <img src="{{ $new->photo }}" alt="{{ $new->title }}">
                            @else
                            <img src="{{ asset('storage/'.$new->photo) }}" alt="{{ $new->title }}">
                            @endif
                            </figure>
                            <div class="kode_news_list_des">
                                <span>{{ $new->anggota->name }}</span>
                                <h6> <a href="{{ url_title($menu,$new) }}">{{ $new->title }}</a> </h6>
                                
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
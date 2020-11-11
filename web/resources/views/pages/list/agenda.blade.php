@extends('layouts.web',['title' => $title])

@section('content')
    @include('includes.breadcrumb')

    <!--Event Wrap Start-->
    <section class="kode_event_grid_bg">
    <div class="container">
        <div class="row">
            @foreach($agendas as $agenda)
            <div class="col-md-4 col-sm-6">
                <div class="kode_event_wrap">
                    <figure>
                        <img src="{{ asset('storage/'.$agenda->poster) }}" alt="{{ $agenda->title }}">
                    </figure>
                    <div class="kode_event_des">
                        <h6><a href="{{ url_title('agenda', $agenda) }}">{{ $agenda->title }}</a></h6>
                        <ul>
                            <li> <i class="fa fa-calendar"></i> {{$agenda->start_date}} </li>
                            <li> <i class="fa fa-clock-o"></i> {{ $agenda->end_date}} </li>
                            <li>  
                                <i class="fa fa-map-marker"></i>
                                {{ $agenda->location }}
                            </li>
                        </ul>
                        @if(strlen($agenda->content) > 120)
                            {!! substr($agenda->content,0,119) !!}...</p>
                        @else
                            {!! $agenda->content !!}
                        @endif
                        <a href="{{ url_title('agenda', $agenda) }}">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!--Pagination Wrap Start-->
        <div class="kode_pagination">
            <ul class="pagination">
                {{ $agendas->links() }}
            </ul>
        </div>
        <!--Pagination Wrap End-->
    </div>
</section>
<!--Event Wrap End-->
@endsection
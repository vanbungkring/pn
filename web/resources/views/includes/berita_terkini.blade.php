<div class="kode_aside_event kode_aside">
    <h5>Berita Terkini</h5>
    <ul>
        @foreach($newest as $news)
        <li>
            <figure>
            @if(substr($news->feature_image,0,4) == "http" )
            <img src="{{ $news->feature_image }}" alt="{{ $news->title }}">
            @else
            <img src="{{ asset('storage/'.$news->feature_image) }}" alt="{{ $news->title }}">
            @endif
            </figure>
            <div class="kode_aside_event_des">
                <h6><a href="{{ url_title('read', $news) }}">{{$news->title}}</a></h6>
                <span>{{pretty_date($news->created_at)}}</span>
            </div>
        </li>
        @endforeach
    </ul>
</div>
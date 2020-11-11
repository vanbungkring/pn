<div class="kode_menu">
    <ul>
        <li {{  $menu === "home" ? "class=active" : "" }}>
            <a href="{{url('/')}}">Home</a>
        </li>
        <li {{  $menu === "news" ? "class=active" : "" }}><a href="{{route('news')}}">NASDEM TERKINI</a></li>
        <li {{  $menu === "video" ? "class=active" : "" }}><a href="{{ route('video') }}">VIDEO</a></li>
        <li {{  $menu === "foto" ? "class=active" : "" }}><a href="{{ route('foto') }}">FOTO</a></li>
    </ul>
</div>
<!--Navigation Wrap End-->

<!--DL Menu Start-->
<div id="kode-responsive-navigation" class="dl-menuwrapper">
    <button class="dl-trigger">Open Menu</button>
    <ul class="dl-menu">
        <li {{  $menu === "home" ? "class=active" : "" }}>
            <a href="{{url('/')}}">Home</a>
        </li>
        <li {{  $menu === "news" ? "class=active" : "" }}><a href="{{route('news')}}">NASDEM TERKINI</a></li>
        <li {{  $menu === "video" ? "class=active" : "" }}><a href="{{ route('video') }}">VIDEO</a></li>
        <li {{  $menu === "foto" ? "class=active" : "" }}><a href="{{ route('foto') }}">FOTO</a></li>
    </ul>
</div>
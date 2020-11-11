<div class="kode_menu">
    <ul>
        <li {{  $menu === "home" ? "class=active" : "" }}>
            <a href="{{url('/')}}">HOME</a>
        </li>
        <li {{  $menu === "news" ? "class=active" : "" }}><a href="{{route('news')}}">BERITA</a></li>
        <li {{  $menu === "covid" ? "class=active" : "" }}><a href="{{ route('covid') }}">COVID-19</a></li>
        <!-- <li {{  $menu === "video" ? "class=active" : "" }}><a href="{{ route('video') }}">VIDEO</a></li> -->
        <li {{  $menu === "foto" ? "class=active" : "" }}><a href="{{ route('foto') }}">FOTO</a></li>
        <!-- 
        <li {{  $menu === "agenda" ? "class=active" : "" }}><a href="{{ route('agenda') }}">AGENDA</a></li>
        <li {{  $menu === "press" ? "class=active" : "" }}><a href="{{ route('sosok') }}">SOSOK</a></li> -->
        <li {{  $menu === "opini" ? "class=active" : "" }}><a href="{{ route('opini') }}">OPINI</a></li>
        <li {{  $menu === "daerah" ? "class=active" : "" }}><a href="{{ route('daerah') }}">DAERAH</a></li>
    </ul>
</div>
<!--Navigation Wrap End-->

<!--DL Menu Start-->
<div id="kode-responsive-navigation" class="dl-menuwrapper">
    <button class="dl-trigger">Open Menu</button>
    <ul class="dl-menu">
        <li {{  $menu === "home" ? "class=active" : "" }}>
            <a href="{{url('/')}}">HOME</a>
        </li>
        <li {{  $menu === "news" ? "class=active" : "" }}><a href="{{route('news')}}">BERITA</a></li>
        <li {{  $menu === "covid" ? "class=active" : "" }}><a href="{{ route('covid') }}">COVID-19</a></li>
        <!-- <li {{  $menu === "video" ? "class=active" : "" }}><a href="{{ route('video') }}">VIDEO</a></li> -->
        <li {{  $menu === "foto" ? "class=active" : "" }}><a href="{{ route('foto') }}">FOTO</a></li>
        <!-- <li {{  $menu === "agenda" ? "class=active" : "" }}><a href="{{ route('agenda') }}">AGENDA</a></li>
        <li {{  $menu === "press" ? "class=active" : "" }}><a href="{{ route('sosok') }}">SOSOK</a></li> -->
        <li {{  $menu === "opini" ? "class=active" : "" }}><a href="{{ route('opini') }}">OPINI</a></li>
        <li {{  $menu === "daerah" ? "class=active" : "" }}><a href="{{ route('daerah') }}">DAERAH</a></li>
	    <li {{  $menu === "daerah" ? "class=active" : "" }}><a href="https://ppid.partainasdem.id/">PPID</a></li> 
    </ul>
</div>

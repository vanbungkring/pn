<!--Bread Crumb Wrap Start-->
<div class="kode_about_bg">
    <div class="container">
        <div class="kode_aboutus_wrap">
            <h4>
            @if (Request::segment(1) == 'read')
                News Detail
            @elseif (Request::segment(1) == 'berita')
                News
	    @elseif (Request::segment(1) == 'anggota')
                Anggota	
            @elseif (Request::segment(1) == 'opinis')
                Opini
            @elseif (Request::segment(1) == 'list-sosok')
                Sosok
            @elseif (Request::segment(1) == 'sosok')
                Sosok Detail            
            @elseif (Request::segment(1) == 'opini')
                Opini Detail    
            @elseif (Request::segment(1) == 'agendas')
                Agenda
            @elseif (Request::segment(1) == 'agenda')
                Agenda Detail
            @elseif (Request::segment(1) == 'view')
                Foto Detail
            @elseif (Request::segment(1) == 'gallery')
                Kumpulan Foto  
            @elseif (Request::segment(1) == 'video')
                Video Detail
            @elseif (Request::segment(1) == 'videos')
                Kumpulan Video                                                                
            @elseif (Request::segment(1) == 'dpw')
                TEMUKAN DPW TERDEKAT DI KOTA ANDA         
            @endif
            </h4>
            <div class="kode_bread_crumb">
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="#">News Detail</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
    <!--Bread Crumb Wrap Start-->

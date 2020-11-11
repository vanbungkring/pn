@extends('layouts.web',['title' => $title])

@section('content')
    @include('includes.breadcrumb')
    <!--Team Listing Wrap Start-->
    <section>
            <div class="container">
            	<div class="row">
                    <div class="col-md-12 kode_news_colmn_list">
                    <!-- <script>
                        (function() {
                            var cx = '009387885221345045784:r-yixcmiise';
                            var gcse = document.createElement('script');
                            gcse.type = 'text/javascript';
                            gcse.async = true;
                            gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                            var s = document.getElementsByTagName('script')[0];
                            s.parentNode.insertBefore(gcse, s);
                        })();
                    </script> -->
                    <gcse:searchresults-only></gcse:searchresults-only>
					<script async src='https://cse.google.com/cse.js?cx=partner-pub-9118973951652964:9883769936'></script><div class="gcse-searchbox-only"></div>
                    </div>
                </div>
            </div>
        </section>
        <!--Team Listing Wrap End-->
@endsection

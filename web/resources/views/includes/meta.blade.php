<?php
	function encode_uri($url){
		$exp = "{[^0-9a-z_.!~*'();,/?:@&=+$#%\[\]-]}i";
		return preg_replace_callback($exp, function($m){
			return sprintf('%%%02X',ord($m[0]));
		}, $url);
	}
	$img = encode_uri($meta_image);
?>
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{$meta_des}}">
<meta property="og:image" content="{{ $img }}">
<meta property="og:url" content="{{Request::url()}}">
<meta property="og:image:width" content="400" />
<meta property="og:image:height" content="300" />
<meta property="og:site_name" content="Partai Nasdem.">
<meta name="twitter:card" content="summary">
<meta name="twitter:description" content="{{$meta_des}}" />
<meta name="twitter:title" content="{{$title}}" />
<meta name="twitter:image" content="{{ $img }}" />

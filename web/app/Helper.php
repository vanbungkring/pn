<?php

/**
* Function to generate url for link from the data source
* 
* @param String $action
* @param Array $data 
* @return String
*/
function url_title($action, $data) {
    $url = $data->id."/";
    $url .= str_replace("-","/",substr($data->created_at,0,10))."/";

    if(isset($data->title)) {
        $url .= str_slug($data->title,'-'); 
    } else {
        $url .= str_slug($data->name,'-'); 
    }

    return url($action.'/'.$url);
}


function pretty_date($date){
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    
    $tahun = substr($date, 0, 4);               
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);
    $result = $tgl . " " . $BulanIndo[(int)$bulan-1]. " ". $tahun;
    return($result);
}

?>

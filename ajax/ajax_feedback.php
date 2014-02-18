<?php
		extract($_GET);
		// create curl resource
		set_time_limit(0);
    $agent = 'User-Agent: Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.0.3) Gecko/2008100922 Ubuntu/8.04 (hardy) Firefox/3.0.3';
    $url = "http://www.austlii.edu.au/cgi-bin/sinosrch.cgi?method=".$_GET['method']."&meta=".$_GET['meta']."&mask_path=".$_GET['mask_path']."&query=".$_GET['query']."&results=".$_GET['results']."&submit=".$_GET['submit']."&rank=".$_GET['rank']."&callback=".$_GET['callback']."&legisopt=".$_GET['legisopt']."&view=".$_GET['view']."&max=".$_GET['max'];

    $ch = curl_init ($url);
    curl_setopt($ch, CURLOPT_USERAGENT, $agent);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $data = curl_exec ($ch);
    curl_close($ch);
		$regex = '/<B>(.*?)<\/B>/s';
    preg_match_all($regex,$data,$match);
    $tr = explode(" ",$match[0][0]);
		
   if($tr[7]>0)
	 {
	 		echo "1";
	 }
	 else
	 {
	 		echo "0";
	 }
		exit;
?>
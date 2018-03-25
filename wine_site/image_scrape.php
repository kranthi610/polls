<?php

$curl = curl_init();


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.reddit.com/r/earthporn/hot.json?limit=100", // Thanks Sam!
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_USERAGENT =>'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13',
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token: 264e0b5d-cd1e-6e0b-2b75-3a2686166b8d"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $data_array = json_decode($response,true);
}
$i=1;
$imgdir = __DIR__.'/earth_images/';
$thumbdir = __DIR__.'/earth_thumbnails/';
/*
if (!file_exists($imgdir)) {
    mkdir($imgdir, 0777, true);
}
if (!file_exists($thumbdir)) {
    mkdir($thumbdir, 0777, true);
}*/
foreach($data_array['data']['children'] as $key => $image)
{
	$url = $image['data']['url'];
	$basename = explode('.',basename($url));
	if(count($basename)>1)
	{
		$newUrl = $image['data']['url'];
		$name =  $image['data']['name'];
		$thumbnailUrl = $image['data']['thumbnail'];
		$myimage = file_get_contents($newUrl);
		$imageFolder = file_put_contents($imgdir."$name".'.'.$basename[1],$myimage);
		$mythumbnail = file_get_contents($thumbnailUrl);
		$thumbnailFolder = file_put_contents($thumbdir."$name".'.jpg',$myimage);
	}else{
		$newUrl = $image['data']['url'];
		$name =  $image['data']['name'];
		substr($newUrl,-1)=='/'?$newUrl = substr($newUrl, 0, -1).'.jpg':$newUrl = $newUrl.'.jpg';
		$thumbnailUrl = $image['data']['thumbnail'];
		$myimage = file_get_contents($newUrl);
		$imageFolder = file_put_contents($imgdir."$name".'.jpg',$myimage);
		$mythumbnail = file_get_contents($thumbnailUrl);
		$thumbnailFolder = file_put_contents($thumbdir."$name".'.jpg',$mythumbnail);
	}

}

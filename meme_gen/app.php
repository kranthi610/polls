<?php
// Turn error reporting on during testing (not production)
error_reporting(1);

require('settings.php');
require('class_upload.php');

$request_parts = explode('/', $_SERVER['REQUEST_URI']); 
in_array($request_parts[2],['fileUpload','thumbsdir','thumbsdb'])?$route = $request_parts[2]:'';

$db = new mysqli("localhost", 'root','root','memes');
// If we have an error connecting to the db, then exit page
if ($db->connect_errno) {
    print_response(['success'=>false,"error"=>"Connect failed: ".$db->connect_error]);
}

if(array_key_exists('route',$_GET)){
    $route = $_GET['route'];
}elseif(array_key_exists('route',$_POST)){
    $route = $_POST['route'];
}

$routes = ['routes'=>
    [
        ['type'=>'post','name'=>'register','params'=>[]],
        ['type'=>'post','name'=>'login','params'=>['email','']],
        ['type'=>'get','name'=>'thumbsdir','params'=>[]],
        ['type'=>'get','name'=>'thumbsdb','params'=>[]],
        ['type'=>'post','name'=>'fileUpload','params'=>[]],   
    ]
];

$response = false;

switch($route){
    case 'fileUpload':
         $response = doUpload($settings,$_FILES,'./uploads');
         break;
    case 'thumbsdir':
         $response = getThumbsdirect();
         break;
    case 'thumbsdb':
         $response = getThumbsdb();
         break;
    default:
        $urls = [];
        foreach($routes['routes'] as $route){
            $urls[] = ['type'=>$route['type'],'url'=>'https://wtfhw.us'.$_SERVER['PHP_SELF']."?route=".$route['name']];
        }
        $response = $urls;
}

if($response !== false){
    $response['success']=true;
    logg($response);
    print_response($response);
}
////////////////////////////////////////////////////////////////////////


function getThumbsdirect(){
    $path = "uploads/thumbs/";
    $files = scandir($path);
    
    array_shift($files);
    array_shift($files);

    for($i=0;$i<sizeof($files);$i++){
        $files[$i] = $path.$files[$i];
    }
    return $files;
    
}

function getThumbsdb(){
    global $db;
    $files = [];
    $sql = "SELECT thumbPath,imgName,imgType FROM images;";
    $result = $db->query($sql);

    while($row = $result->fetch_array()){
        $files[] = trim($row['thumbPath'].$row['imgName'].'.'.$row['imgType'],"/.");
    }
    
    return $files;
}


function doUpload($settings,$files,$path){
    //echo 'surprise';
    $uploader = new Upload($settings,$files,$path);
    return $uploader->doUploads();
}


function print_response($response){
    if($response['data']){
        $response['data_size'] = sizeof($response['data']);
    }
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}



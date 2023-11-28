<?php 
define('MB' , 1048576);
function filterRequest($requestname){

    return  htmlspecialchars(strip_tags($_POST[$requestname]));

}


function imageUpload($imageRequest){
    global $msgError ;
    $imagename      =  rand(1,100000) . $_FILES[$imageRequest]['name'];
    $imagetmp       = $_FILES[$imageRequest]['tmp_name'];
    $imagesize      = $_FILES[$imageRequest]['size'];
    $allowExt       =  array("jpg" , "png" , "gif" , "mp3" , "pdf");
    $strToArrray    = explode("." , $imagename);
    $ext            = end($strToArrray);
    $ext            = strtolower($ext);

    if (!empty($imagename) && !in_array($ext , $allowExt)) {
        $msgError[] = "Ext";
    }

    if ($imagesize> 10 * MB) {
        $msgError[] = "Size";
    }

    if (empty($msgError)) {
        move_uploaded_file($imagetmp, "../upload/images/" . $imagename);
        return $imagename;
    }
    else {
        return "fail";
    }

}

//$dir ==    direction
function deleteFile($drcton , $imagename){
    if(file_exists($drcton . "/" . $imagename  )){
        unlink($drcton . "/" . $imagename);
    }
    
}



function checkAuthenticate(){
    
    if (isset($_SERVER['PHP_AUTH_USER'])  && isset($_SERVER['PHP_AUTH_PW'])) {    
        if ($_SERVER['PHP_AUTH_USER'] != "islam" ||  $_SERVER['PHP_AUTH_PW'] != "gt63s"){
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Page Not Found';
            exit;
        }
    } else {
            exit;
    }
}
    
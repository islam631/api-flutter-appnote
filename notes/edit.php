<?php

include "../connect.php";


$noteid = filterRequest("id");
$title = filterRequest("title");
$content = filterRequest("content");
$imagename = filterRequest("imagename");

if (isset($_FILES["file"])) {
    deleteFile("../upload/images/" , $imagename);
    $imagename = imageUpload("file");
}

$stmt = $conn->prepare("
UPDATE `notes` SET 
`notes_title`=?,`notes_content`=? ,`notes_image` =?
WHERE id_notes = ?
");


$stmt->execute(array($title,$content,$imagename,$noteid));


$count  = $stmt->rowCount();


if ($count > 0) {
    echo json_encode(array("status" => "success", "data"=>$data));
} else {
    echo json_encode(array("status" => "error"));
}
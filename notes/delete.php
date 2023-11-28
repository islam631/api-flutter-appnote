<?php

include "../connect.php";


$id         = filterRequest("id");
$imagename  = filterRequest("imagename");


$stmt = $conn->prepare("DELETE FROM notes WHERE id_notes = ?");

$stmt->execute(array($id));

$count = $stmt->rowCount();

if ($count > 0) {
    deleteFile("../upload/images/" , $imagename);
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "error"));
}
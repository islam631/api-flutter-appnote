<?php

include "connect.php";

$stmt = $con-> prepare("DELETE FROM users  where id = :id");
$stmt->execute(
    array(
        "id"=>7,
    )
);

$count = $stmt->rowCount();
if($count > 0){
    print_r("succes");
}else{
    print_r("nooon");
} 



?>
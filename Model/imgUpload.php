<?php 
function uploadImage($image){
    $dir = '../assets/imgs/';
    $uploadFile = $dir . $image['name'];
    move_uploaded_file($image['tmp_name'], $uploadFile);
   
}

?>
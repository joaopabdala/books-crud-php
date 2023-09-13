<?php 
require_once './database/database.php';
require_once '../Model/imgUpload.php';

$book_cover = $_FILES['book_cover'];
$code_book = $_POST['code_book'];

uploadImage($book_cover);


$conn = conndb();
$sql = "UPDATE books SET book_cover = :book_cover WHERE code_book = $code_book";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':book_cover', $book_cover['name']);

if($stmt->execute()){
    header('Location: ../index.php');
    var_dump($_FILES);
} else {
    print_r($stmt->errorInfo());
}

?>
<?php 

require_once './database/database.php';
require_once '../Model/imgUpload.php';


$book_name = $_POST['book_name'];
$book_ISBN = $_POST['book_ISBN'];
$book_author = $_POST['book_author'];
$book_pages = $_POST['book_pages'];
$code_book = $_POST['code_book'];


$conn = conndb();
$sql = "UPDATE books SET book_name=:book_name, book_ISBN = :book_ISBN, book_author = :book_author, book_pages = :book_pages WHERE code_book = $code_book";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':book_name', $book_name);
$stmt->bindParam(':book_ISBN', $book_ISBN);
$stmt->bindParam(':book_author', $book_author);
$stmt->bindParam(':book_pages', $book_pages);



if($stmt->execute()){
    header('Location: ../index.php');
    var_dump($_FILES);
} else {
    print_r($stmt->errorInfo());
}

?>
<?php 

require_once './database/database.php';

$book_name = $_POST['book_name'];
$book_ISBN = $_POST['book_ISBN'];
$book_author = $_POST['book_author'];
$book_pages = $_POST['book_pages'];
$book_cover = $_POST['book_cover'];
$code_book = $_POST['code_book'];

$conn = conndb();
$sql = "UPDATE books SET book_name=:book_name, book_ISBN = :book_ISBN, book_author = :book_author, book_pages = :book_pages, book_cover = :book_cover WHERE code_book = $code_book";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':book_name', $book_name);
$stmt->bindParam(':book_ISBN', $book_ISBN);
$stmt->bindParam(':book_author', $book_author);
$stmt->bindParam(':book_pages', $book_pages);
$stmt->bindParam(':book_cover', $book_cover);


if($stmt->execute()){
    header('Location: ../index.php');
} else {
    print_r($stmt->errorCode());
}

?>
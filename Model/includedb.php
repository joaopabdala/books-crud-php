<?php 
require_once './database/database.php';
require_once '../Model/imgUpload.php';

$book_name = $_POST['book_name'];
$book_ISBN = $_POST['book_ISBN'];
$book_author = $_POST['book_author'];
$book_pages = $_POST['book_pages'];
$book_cover = $_FILES['book_cover'];


    $conn = conndb();
    $sql = "INSERT INTO books (book_name, book_ISBN, book_author, book_pages, book_cover) VALUES (:book_name, :book_ISBN, :book_author, :book_pages, :book_cover)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':book_name', $book_name);
    $stmt->bindParam(':book_ISBN', $book_ISBN);
    $stmt->bindParam(':book_author', $book_author);
    $stmt->bindParam(':book_pages', $book_pages);
    $stmt->bindParam(':book_cover', $book_cover['name']);
    
    print_r(uploadImage($book_cover));

    if($stmt->execute()){
        header('Location: ../index.php');
    } else {
        print_r($stmt->errorCode());
    }

?>
<?php 
require_once '../Model/database/database.php';

$code_book = $_GET['code_book'];

$conn = conndb();

$sql = "SELECT book_cover FROM books where code_book = $code_book";

$stmt_cover = $conn->prepare($sql);
$stmt_cover->execute();
$book_cover = $stmt_cover->fetchColumn();

$dir = '../assets/imgs/';

if(unlink($dir . $book_cover)){
    $sql = "DELETE FROM books where code_book = $code_book";

    $stmt = $conn->prepare($sql);
    if($stmt->execute()){
        header('Location: ../index.php');
    } else {
        print_r($stmt->errorCode());
    }
} else {
    print_r(error_get_last());
};





?>
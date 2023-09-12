<?php 
require_once '../Model/database/database.php';

$code_book = $_GET['code_book'];

$conn = conndb();
$sql = "DELETE FROM books where code_book = $code_book";

$stmt = $conn->prepare($sql);
if($stmt->execute()){
    header('Location: ../index.php');
} else {
    print_r($stmt->errorCode());
}

?>
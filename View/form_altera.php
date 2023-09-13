<?php 
require_once '../Model/database/database.php';

$id = $_GET['code_book'];

$conn = conndb();


$sql = "SELECT book_name, book_ISBN, book_author, book_pages, book_cover, code_book FROM books where code_book = $id ";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar títulos</title>
</head>
<body>
    <h1>Alterar títulos</h1>
<form action="../Model/altera.php" method="post" enctype="multipart/form-data">
        <label for="book_name">Título</label>
        <input type="text" id="book_name" name="book_name" value="<?= $result['book_name']?>">
        <label for="book_ISBN">ISBN</label>
        <input type="text" id="book_ISBN" name="book_ISBN" value="<?= $result['book_ISBN']?>">
        <label for="book_author">Autor</label>
        <input type="text" id="book_author" name="book_author" value="<?= $result['book_author']?>">
        <label for="book_pages">Número de páginas</label>
        <input type="text" id="book_pages" name="book_pages" value="<?= $result['book_pages']?>">
        <label for="book_cover">Capa do livro</label>
        <input type="file" id="book_cover" name="book_cover" value="<?= $result['book_cover']?>">
        <input type="hidden" name="code_book" value="<?=$result['code_book'] ?>">

        <input type="submit">
    </form>
</body>
</html>
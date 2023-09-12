<?php 
require_once './Model/database/database.php';
$conn = conndb();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
</head>

<?php 


$sql = "SELECT book_name, book_ISBN, book_author, book_pages, book_cover, code_book FROM books";
$stmt = $conn->prepare($sql);
$stmt->execute();

?>

<body style="background-color: antiquewhite;">
    <h1>Livros cadastrados</h1>
    <a href="./View/form.html">Incluir novo livro</a>
    <table border="1">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>ISBN</th>
                <th>Número de páginas</th>
                <th>Foto</th>
                <th>Alterar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Edgar Allan Poe: Medo Clássico Vol. 1</td>
                <td>Edgar Allan Poe</td>
                <td>9788594540249</td>
                <td>372</td>
                <td><img src="./assets/imgs/144-edgar-allan-poe-medo-classico-z.png" alt="capa do livro"></td>
                <a href="alterar"></a>
                <a href="excluir"></a>
            </tr>
                <?php while($result = $stmt->fetch(PDO::FETCH_ASSOC)):?>
            <tr>    
                <td><?= $result['book_name']?></td>
                <td><?= $result['book_author']?></td>
                <td><?= $result['book_ISBN']?></td>
                <td><?= $result['book_pages']?></td>
                <td><img src="<?= $result['book_cover']?>" alt="capa do livro"></td>
                <td><a href="./View/form_altera.php?code_book=<?=$result['code_book']?>">Alterar</a></td>
                <td><a href="./Model/excluir.php?code_book=<?=$result['code_book']?>" onclick="return confirm('Você tem certeza que deseja excluir esse livro?')">Excluir</a></td>
            </tr>
            <?php endwhile?>
        </tbody>
    </table>
</body>
</html>
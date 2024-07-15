<?php 

if(!empty($_GET['id']))
{
    include_once('conn.php');

    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM Livro WHERE ID =$id";

    $result = $conn->query($sqlSelect);

  if($result ->num_rows > 0)
  {
        $sqlDelete = "DELETE FROM Livro WHERE id=$id";
        $resultDelete = $conn->query($sqlDelete);

  }
}
    header('Location: tabelaLivro.php');
?>
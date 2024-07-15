<?php 

if(!empty($_GET['id']))
{
    include_once('conn.php');

    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM usuario WHERE ID =$id";

    $result = $conn->query($sqlSelect);

  if($result ->num_rows > 0)
  {
        $sqlDelete = "DELETE FROM usuario WHERE id=$id";
        $resultDelete = $conn->query($sqlDelete);

  }
}
    header('Location: tabela.php');
?>
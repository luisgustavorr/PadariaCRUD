<?php 
include('../../MySql.php');

  $cards = \MySql::conectar()->prepare("INSERT INTO `tb_produtos` (`id`, `nome`, `preco`, `peso`, `img`) VALUES (NULL, ?, ?, ?, ?)");
  $cards->execute(array($_POST['input_nome'], $_POST['input_preco'], $_POST['input_peso'], $_FILES['input_img']['name']));
  
  $idInserido = \MySql::conectar()->lastInsertId();
  
  $cardsUpdate = \MySql::conectar()->prepare("UPDATE `tb_produtos` SET `img` = ? WHERE `id` = ?");
  $cardsUpdate->execute(array($idInserido.$_FILES['input_img']['name'], $idInserido));
  
  if (isset($_FILES["input_img"]) && $_FILES["input_img"]["error"] == UPLOAD_ERR_OK) {
      $tempFilePath = $_FILES["input_img"]["tmp_name"];
      $destinationPath = "uploads/".$idInserido.$_FILES['input_img']['name'];
  
      if (move_uploaded_file($tempFilePath, $destinationPath)) {
        echo "Imagem baixada com sucesso.";
      } else {
        echo "Falha ao baixar a imagem.";
      }
    } else {
      echo "Nenhum arquivo foi enviado ou ocorreu um erro no envio.";
    }
?>
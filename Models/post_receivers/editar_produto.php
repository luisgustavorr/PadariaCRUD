<?php 
include('../../MySql.php');

if (isset($_POST['action'])) {
    $info = \MySql::conectar()->prepare('SELECT * FROM `tb_produtos` WHERE id = ?');
    $info->execute(array($_POST['id']));
    $info = $info->fetch();
    echo json_encode($info, JSON_FORCE_OBJECT);
} else {
    $random = uniqid();
    $img = $_POST['old_img_name'];
    
    if (!empty($_FILES['edit_input_img']['name'])) {
        if ($_FILES["edit_input_img"]["error"] == UPLOAD_ERR_OK) {
            $tempFilePath = $_FILES["edit_input_img"]["tmp_name"];
            $destinationPath = "uploads/" . $_POST['input_id'].$_FILES['edit_input_img']['name'];
        
            if (move_uploaded_file($tempFilePath, $destinationPath)) {
                echo "Imagem baixada com sucesso.";
                $img = $_POST['input_id'].$_FILES['edit_input_img']['name'];
            } else {
                echo "Falha ao baixar a imagem.";
            }
        } else {
            echo "Nenhum arquivo foi enviado ou ocorreu um erro no envio.";
        }
    }

    $update = \MySql::conectar()->prepare("UPDATE `tb_produtos` SET `nome` = ?, `preco` = ?, `peso` = ?, `img` = ? WHERE `tb_produtos`.`id` = ?");
    $update->execute(array($_POST['input_nome'], $_POST['input_preco'], $_POST['input_peso'], $img, $_POST['input_id']));
}

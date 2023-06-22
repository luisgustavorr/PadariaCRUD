<?php 
include('../../MySql.php');

$cards = \MySql::conectar()->prepare('SELECT * FROM `tb_produtos` WHERE `tb_produtos`.`id` = ?');
$cards->execute(array($_POST['id']));
$cards = $cards->fetch();
if (file_exists("uploads/".$cards['img'])) {
    if (unlink("uploads/".$cards['img'])) {
        echo 'Imagem removida com sucesso.';
    } else {
        echo 'Falha ao remover a imagem.';
    }
}
$deletar_cards = \MySql::conectar()->prepare("DELETE FROM tb_produtos WHERE `tb_produtos`.`id` = ?");
$deletar_cards->execute(array($_POST['id']));

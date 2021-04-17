<?php
include '../Model/db.php';
$model = new Model();

if($_POST['senha'] !== $_POST['senha2']){
    echo "<script>alert('As senhas não conferem!');</script>";
    echo "<script>window.location.href='../View/cadastro.html';</script>";
    #header('Location: ../View/login_erro.html');

}else{

    $insere = $model->insert($nome, $email, $telefone, $endereco, $usuario, $senha);
}









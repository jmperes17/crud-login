<?php

include_once '../Model/db.php';
$model = new Model();
$id = $_REQUEST['id'];

$delete = $model->Deletar($id);
session_start();

unset($_SESSION['usuario']);
session_destroy($_SESSION['usuario']);

echo "<script>alert('Deletado com sucesso!');</script>";
echo "<script>window.location.href='../View/records.php';</script>";




?>
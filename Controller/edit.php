<?php
include '../Model/db.php';

$model = new Model();
$id = $_REQUEST['id'];
$edita = $model->Update($id);
header('Location: ../View/records.php');


    
    ?>
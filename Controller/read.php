<?php

include '../Model/db.php';

$model = new Model();
$id = $_REQUEST['id'];
$row = $model->fetch_single($id);
print_r($row);



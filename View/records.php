<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Dados</title>
  </head>
  <body>
  <?php 
    session_start();
    if(isset($_POST['usuario']) && isset($_POST['senha'])){
      header('Location: login.html');


    }else{
      echo " Bem vindo,  ". $_SESSION['usuario'];
      $logged=true;
    }
    
    
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-silver">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup" >
    <div class="navbar-nav" >
      <a class="nav-item nav-link" href="#">Dados</a>
      <a class="nav-item nav-link " href="../Controller/logout.php">Sair</a>
    </div>
  </div>
</nav>
    

    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-5">
          <h1 class="text-center">Dados:</h1>
          <hr style="height: 1px;color:black;background-color:black  ;">
        </div>
      </div>
 
        <div class="row">
          <div class="col-md-12 mt-5">
            <table class="table table-striped table-bordered table-condensed table-hover" width="1200" border = "2px" cellpadding = "5px" cellspacing = "2px">
              <thead>
                <tr>  
                  <th> ID  </th>
                  <th> Nome </th>
                  <th> Email </th>
                  <th> Telefone </th>
                  <th> Endereço </th>
                  <th> Usuario </th>
                  <th> Senha </th>
                  <th> Status </th>
                  <th> Action </th>
                  

                </tr>
              </thead>
              <tbody>
                <?php


                  include '../Model/db.php';
                  $model = new Model();
                  $rows = $model->fetch();
                  $i = 1;
                  if(!empty($rows)){
                    foreach($rows as $row){

                ?> 
                <tr>
                  <td><?php echo $row['id_record']; ?></td>
                  <td><?php echo $row['nome']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['celular']; ?></td>
                  <td><?php echo $row['endereco']; ?></td>
                  <td><?php echo $row['usuario']; ?></td>
                  <td><?php echo $row['senha']; ?></td>
                  <td><?php echo $row['status']; ?></td>
                  <td>
                    <a href="../View/lerform.php?id=<?php echo $row['id_record']; ?>" class="btn btn-info">Ler</a>
                    <a href="../Controller/delete.php?id=<?php echo $row['id_record']; ?>" class="btn btn-danger">Deletar</a>
                    <a href="../View/editar.php?id=<?php echo $row['id_record']; ?>" class="btn btn-warning">Editar</a>
                  </td>
                </tr>

                <?php

                  }
                }
                ?>
               
              </tbody>
            </table>
            <div class="form-group" align="center">
            <a href="../Controller/logout.php" align="center">Sair</a>
            </div>
             
        </div>
      </div>
    </div>

    

    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>
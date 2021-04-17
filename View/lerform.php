<!doctype html>
<html lang="pt">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>CRUD</title>
  </head>
  <body bgcolor="silver">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="records.php">Dados</a>
      <a class="nav-item nav-link " href="../Controller/logout.php">Sair</a>
    </div>
  </div>
</nav>
  <?php
  session_start();
  echo " Usuário logado => ". $_SESSION['usuario'];
  


    include '../Model/db.php';

    $model = new Model();
    $id = $_REQUEST['id'];
    $row = $model->Editar($id);
    

    

    ?>
    

    <div class="container">
        <div class="row">

            <div class="col-md-12 mt-5">
                <h1 class="text-center">Dados</h1>
                <hr style="height: 1px;color: black;background-color: black;">
            </div>
        </div>
    
            <div class="col-md5 mx-auto">
                <form action="records.php" method="post">
                    <div class="form-row">
                        <label for="">Nome</label>
                        <input type="text" name="nome" readonly  value="<?php echo $row['nome']; ?>" class="form-control">
                    </div>

                    <div class="form-row">
                        <label for="">Email</label>
                        <input type="email" name="email" readonly value="<?php echo $row['email']; ?>" class="form-control">
                    </div>

                    <div class="form-row">
                        <label for="">Telefone</label>
                        <input type="phone" name="telefone" readonly readonly value="<?php echo $row['celular']; ?>" class="form-control">
                    </div>

                    <div class="form-row">
                        <label for="">Endereço</label>
                        <input name="endereco" readonly value="<?php echo $row['endereco']; ?>"  id="endereco" cols="" rows="1" class="form-control"></input>
                        <hr style="height: 1px;color: black;background-color: black;">
                    </div>

                    <div class="form-row">
                        <label for="">Usuario</label>
                        <input type="text" name="usuario" readonly value="<?php echo $row['usuario']; ?>" class="form-control">
                    </div>

                    <div class="form-row">
                        <label for="">Senha</label>
                        <input type="text" name="senha" readonly value="<?php echo $row['senha']; ?>" class="form-control">
                    </div>

                    <table>
                    <tr>
                        <td>
                   
                            <a href="../Controller/delete.php?id=<?php echo $row['id_record']; ?>" class="btn btn-danger">Deletar</a>
                            <a href="../View/editar.php?id=<?php echo $row['id_record']; ?>" class="btn btn-warning">Editar</a>
                        </td>
                    </tr>

                    </table>


                    <div class="form-row" align="right">
                        <button type="submit" name="submit" class="btn btn-primary">Voltar</button>
                    </div>


                    
                </form>
                <div class="form-group" align="center">
                <a href="../Controller/logout.php" align="center">Sair</a>
                </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    !-->
  </body>
</html>
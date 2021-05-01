<?php
    if(isset($_POST['usuario']) && isset($_POST['senha'])){

     include '../Model/db.php';
     $model = new Model();
     $validaUsuario = $model->validaUsuario($_POST['usuario'], $_POST['senha']);

    }


        if(!empty($validaUsuario)){
            foreach($validaUsuario as $usuario){

                session_start();
                $_SESSION['usuario']=$_POST['usuario'];

               


                
                header('Location:../View/records.php');
            }
           
            
        }else{
            header('Location: ../View/login2.html');
        }
    




                
                

        
               
             

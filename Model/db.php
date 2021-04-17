<?php


class Model
{
    public $server = "localhost";
    public $usuario = "root";
    public $senha = "";
    public $db = "crud";
    public $conexao;

    public function __construct()
    #Conexão com o Banco de dados
    {
        try {

            $this->conexao = new mysqli($this->server, $this->usuario, $this->senha, $this->db);
        } catch (Exception $e) {
            echo "Falha na conexão" . $e->getMessage();
        }
    }


    public function insert()
    #Função para inserção de dados
    {

        if (
            isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['telefone'])  &&
            isset($_POST['endereco']) &&
            isset($_POST['usuario']) &&
            isset($_POST['senha'])
        ) {
            if (
                !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['telefone']) &&
                !empty($_POST['endereco']) &&
                isset($_POST['usuario']) &&
                isset($_POST['senha'])
            ) {

                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $telefone = $_POST['telefone'];
                $endereco = $_POST['endereco'];
                $usuario = $_POST['usuario'];
                $senha = $_POST['senha'];
 

                $query = " INSERT INTO records(nome,email,celular,endereco,usuario,senha) VALUES('$nome', '$email','$telefone','$endereco','$usuario','$senha')";

                if ($sql = $this->conexao->query($query)) {
                    echo "<script>alert('Dados salvos!');</script>";
                    echo "<script>window.location.href='../View/login.html';</script>";
                } else {
                    echo "<script>alert('Falha');</script>";
                    echo "<script>window.location.href='../View/cadastro.html';</script>";
                }
            } else {
                echo "<script>alert('Vazio!');</script>";
                echo "<script>window.location.href='../View/cadastro.html';</script>";
            }
        }
    }

    public function fetch()
    #Função para listar todos os campos da tabela 'records'
    {
        $data = null;

        $query = "SELECT * FROM records";
        if ($sql = $this->conexao->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;

        

        
    }

    public function validaUsuario($usuario, $senha){
        #Função para verificar os dados de login no banco de dados
        $data = [];

        $query = "SELECT * FROM records WHERE usuario = '$usuario' and senha = '$senha'";
        if ($sql = $this->conexao->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;

                 

            
            }
        }
        

        
        return $data;

        
    }

    public function Deletar($id){
        #Função para deleção de dados da tabela
        $query = "DELETE FROM records WHERE id_record = '$id'";
        if ($sql = $this->conexao->query($query)){
            return true;
            

        }

    }


    public function fetch_single($id)
    #Função para listar dados por id
    {
        
        $data = null;
        $query = "SELECT * FROM records WHERE id_record = '$id'";
        if ($sql = $this->conexao->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data = $row;
            }
        }
        return $data;
        
    }

    public function Editar($id){
        # Função para jogar os dados editar para o controller 'Update' e atualizar os dados da tabela
        
        $data = null;
        $query = "SELECT * FROM records WHERE id_record = '$id'";
        if ($sql = $this->conexao->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
            

    }

    public function Update($id){
        # Função para realizar alteração dos dados da tabela e depois jogar pra view novamente

        if (
            isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['telefone'])  &&
            isset($_POST['endereco']) &&
            isset($_POST['usuario']) &&
            isset($_POST['senha'])
        ) {
            if (
                !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['telefone']) &&
                !empty($_POST['endereco']) &&
                isset($_POST['usuario']) &&
                isset($_POST['senha'])
            ) {

                $id = $_REQUEST['id'];
                $data['nome'] = $_POST['nome'];
                $data['email'] = $_POST['email'];
                $data['telefone'] = $_POST['telefone'];
                $data['endereco'] = $_POST['endereco'];
                $data['usuario'] = $_POST['usuario'];
                
            }
        
       
        echo $query = "UPDATE records SET nome = '$data[nome]', email = '$data[email]', celular = '$data[telefone]', endereco = '$data[endereco]', usuario = '$data[usuario]' WHERE id_record = '$id'";
        if ($sql = $this->conexao->query($query)) {
            echo "<script>alert('Dados salvos!');</script>";
           
            }
        }
        
                  

    }
}




?>
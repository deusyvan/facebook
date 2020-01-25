<?php
namespace Models;

use \Core\Model;

class Usuarios extends Model {

    public function verificarLogin(){
        //print_r($_SESSION);exit;
        if(!isset($_SESSION['lgsist']) || (isset($_SESSION['lgsist']) && empty($_SESSION['lgsist']))){
            header("Location: ".BASE_URL."login");
            exit;
        }
    }
    
    public function logar($email, $senha)
    {
        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        //echo $sql;exit;
        $sql = $this->db->query($sql);
        //var_dump($sql->rowCount());
        if($sql->rowCount() > 0){
            $sql = $sql->fetch();
            $_SESSION['lgsist'] = $sql['id'];
            //print_r($_SESSION);exit;
            header("Location: ".BASE_URL);
            exit;
        }else{
            return "E-mail e/ou senha não conferem!";
        }
    }
    
    public function cadastrar($nome, $email, $senha,$sexo)
    {
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $sql = $this->db->query($sql);
        
        if($sql->rowCount() == 0){
            
            $sql = "INSERT INTO usuarios SET nome = '$nome', email = '$email', senha = MD5('$senha'), sexo = '$sexo'";
            $sql = $this->db->query($sql);
            
            $id = $this->db->lastInsertId();
            $_SESSION['lgsist'] = $id;
            
            header("Location: ".BASE_URL);
            exit;
            
        } else {
            return "E-mail já cadastrado!";
        }
    }
    
    public function getNome($id)
    {
        $sql = "SELECT nome FROM usuarios WHERE id = '$id'";
        $sql = $this->db->query($sql);
            
        if ($sql->rowCount() > 0){
            $sql = $sql->fetch();
            
            return $sql['nome'];
        } else {
            return '';
        }
    }
    
    public function getDados($id)
    {
        $array = array();
        $sql = "SELECT * FROM usuarios WHERE id = '$id'";
        $sql = $this->db->query($sql);
        
        if ($sql->rowCount() > 0){
            $sql = $sql->fetchAll();
            
            return $array;
        } 
    }
}
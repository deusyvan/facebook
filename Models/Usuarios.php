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
            $array = $sql->fetch();
            
            return $array;
        } 
    }
    
    public function updatePerfil($array = array())
    {
        if(count($array) > 0){
            $sql = "UPDATE usuarios SET ";
            foreach ($array as $campo=>$valor) {
                $campos[] = $campo." = '".$valor."'";
            }
            
            $sql.= implode(', ', $campos);
            $sql .= " WHERE id = '".($_SESSION['lgsist'])."'";
            
            //echo $sql; exit;
            $this->db->query($sql);
        }
    }
    
    public function getSugestoes($limit = 5)
    {
        $array = array();
        $meuid = $_SESSION['lgsist'];
        
        $sql = "
            SELECT 
                usuarios.id, usuarios.nome 
            FROM 
                usuarios 
            
            WHERE 
                usuarios.id !='$meuid' 
                
            ORDER BY RAND()
            LIMIT $limit
            ";
        
        $sql = $this->db->query($sql);
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
    
    public function addFriend($id1, $id2)
    {
        $sql = "INSERT INTO relacionamentos SET usuario_de = '$id1', usuario_para = '$id2', status = '0'";
        $this->db->query($sql);
        
    }
}
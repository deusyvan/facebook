<?php
namespace Models;

use \Core\Model;

class Usuarios extends Model {

    public function verificarLogin(){
        
        if(!isset($_SESSION['lgsist']) || (isset($_SESSION['lgsist']) && !empty($_SESSION['lgsist']))){
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
            //var_dump($_SESSION['twlg']);exit;
            header("Location: ".BASE_URL);
            exit;
        }else{
            return "E-mail e/ou senha não conferem!";
        }
    }

}
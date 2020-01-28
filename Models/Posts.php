<?php
namespace Models;

use \Core\Model;

class Posts extends Model {
    
    public function addPost($msg)
    {
        $usuario = $_SESSION['lgsist'];

        $sql = "INSERT INTO posts SET id_usuario = '$usuario', data_criacao = NOW(), tipo = 'texto', 
                texto = '$msg', id_grupo = '0'";
        $this->db->query($sql);
    }
}
    
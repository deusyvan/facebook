<?php
namespace Models;

use \Core\Model;

class Posts extends Model {
    
    public function addPost($msg, $foto)
    {
        $usuario = $_SESSION['lgsist'];
        $tipo = 'texto';
        $url ='';
        
        if(count($foto) > 0){
            $tipos = array('image/jpeg', 'image/jpg', 'image/png');
            if(in_array($foto['type'], $tipos)){
                $tipo = 'foto';
                $url = md5(time().rand(0,999));
                switch ($foto['type']){
                    case 'image/jpeg':
                    case 'image/jpg':
                        $url  .= '.jpg';
                        break;
                    case 'image/png':
                        $url  .= '.png';
                        break;
                }
                
                move_uploaded_file($foto['tmp_name'], 'assets/images/posts/'.$url);
            }
        }

        $sql = "INSERT INTO posts SET id_usuario = '$usuario', data_criacao = NOW(), tipo = '$tipo', 
                texto = '$msg', url = '$url', id_grupo = '0'";
        $this->db->query($sql);
    }
}
    
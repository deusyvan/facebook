<?php
namespace Models;

use \Core\Model;

class Grupos extends Model {
    
    public function getGrupos(){
        $array = array();
        
        $sql = "SELECT id, titulo FROM grupos";
        $sql = $this->db->query($sql);
        
        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }
        return $array;
        
    }
    
    public function criar($titulo) {
        $id_usuario = $_SESSION['lgsist'];
        
        $sql = "INSERT INTO grupos SET id_usuario = '$id_usuario', titulo = '$titulo'";
        $this->db->query($sql);
        
        return $this->db->lastInsertId();
    }
}

<?php
namespace Models;

use \Core\Model;
use PDO;

class Posts extends Model {
    
    public function addPost($msg, $foto, $id_grupo = '0')
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
                texto = '$msg', url = '$url', id_grupo = '$id_grupo'";
        $this->db->query($sql);
    }
    
    public function getFeed($id_grupo = '0') 
    {
        $array = array();
        $posts = array();
        
        $r = new Relacionamentos();
        //Buscando os id dos amigos;
        $ids = $r->geIdsFriends($_SESSION['lgsist']);
        $ids[] = $_SESSION['lgsist'];
        
        //Buscando os posts
        $sql = "SELECT *,
             (select usuarios.nome from usuarios where usuarios.id = posts.id_usuario) AS nome,
             (select count(*) from posts_likes where posts_likes.id_post = posts.id ) AS likes,
             (select count(*) from posts_likes where posts_likes.id_post = posts.id 
              and posts_likes.id_usuario = '".$_SESSION['lgsist']."') AS liked
                FROM posts WHERE id_usuario IN(".implode(',', $ids).") AND id_grupo = '$id_grupo' ORDER BY data_criacao DESC";
        $sql = $this->db->query($sql);
        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
            foreach ($array as $post) {
                $post['comentarios'] = $this->buscarComentarios($post['id']);
                $posts[] = $post;
            }
        }
        
        return $posts;
    }
    
    public function isLiked($id,$id_usuario)
    {
        $sql = "SELECT * FROM posts_likes WHERE id_post = '$id' AND id_usuario = '$id_usuario'";
        $sql = $this->db->query($sql);
        
        if($sql->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }
    
    public function removeLike($id,$id_usuario)
    {
        $this->db->query("DELETE FROM posts_likes WHERE id_post = '$id' AND id_usuario = '$id_usuario'");
    }
    
    public function addLike($id,$id_usuario)
    {
        $this->db->query("INSERT INTO posts_likes SET id_post = '$id', id_usuario = '$id_usuario'");
    }
    
    public function addComentario($id,$id_usuario,$txt)
    {
        $this->db->query("INSERT INTO posts_comentarios SET id_post = '$id', id_usuario = '$id_usuario', data_criacao = NOW(), texto = '$txt'");
    }
    
    public function buscarComentarios($id_post) {
        $array = array();
        $sql = "SELECT 
                (select usuarios.nome from usuarios where usuarios.id = posts_comentarios.id_usuario) AS nome,
                 texto FROM posts_comentarios WHERE id_post = '$id_post'";
        $sql = $this->db->query($sql);
        $array = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }
}
    
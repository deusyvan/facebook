<?php
namespace Controllers;

use \Core\Controller;
use \Models\Usuarios;
use Models\Relacionamentos;
use Models\Posts;

class AjaxController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $u = new Usuarios();
        $u->verificarLogin();
    }
    
    public function index(){}
	
    public function add_friend(){
        if(isset($_POST['id']) && !empty($_POST['id'])){
            $id = addslashes($_POST['id']);
            
            $r = new Relacionamentos();
            $r->addFriend($_SESSION['lgsist'], $id);
        }
    }
    
    public function aceitar_friend(){
        if(isset($_POST['id']) && !empty($_POST['id'])){
            $id = addslashes($_POST['id']);
            
            $r = new Relacionamentos();
            $r->aceitarFriend($_SESSION['lgsist'], $id);
        }
    }
    
    public function curtir()
    {
        if(isset($_POST['id']) && !empty($_POST['id'])){
            //Recebe o id recebido pelo post de ajax: data:{id:id}
            $id = addslashes($_POST['id']);
            $id_usuario = $_SESSION['lgsist'];
            
            //Verifica para saber se a postagem está curtida pelo usuario ou não e altera
            $p = new Posts();
            if($p->isLiked($id, $id_usuario)){
                $p->removeLike($id, $id_usuario);
            } else {
                $p->addLike($id,$id_usuario);
            }
        }
    }
    
    public function comentar()
    {
        if(isset($_POST['id']) && !empty($_POST['id'])){
            //Recebe o id e o txt recebido pelo post de ajax: data:{id:id, txt:txt}
            $id = addslashes($_POST['id']);
            $txt = addslashes($_POST['txt']);
            //Busca o id do usuario logado
            $id_usuario = $_SESSION['lgsist'];
            $p = new Posts();
            
            //Verifica se txt está preenchido:
            if(!empty($txt)){
                //Realiza o comentario inserindo no model
                $p->addComentario($id,$id_usuario,$txt);
            }
        }
    }

}
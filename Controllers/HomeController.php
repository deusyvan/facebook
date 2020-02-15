<?php
namespace Controllers;

use \Core\Controller;
use \Models\Usuarios;
use Models\Relacionamentos;
use Models\Posts;

class HomeController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $u = new Usuarios();
        $u->verificarLogin();
    }
    
	public function index()
	{
        $u = new Usuarios();
        $p = new Posts();
        $r = new Relacionamentos();

        $dados = array('usuario_nome' => '');
	    
        $dados['usuario_nome'] = $u->getNome($_SESSION['lgsist']);
        
        if (isset($_POST['post']) && !empty($_POST['post'])) {
            $postmsg = addslashes($_POST['post']);
            $foto = array();
            
            if(isset($_FILES['foto']) && !empty($_FILES['foto']['tmp_name'])){
                $foto = $_FILES['foto'];
            }
            
            $p->addPost($postmsg, $foto);
            
        }
        
        
        $dados['sugestoes'] = $u->getSugestoes(3);
        $dados['requisicoes'] = $r->getRequisicoes();
        $dados['totalamigos'] = $r->getTotalAmigos($_SESSION['lgsist']);
        $dados['feed'] = $p->getFeed();
	    
	    $this->loadTemplate('home', $dados);
	}

}
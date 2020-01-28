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
	    $dados = array('usuario_nome' => '');
	    
        $u = new Usuarios();
        $dados['usuario_nome'] = $u->getNome($_SESSION['lgsist']);
        
        if (isset($_POST['post']) && !empty($_POST['post'])) {
            $postmsg = addslashes($_POST['post']);
            
            $p = new Posts();
            $p->addPost($postmsg);
            
        }
        
        $r = new Relacionamentos();
        
        $dados['sugestoes'] = $u->getSugestoes(3);
        $dados['requisicoes'] = $r->getRequisicoes();
        $dados['totalamigos'] = $r->getTotalAmigos($_SESSION['lgsist']);
        
	    
	    $this->loadTemplate('home', $dados);
	}

}
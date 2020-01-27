<?php
namespace Controllers;

use \Core\Controller;
use \Models\Usuarios;
use Models\Relacionamentos;

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
        
        $r = new Relacionamentos();
        
        $dados['sugestoes'] = $u->getSugestoes(3);
        $dados['requisicoes'] = $r->getRequisicoes();
	    
	    $this->loadTemplate('home', $dados);
	}

}
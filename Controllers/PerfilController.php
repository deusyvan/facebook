<?php
namespace Controllers;

use \Core\Controller;
use \Models\Usuarios;

class PerfilController extends Controller {

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
        
        $dados['info'] = $u->getDados($_SESSION['lgsist']);
	    
	    $this->loadTemplate('perfil', $dados);
	}

}
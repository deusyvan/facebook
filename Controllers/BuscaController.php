<?php
namespace Controllers;

use \Core\Controller;
use \Models\Usuarios;
use \Models\Grupos;
use Models\Posts;

class BuscaController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $u = new Usuarios();
        $u->verificarLogin();
    }
    
    public function index()
    {
        $u = new Usuarios();
        $dados = array(
            'usuario_nome' => ''
        );
        
        $dados['usuario_nome'] = $u->getNome($_SESSION['lgsist']);
        
        $dados['resultado'] = $u->procurar($_GET['q']);
        
        $this->loadTemplate('busca', $dados);
    }
}
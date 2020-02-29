<?php
namespace Controllers;

use \Core\Controller;
use \Models\Usuarios;
use \Models\Grupos;

class GrupoController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $u = new Usuarios();
        $u->verificarLogin();
    }
    
    public function abrir($id_grupo)
    {
        $u = new Usuarios();
        $g = new Grupos();
        
        $dados = array(
            'usuario_nome' => ''
        );
        
        $dados['usuario_nome'] = $u->getNome($_SESSION['lgsist']);
        
        $this->loadTemplate('grupo', $dados);
    }

}
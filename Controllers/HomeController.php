<?php
namespace Controllers;

use \Core\Controller;
use \Models\Usuarios;

class HomeController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $u = new Usuarios();
        $u->verificarLogin();
    }
    
	public function index() {
	    $dados = array();
	    /*  $array = array(
	     'nome' => ''
	     );
	     $p = new Posts();
	     
	     if(isset($_POST['msg']) && !empty($_POST['msg'])){
	     
	     $msg = addslashes($_POST['msg']);
	     $p->inserirPost($msg);
	     }
	     
	     $u = new Usuarios($_SESSION['twlg']);
	     $dados['nome'] = $u->getNome();
	     //print_r($dados);
	     $dados['qt_seguidos'] = $u->countSeguidos();
	     $dados['qt_seguidores'] = $u->countSeguidores();
	     $dados['sugestao'] = $u->getUsuarios(5);
	     
	     $lista = $u->getSeguidos();
	     $lista[]= $_SESSION['twlg'];
	     $dados['feed'] = $p->getFeed($lista, 10); */
	    
	    $this->loadTemplate('home', $dados);
	}

}
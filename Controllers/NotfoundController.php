<?php
namespace Controllers;

use \Core\Controller;

class NotfoundController extends Controller {

	public function index() {
	    $array = array();
	    
	    $this->loadTemplate('404', $array);
	}

}
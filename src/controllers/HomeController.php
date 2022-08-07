<?php
namespace src\controllers;

use \core\Controller;

class HomeController extends Controller {

    private $loggedUser;

    
    public function index() {
        
        $this->render('home', [
            'loggedUser' => []
            
        ]);
    }

}
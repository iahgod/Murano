<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \src\models\Notificacao_Relacao;
use \core\Mensagem;

class AdminController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/admin/login');
        }
    }
    public function teste() {
        $this->render('admin/teste', [
            'loggedUser' => $this->loggedUser,
            'menu' => $this->menu_admin($this->loggedUser->id)
        ]);
    }
    public function index() {
        $this->render('admin/index', [
            'loggedUser' => $this->loggedUser,
            'menu' => $this->menu_admin($this->loggedUser->id)
        ]);
    }
    public function viuNotificacao($atts = []){
        if(!empty($atts['id'])) {

            $id = $atts['id'];
            Notificacao_Relacao::insert([
                'id_notificacao' => $id,
                'id_user' => $this->loggedUser->id,
                'status' => 1
            ])->execute();

        }
        $this->voltaPagina();
    }

}
<?php
namespace src\controllers\Admin;

use \core\Controller;
use \src\handlers\UserHandler;
use \core\murano\DB;
use \core\murano\Mensagem;
use \core\murano\Email;

class AdminController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/admin/login');
        }
    }

    public function index() {
        $this->render('admin/painel/index', [
            'loggedUser' => $this->loggedUser,
            'titulo' => 'Index'
        ]);
    }
    //! LOGS DOS USUARIOS
    public function log() {
        
        $lista = DB::table('log')
        ->select('log.id, users.nome, log.tipo, log.tabela, log.data')
        ->join('users', 'users.id', '=', 'log.id_user')
        ->orderby('log.id', 'desc')->get();
       
        $this->render('admin/logs/lista', [
            'loggedUser' => $this->loggedUser,
            'titulo' => 'Logs',
            'lista' => $lista
        ]);
    }

    public function teste() {
        $this->dd($_SESSION['Usuario']);
        $this->render('admin/painel/blank', [
            'loggedUser' => $this->loggedUser,
            'titulo' => 'Index'
        ]);
    }

}
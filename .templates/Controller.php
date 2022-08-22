<?php
namespace src\controllers\MenuAdmin;

use \core\Controller;
use \core\murano\DB;
use \core\murano\Log;
use \core\murano\Mensagem;
use \src\handlers\UserHandler;

class MenuController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/admin/login');
        }
    }

    //? LISTAGENS
    public function lista() {

      $lista = DB::table('Menu')->select()->get();

      $this->render('admin/menu/lista', [
          'loggedUser' => $this->loggedUser,
          'titulo'     => 'Index',
          'lista'      => $lista
      ]);

        Log::inserir('Acessou', 'Lista de Menu');
        
    }

    //? FORM DE NOVO E EDITAR
    public function form() {
        $id = filter_input(INPUT_POST, 'id');

        if($id){


            
        }else{

            

        }

        Log::inserir('Acessou', 'Menu');

    }

    //? AÇÃO DE INSERIR E EDITAR
    public function action() {
        $id = filter_input(INPUT_POST, 'id');

        if($id){


            Log::inserir('Editou', 'Menu');
            Mensagem::sucesso('Item editado com sucesso!');

        }else{


            Log::inserir('Criou', 'Menu');
            Mensagem::sucesso('Item criado com sucesso!');

        }

        $this->voltaPagina();

    }

    //? AÇÃO DE EXCLUIR
    public function delete($atts = []){

        if(!empty($atts['id'])) {

            Log::inserir('Deletou', 'Menu');
            $id = $atts['id'];
            DB::table('table')->delete()->where('id', $id)->execute();
            Mensagem::sucesso('Item deletado com sucesso!');
            

        }else{

            Mensagem::erro('Aconteceu algum erro, ou você não tem acesso a esta página!');

        }

        $this->voltaPagina();

    }



}

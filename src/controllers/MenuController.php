<?php
namespace src\controllers;

use \core\Controller;
use \core\Mensagem;
use \src\models\Menu_Admin;
use \src\models\Menu_Admin_Sub;
use \src\handlers\UserHandler;

class MenuController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/admin/login');
        }
    }

    public function index() {
        $Menu = Menu_Admin::select()->get();
        $Menu_Admin_Sub = Menu_Admin_Sub::select()->get();
        $this->render('admin/menu/lista', [
            'loggedUser' => $this->loggedUser,
            'menu' => $this->menu_admin($this->loggedUser->id),
            'Menu' => $Menu,
            'MenuSub' => $Menu_Admin_Sub
        ]);
    }
    public function form($atts = []){
        //Se tiver id vai mostrar form para editar
        $Menu = Menu_Admin::select()->get();
       
        if(!empty($atts['id'])) {
            $id = $atts['id'];
            $Menu_Admin = Menu_Admin::select()->where('id', $id)->one();
            if(!$Menu_Admin){
                Mensagem::sucesso('Menu_Admin não encontrado!');
                $this->voltaPagina();
            }

            $titulo = $Menu_Admin['titulo'];
            

            $this->render('admin/menu/form', [
                'loggedUser' => $this->loggedUser,
                'titulo' => $titulo,
                'Menu_Admin' => $Menu_Admin,
                'menu' => $this->menu_admin($this->loggedUser->id),
            ]);

        }else{
            //Se não vai abrir FORM de inserir
            $titulo = 'Novo';

            $this->render('admin/menu/form', [
                'loggedUser' => $this->loggedUser,
                'titulo' => $titulo,
                'menu' => $this->menu_admin($this->loggedUser->id),
                'Menu' => $Menu
            ]);
        }
    }

    public function action($atts = []){
        $dados = [];

        foreach(['titulo', 'icone', 'ordem', 'ativo', 'url'] as $item){

            if(filter_input(INPUT_POST, $item)){
                $dados[$item] = filter_input(INPUT_POST, $item);
            }else{
                Mensagem::erro('É necessário enviar todos os dados!');
                $this->voltaPagina();
            }

        }

        Menu_Admin::insert([$dados])->execute();

        Mensagem::sucesso('Menu adicionado com sucesso!');
        $this->voltaPagina();
    }

    public function actionSub(){
        //Se tem id vai editar
        $dados = [];

        foreach(['titulo', 'url', 'id_menu'] as $item){

            if(filter_input(INPUT_POST, $item)){
                $dados[$item] = filter_input(INPUT_POST, $item);
            }else{
                Mensagem::erro('É necessário enviar todos os dados!');
                $this->voltaPagina();
            }

        }

        Menu_Admin_Sub::insert([$dados])->execute();

        Mensagem::sucesso('Sub-Menu adicionado com sucesso!');
        $this->voltaPagina();

    }

    public function delete($atts = []){

        if(!empty($atts['id'])) {

            $id = $atts['id'];
            Menu_Admin::delete()->where('id', $id)->execute();
            Mensagem::sucesso('Deletado com sucesso!');
            $this->voltaPagina();

        }else{

            Mensagem::sucesso('Erro ao excluir!');
            $this->voltaPagina();
            
        }

    }

    public function deleteSub($atts = []){

        if(!empty($atts['id'])) {

            $id = $atts['id'];
            Menu_Admin_Sub::delete()->where('id', $id)->execute();
            Mensagem::sucesso('Deletado com sucesso!');
            $this->voltaPagina();

        }else{

            Mensagem::sucesso('Erro ao excluir!');
            $this->voltaPagina();
            
        }

    }

    public function status($atts = []){

        if(!empty($atts['id'])) {

            $id = $atts['id'];
            $item = Menu_Admin::select()->where('id', $id)->one();
            if($item['ativo'] == 1){
                Menu_Admin::update()->set('ativo', 0)->where('id', $id)->execute();
            }else{
                Menu_Admin::update()->set('ativo', 1)->where('id', $id)->execute();
            }
            Mensagem::sucesso('Alterado com sucesso!');
            $this->voltaPagina();

        }else{

            Mensagem::sucesso('Erro ao alterar o status!');
            $this->voltaPagina();
            
        }

    }

}
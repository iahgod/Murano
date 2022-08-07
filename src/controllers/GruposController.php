<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \core\Mensagem;
use \core\DB;
use \src\models\Grupo;

class GruposController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/admin/login');
        }
    }

    public function index() {
        $grupos = DB::table('grupos')->select()->get();
        $this->render('admin/grupos/lista', [
            'loggedUser' => $this->loggedUser,
            'menu' => $this->menu_admin($this->loggedUser->id),
            'grupos' => $grupos
        ]);
    }

    public function form($atts = []){
        if(!empty($atts['id'])) {
            $id = $atts['id'];
            $grupo = DB::table('grupos')->select()->where('id', $id)->one();

            if(!$grupo){
                Mensagem::sucesso('grupo não encontrado!');
                $this->voltaPagina();
            }

            $titulo = 'Editar';
            
            $grupo_permissoes = DB::table('grupos_permissoes')->select()->where('id_grupo', $id)->one();
            $menusUser = explode('.', $grupo_permissoes['menus']);
            $menus = DB::table('menu_admins')->select()->where('ativo', 1)->get();

            $listaMenus = [
                'menusUser' => $menusUser,
                'menus' => $menus
            ];

            //$this->dd($listaMenus);

            $this->render('admin/grupos/form', [
                'loggedUser' => $this->loggedUser,
                'menu' => $this->menu_admin($this->loggedUser->id),
                'titulo' => $titulo,
                'grupo' => $grupo,
                'listaMenus' => $listaMenus
            ]);

        }else{
            //Se não vai abrir FORM de inserir
            $titulo = 'Novo';

            $this->render('admin/grupos/form', [
                'loggedUser' => $this->loggedUser,
                'menu' => $this->menu_admin($this->loggedUser->id),
                'titulo' => $titulo,
                'grupo' => []
            ]);
        }
    }

    public function action(){
        //Se tem id vai editar
        $id = filter_input(INPUT_POST, 'id');
        if($id) {

            $Grupo = DB::table('grupos')->select()->where('id', $id)->one();

            if(!$Grupo){
                Mensagem::erro('Grupo não encontrado!');
                $this->voltaPagina();
            }

            $dados = [];

            foreach(['descricao'] as $item): 
                $dados[$item] = filter_input(INPUT_POST, $item); 
            endforeach;
            

            $menus = DB::table('menu_admins')->select()->where('ativo', 1)->get();

            $aMenu = [];
            foreach($menus as $item): $aMenu[] = $item['url']; endforeach;

            $dadosMenu = '';
            foreach($aMenu as $item):
                if(filter_input(INPUT_POST, $item) !== null){

                    $dadosMenu .= current(DB::table('menu_admins')->select('id')->where('url', $item)->one()).'.';

                }
            endforeach;

            DB::table('grupos_permissoes')->update()
            ->set('menus', $dadosMenu)
            ->where('id_grupo', $id)->execute();

            if(!$dados){
                Mensagem::erro('É necessário enviar todos os dados!');
                $this->voltaPagina();
            }

            $atualiza = Grupo::update();

            foreach($dados as $nome => $valor){

                $atualiza->set($nome, $valor);

            }
            
            $atualiza->where('id', $id)->execute();

            Mensagem::sucesso('Grupo atualizado com sucesso!');
            $this->voltaPagina();

        }else{
            //Se não vai inserir

            $dados = [];

            foreach(['descricao'] as $item){

                $dados[$item] = filter_input(INPUT_POST, $item);

            }

            if(!$dados){
                Mensagem::erro('É necessário enviar todos os dados!');
                $this->voltaPagina();
            }

            Grupo::insert([$dados])->execute();

            Mensagem::sucesso('Grupo adicionado com sucesso!');
            $this->redirect('/admin/grupos');
        }
    }

    public function delete($atts = []){
    
        if(!empty($atts['id'])) {

            $id = $atts['id'];
            Grupo::delete()->where('id', $id)->execute();
            Mensagem::sucesso('Deletado com sucesso!');
            $this->voltaPagina();

        }else{

            Mensagem::sucesso('Erro ao excluir!');
            $this->voltaPagina();
            
        }

    }
}
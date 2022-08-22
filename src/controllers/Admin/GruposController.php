<?php
namespace src\controllers\Admin;

use \core\Controller;
use \src\handlers\UserHandler;
use \core\murano\Mensagem;
use \core\murano\DB;
use \core\murano\Log;
use \src\models\Grupo;

class GruposController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/admin/login');
        }
    }

    public function lista() {

        $lista = DB::table('grupos')->select()->get();

        $this->render('admin/grupos/lista', [
            'loggedUser' => $this->loggedUser,
            'titulo'     => 'Menu',
            'lista'      => $lista
        ]);

        Log::inserir('Acessou', 'Lista de grupos');
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

            $this->render('admin/grupos/form', [
                'loggedUser' => $this->loggedUser,
                'titulo' => $titulo,
                'grupo' => $grupo,
                'listaMenus' => $listaMenus
            ]);

            Log::inserir('Acessou', 'Form de editar grupo');

        }else{
            //Se não vai abrir FORM de inserir
            $titulo = 'Novo';

            $this->render('admin/grupos/form', [
                'loggedUser' => $this->loggedUser,
                'titulo' => $titulo,
                'grupo' => []
            ]);

            Log::inserir('Acessou', 'Form de adicionar grupo');
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
            foreach($menus as $item): $aMenu[] = $item['id']; endforeach;

            $dadosMenu = '';

            foreach($_REQUEST as $key => $item){

                if(in_array($key, $aMenu)){
                    $dadosMenu .= $key.'.';
                }

            }

            DB::table('grupos_permissoes')->update()
            ->set('menus', $dadosMenu)
            ->where('id_grupo', $id)->execute();

            if(!$dados){
                Mensagem::erro('É necessário enviar todos os dados!');
                $this->voltaPagina();
            }

            $atualiza = DB::table('grupos')->update();

            foreach($dados as $nome => $valor){

                $atualiza->set($nome, $valor);

            }
            
            $atualiza->where('id', $id)->execute();

            Log::inserir('Editou', 'Editou um grupo');
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

            DB::table('grupos')->insert([$dados])->execute();

            Log::inserir('Criou', 'Criou um grupo');
            Mensagem::sucesso('Grupo adicionado com sucesso!');
            $this->redirect('/admin/grupos/lista');
        }
    }

    public function delete($atts = []){
    
        if(!empty($atts['id'])) {

            $id = $atts['id'];
            if($id == 1 || $id == 2){
                Mensagem::erro('Não é possível excluir um grupo de Administrador ou Usuário!');
                $this->voltaPagina();
            }
            DB::table('grupos')->delete()->where('id', $id)->execute();
            Log::inserir('Deletou', 'Deletou um grupo');
            Mensagem::sucesso('Deletado com sucesso!');
            $this->voltaPagina();

        }else{

            Mensagem::sucesso('Erro ao excluir!');
            $this->voltaPagina();
            
        }

    }
}
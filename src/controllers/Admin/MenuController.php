<?php
namespace src\controllers\Admin;

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

        $lista = DB::table('menu_admins')->select()->get();

        $this->render('admin/menu/lista', [
            'loggedUser' => $this->loggedUser,
            'titulo'     => 'Menu',
            'lista'      => $lista
        ]);

        Log::inserir('Acessou', 'Lista de Menu');

    }

    //? FORM DE NOVO E EDITAR
    public function form() {
        $id = filter_input(INPUT_POST, 'id');

        if($id){


            
        }else{
            $lista = DB::table('menu_admins')->select()->get();
            $this->render('admin/menu/form', [
                'loggedUser' => $this->loggedUser,
                'titulo'     => 'Adicionar menu',
                'lista'      => $lista
            ]);

        }

        Log::inserir('Acessou', 'Form de inserir menu');

    }

    //? AÇÃO DE INSERIR E EDITAR
    public function action() {
        $id = filter_input(INPUT_POST, 'id');

        if($id){


            Log::inserir('Editou', 'Menu');
            Mensagem::sucesso('Item editado com sucesso!');

        }else{

            $dados = [];

            foreach(['titulo', 'icone', 'ordem', 'ativo', 'url'] as $item){

                if(filter_input(INPUT_POST, $item)){
                    $dados[$item] = filter_input(INPUT_POST, $item);
                }else{
                    Mensagem::erro('É necessário enviar todos os dados!');
                    $this->voltaPagina();
                }

            }

            $idPai = filter_input(INPUT_POST, 'idpai');

            if($idPai){
                $dados['id_pai'] = $idPai;
            }

            DB::table('menu_admins')->insert($dados)->execute();

            Log::inserir('Criou', 'Menu');
            Mensagem::sucesso('Item criado com sucesso!');

        }

        $this->voltaPagina();

    }

    //? MUDAR STATUS DO MENU
    public function status($atts = []){

        if(!empty($atts['id'])) {

            $id = $atts['id'];
            $item = DB::table('menu_admins')->select()->where('id', $id)->one();

            if($item['ativo'] == 1){
                DB::table('menu_admins')->update()->set('ativo', 0)->where('id', $id)->execute();
            }else{
                DB::table('menu_admins')->update()->set('ativo', 1)->where('id', $id)->execute();
            }

            Mensagem::sucesso('Alterado com sucesso, saia e entre novamente para atualizar!');
            $this->voltaPagina();

        }else{

            Mensagem::sucesso('Erro ao alterar o status!');
            $this->voltaPagina();
            
        }

    }

    //? AÇÃO DE EXCLUIR
    public function delete($atts = []){

        if(!empty($atts['id'])) {

            Log::inserir('Deletou', 'Menu');
            $id = $atts['id'];
            DB::table('menu_admins')->delete()->where('id', $id)->execute();
            Mensagem::sucesso('Item deletado com sucesso, saia e entre novamente para atualizar!');
            

        }else{

            Mensagem::erro('Aconteceu algum erro, ou você não tem acesso a esta página!');

        }

        $this->voltaPagina();

    }



}
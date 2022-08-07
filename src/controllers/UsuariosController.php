<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \core\Mensagem;
use \core\DB;
use \src\models\User;

class UsuariosController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/admin/login');
        }
    }
    //! LISTA
    public function index() {

        $users = DB::table('users')
        ->select('users.id, users.nome, users.id_grupo, users.email, users.criado_em, users.foto')
        ->get();
        $usuarios = [];
        foreach($users as $item):
        $usuarios[] = [
            'id' => $item['id'],
            'id_grupo' => $item['id_grupo'],
            'descricao' => current(DB::table('grupos')->select('descricao')->where('id', $item['id_grupo'])->one()),
            'nome' => $item['nome'],
            'email' => $item['email'],
            'criado_em' => $item['criado_em'],
            'foto' => $item['foto']
        ];
        endforeach;

        $this->render('admin/usuario/lista', [
            'loggedUser' => $this->loggedUser,
            'menu' => $this->menu_admin($this->loggedUser->id),
            'usuarios' => $usuarios
        ]);
    }
    //! FORM
    public function form($atts = []){
        //Se tiver id vai mostrar form para editar
        $grupos = DB::table('grupos')->select()->get();
        if(!empty($atts['id'])) {
            $id = $atts['id'];

            $user = DB::table('users')
            ->select('users.id, users.nome, users.id_grupo, users.email, users.criado_em, users.foto')
            ->where('id', $id)
            ->one();
            $User = [];

            $User = [
                'id' => $user['id'],
                'id_grupo' => $user['id_grupo'],
                'descricao' => current(DB::table('grupos')->select('descricao')->where('id', $user['id_grupo'])->one()),
                'nome' => $user['nome'],
                'email' => $user['email'],
                'criado_em' => $user['criado_em'],
                'foto' => $user['foto']
            ];

            if(!$User){
                Mensagem::sucesso('Usuário não encontrado!');
                $this->voltaPagina();
            }

            $titulo = 'Editar';

            $this->render('admin/usuario/form', [
                'loggedUser' => $this->loggedUser,
                'menu' => $this->menu_admin($this->loggedUser->id),
                'titulo' => $titulo,
                'User' => $User,
                'grupos' => $grupos
            ]);

        }else{
            //Se não vai abrir FORM de inserir
            $titulo = 'Novo';

            $this->render('admin/usuario/form', [
                'loggedUser' => $this->loggedUser,
                'menu' => $this->menu_admin($this->loggedUser->id),
                'titulo' => $titulo,
                'User' => [],
                'grupos' => $grupos
            ]);
        }
    }
    //! FORM ACTION
    public function action(){
        $id = filter_input(INPUT_POST, 'id');
        if($id) {

            $Usuário = DB::table('users')->select()->where('id', $id)->one();

            if(!$Usuário){
                Mensagem::erro('Usuário não encontrado!');
                $this->voltaPagina();
            }

            $dados = [];

            foreach(['nome', 'email', 'id_grupo'] as $item){

                $dados[$item] = filter_input(INPUT_POST, $item);

            }

            if(!$dados){
                Mensagem::erro('É necessário enviar todos os dados!');
                $this->voltaPagina();
            }

            $atualiza = User::update();

            foreach($dados as $nome => $valor){

                $atualiza->set($nome, $valor);

            }
            
            $atualiza->where('id', $id)->execute();

            Mensagem::sucesso('Usuário atualizado com sucesso!');
            $this->voltaPagina();

        }else{
            
            $dados = [];

            foreach(['nome', 'email', 'senha', 'id_grupo'] as $item):
                $dados[$item] = filter_input(INPUT_POST, $item);
            endforeach;

            $email = filter_input(INPUT_POST, 'email');

            if(UserHandler::emailExists($email) === false) {

                $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);

                $dados['criado_em'] = date('Y-m-d');
                if(!$dados){
                    Mensagem::erro('É necessário enviar todos os dados!');
                    $this->voltaPagina();
                }

                User::insert([$dados])->execute();
                
                Mensagem::sucesso('Usuário adicionado com sucesso!');
                $this->redirect('/admin/usuarios');
                
            }else{
                Mensagem::erro('Este em-mail já foi cadastrado no sistema!');
                $this->voltaPagina();
            }

            
        }
    }

    //!DELETAR

    public function delete($atts = []){
    
        if(!empty($atts['id'])) {

            $id = $atts['id'];
            User::delete()->where('id', $id)->execute();
            Mensagem::sucesso('Deletado com sucesso!');
            $this->voltaPagina();

        }else{

            Mensagem::sucesso('Erro ao excluir!');
            $this->voltaPagina();
            
        }

    }


}
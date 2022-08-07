<?php
namespace src\controllers;

use \core\Controller;
use \core\Mensagem;
use \src\models\Exemplo;

class ExemploController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/admin/login');
        }
    }

    public function index() {
        $this->render('Exemplo/Lista', [
            'loggedUser' => $loggedUser
        ]);
    }
    public function form($atts = []){
        //Se tiver id vai mostrar form para editar
        if(!empty($atts['id'])) {
            $Exemplo = Exemplo::select()->where('id', $id)->one();

            if(!$Exemplo){
                Mensagem::sucesso('Exemplo não encontrado!');
                $this->voltaPagina();
            }

            $titulo = $Exemplo['titulo'];
            $id = $atts['id'];

            $this->render('Exemplo/Form', [
                'loggedUser' => $loggedUser,
                'titulo' => $titulo,
                'Exemplo' => $Exemplo
            ]);

        }else{
            //Se não vai abrir FORM de inserir
            $titulo = 'Novo';

            $this->render('Exemplo/Form', [
                'loggedUser' => $loggedUser,
                'titulo' => $titulo,
                'Exemplo' => $Exemplo
            ]);
        }
    }

    public function action($atts = []){
        //Se tem id vai editar
        if(!empty($atts['id'])) {

            $id = $atts['id'];
            $Exemplo = Exemplo::select()->where('id', $id)->one();

            if(!$Exemplo){
                Mensagem::erro('Exemplo não encontrado!');
                $this->voltaPagina();
            }

            $dados = [];

            foreach([] as $item){

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

            Mensagem::sucesso('Exemplo atualizado com sucesso!');
            $this->voltaPagina();

        }else{
            //Se não vai inserir

            $dados = [];

            foreach([] as $item){

                $dados[$item] = filter_input(INPUT_POST, $item);

            }

            if(!$dados){
                Mensagem::erro('É necessário enviar todos os dados!');
                $this->voltaPagina();
            }

            Exemplo::insert([$dados])->execute();

            Mensagem::sucesso('Exemplo adicionado com sucesso!');
            $this->voltaPagina();
        }
    }

    public function delete($atts = []){

        if(!empty($atts['id'])) {

            $id = $atts['id'];
            Exemplo::delete()->where('id', $id)->execute();
            Mensagem::sucesso('Deletado com sucesso!');
            $this->voltaPagina();

        }else{

            Mensagem::sucesso('Erro ao excluir!');
            $this->voltaPagina();
            
        }

    }

}
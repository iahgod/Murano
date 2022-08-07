<?php
namespace src\controllers;

use \core\Controller;
use \core\Mensagem;
use \src\models\TESTE;
use \src\handlers\UserHandler;
use \src\models\Menu_Admin;
use \src\models\Menu_Admin_Sub;

class testwe extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/admin/login');
        }
    }

    
    public function form($atts = []){
        //Se tiver id vai mostrar form para editar
        if(!empty($atts['id'])) {
            $teste = teste::select()->where('id', $id)->one();

            if(!$teste){
                Mensagem::sucesso('teste não encontrado!');
                $this->voltaPagina();
            }

            $titulo = $teste['titulo'];
            $id = $atts['id'];

            $this->render('teste/Form', [
                'loggedUser' => $loggedUser,
                'titulo' => $titulo,
                'teste' => $teste
            ]);

        }else{
            //Se não vai abrir FORM de inserir
            $titulo = 'Novo';

            $this->render('teste/Form', [
                'loggedUser' => $loggedUser,
                'titulo' => $titulo,
                'teste' => $teste
            ]);
        }
    }

    public function action($atts = []){
            //Se tem id vai editar
            if(!empty($atts['id'])) {
    
                $id = $atts['id'];
                $Teste = Teste::select()->where('id', $id)->one();
    
                if(!$Teste){
                    Mensagem::erro('Teste não encontrado!');
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
    
                Mensagem::sucesso('Teste atualizado com sucesso!');
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
    
                Teste::insert([$dados])->execute();
    
                Mensagem::sucesso('Teste adicionado com sucesso!');
                $this->voltaPagina();
            }
        }

    public function delete($atts = []){
    
            if(!empty($atts['id'])) {
    
                $id = $atts['id'];
                teste::delete()->where('id', $id)->execute();
                Mensagem::sucesso('Deletado com sucesso!');
                $this->voltaPagina();
    
            }else{
    
                Mensagem::sucesso('Erro ao excluir!');
                $this->voltaPagina();
                
            }
    
        }

}
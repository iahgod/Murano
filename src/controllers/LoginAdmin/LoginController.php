<?php
namespace src\controllers\LoginAdmin;

use \src\handlers\UserHandler;
use \core\Controller;
use \core\murano\BD;
use \core\murano\Mensagem;
use \core\murano\Email;
use \core\murano\Menu;

class LoginController extends Controller {

    //! render login
    public function loginView() {

        $this->render('admin/login/login', ['titulo' => 'Login']);

    }

    //! ação para login
    public function loginAction() {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        if($email && $password) {
            $token = UserHandler::verifyLogin($email, $password);
            if($token) {
                $_SESSION['token'] = $token;

                Menu::loadMenu();

                $this->redirect('/admin');
            } else {
                Mensagem::erro('E-mail e/ou senha não conferem!');
                $this->redirect('/admin/login');
            }
        } else {
            Mensagem::erro('Informe todos os campos!');
            $this->redirect('/admin/login');
        }
    }

    //! Render cadastro
    public function cadastroView() {

        if(!\src\Constant::ADMIN_CADASTRO){$this->render('erro', ['mensagem' => 'ERRO 401 - Autorização requerida.']);exit;}

        $this->render('admin/login/cadastro', ['titulo' => 'Cadastro']);
    }
    
    //! Ação de cadastro
    public function cadastroAction() {
        $name = filter_input(INPUT_POST, 'nome');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'senha');
        $password2 = filter_input(INPUT_POST, 'senha2');

        if($name && $email && $password) {
            if($password != $password2){
                Mensagem::erro('As senhas não conferem!');
                $this->redirect('/admin/cadastro');
            }
            if(UserHandler::emailExists($email) === false) {
                $token = UserHandler::addUser($name, $email, $password);
                $_SESSION['token'] = $token;
                $this->redirect('/admin');
            } else {
                Mensagem::erro('E-mail já cadastrado!');
                $this->redirect('/admin/cadastro');
            }

        } else {
            Mensagem::erro('Informe todos os campos!');
            $this->redirect('/admin/cadastro');
        }
    }

    //! Render login
    public function logout() {
        $_SESSION['token'] = '';
        $this->redirect('/admin/login', ['titulo' => 'Login']);
    }

    //!Render esqueceu a senha
    public function esqueceuView() {

        $this->render('admin/login/esqueceu_senha', ['titulo' => 'Esqueceu senha']);

    }

    //!Action para esqueceu a senha
    public function esqueceuAction() {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        if($email) {
            if(UserHandler::emailExists($email)) {

                $user = UserHandler::gerarNovaSenha($email);
                
                $to_body = $user['user']['nome'].', Segue a sua nova senha do sistema '.\src\Constant::TITULO_SITE.', sua nova senha é: '. $user['senha'].', é importante fazer a alteração da mesma por segurança.';

                Email::enviar($email, $user['user']['nome'], 'Nova senha - '.\src\Constant::TITULO_SITE, $to_body);

                Mensagem::sucesso('E-mail enviado com uma nova senha!');
                $this->redirect('/admin/login');

            }else{
                Mensagem::erro('Este e-mail não existe em nossa base de dados!');
                $this->redirect('/admin/esqueceu-senha');
            }

        } else {
            Mensagem::erro('Informe o e-mail!');
            $this->redirect('/admin/esqueceu-senha');
        }
    }

}
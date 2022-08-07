<?php
namespace src\controllers;

use \core\Controller;
use \core\Mensagem;
use \src\handlers\UserHandler;

class UserController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/admin/login');
        }
    }
    public function conta() {
        
        $this->render('user/minha-conta', [
            'loggedUser' => $this->loggedUser,
            'menu' => $this->menu_admin($this->loggedUser->id)
        ]);

    }

    public function contaUpdate() {
        $aDado = [];
        $senha1 = filter_input(INPUT_POST, 'senha1');
        $senha2 = filter_input(INPUT_POST, 'senha2');

        if($senha1 && $senha2){

            if($senha1 === $senha2){

                foreach(['nome', 'senha1'] as $item){
                    
                    if($item == 'senha1'){

                        $aDado['senha'] = password_hash(filter_input(INPUT_POST, $item), PASSWORD_DEFAULT);
                        
                    }else{

                        $aDado[$item] = filter_input(INPUT_POST, $item);

                    }
        
                }

            }else{

                Mensagem::erro('As senhas não conferem!');
                $this->redirect('/admin/minha-conta');

            }
        }else{

            foreach(['nome'] as $item){

                $aDado[$item] = filter_input(INPUT_POST, $item);
    
            }
        }
        
        $fotoName = $this->loggedUser->foto;
        
        if(isset($_FILES['foto']) && !empty($_FILES['foto']['tmp_name'])) {

            $newFoto = $_FILES['foto'];

            if(in_array($newFoto['type'], ['image/jpeg', 'image/jpg', 'image/png'])) {
                
                $fotoName = $this->cutImage($newFoto, 500, 500, 'assets/uploads');

                if (file_exists('../assets/uploads/'.$this->loggedUser->foto)){
                    unlink('../assets/uploads/'.$this->loggedUser->foto);  
                }

                $aDado['foto'] = $fotoName;
            }
            
        }else{
            $aDado['foto'] = $this->loggedUser->foto;
        }
        

        UserHandler::update($aDado, $this->loggedUser->id);
        Mensagem::sucesso('Informações atualizadas com sucesso!');
        $this->redirect('/admin/minha-conta');
    }

}

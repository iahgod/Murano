<?php
namespace src\controllers\Admin;

use \core\Controller;
use \core\murano\Mensagem;
use \src\handlers\UserHandler;
use \core\murano\Image;
use \core\murano\Log;

class UserController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/admin/login');
        }
    }
    public function form() {
        
        $this->render('admin/user/form', [
            'loggedUser' => $this->loggedUser,
            'titulo' => 'Minha conta'
        ]);

        Log::inserir('Acessou', 'Página de minha conta');

    }

    public function action() {
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
                
                $fotoName = Image::cutImage($newFoto, 500, 500, 'assets/uploads');

                if (file_exists('../assets/uploads/'.$this->loggedUser->foto)){
                    unlink('../assets/uploads/'.$this->loggedUser->foto);  
                }

                $aDado['foto'] = $fotoName;
            }
            
        }else{
            $aDado['foto'] = $this->loggedUser->foto;
        }
        
        Log::inserir('Editou', 'Sua conta');

        UserHandler::update($aDado, $this->loggedUser->id);
        Mensagem::sucesso('Informações atualizadas com sucesso!');
        $this->redirect('/admin/minha-conta');
    }

}

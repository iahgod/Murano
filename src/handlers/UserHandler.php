<?php
namespace src\handlers;

use \src\models\User;
use \murano\DB;

class UserHandler {

    public static function checkLogin() {
        if(!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];

            $data = User::select()->where('token', $token)->one();
            if((bool) $data) {

                $loggedUser = new User();
                $loggedUser->id = $data['id'];
                $loggedUser->nome = $data['nome'];
                $loggedUser->email = $data['email'];
                $loggedUser->foto = $data['foto'];

                return $loggedUser;
            }
        }

        return false;
    }

    public static function verifyLogin($email, $password) {
        $user = User::select()->where('email', $email)->one();

        if($user) {
            if(password_verify($password, $user['senha'])) {
                $token = md5(time().rand(0,9999).time());

                User::update()
                    ->set('token', $token)
                    ->where('email', $email)
                ->execute();

                return $token;
            }
        }

        return false;
    }

    public function idExists($id) {
        $user = User::select()->where('id', $id)->one();
        return $user ? true : false;
    }

    public static function emailExists($email) {
        $user = User::select()->where('email', $email)->one();
        return $user ? true : false;
    }


    public static function addUser($name, $email, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $token = md5(time().rand(0,9999).time());

        User::insert([
            'email' => $email,
            'senha' => $hash,
            'nome' => $name,
            'token' => $token,
            'criado_em' => date('Y/m/d h:i'),
            'id_grupo' => 2
        ])->execute();

        return $token;
    }

    public static function gerarNovaSenha($email) {

        $senha = md5(time().rand(0,9999));
        $user = User::select()->where('email', $email)->one();

        User::update()
            ->set('senha', password_hash($senha, PASSWORD_DEFAULT))
            ->where('email', $email)
        ->execute();

        return [
            'user'  => $user,
            'senha' =>  $senha
        ];

    }

    public static function update($aDados, $id){
        
        $update = User::update();

        foreach($aDados as $nome => $valor){

            $update->set($nome, $valor);

        }
        
        $update->where('id', $id)->execute();

    }

    public static function verificaMenu($menu){
        $menu = DB::table('menu_admins')->select()->where('titulo', $menu)->one();
        if($menu){
            return true;
        }else{
            return false;
        }
    }

    public static function verificaMenuSub($menu){
        $menu = DB::table('menu_admin_subs')->select()->where('titulo', $menu)->one();
        if($menu){
            return true;
        }else{
            return false;
        }
    }

}
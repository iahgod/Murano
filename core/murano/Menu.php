<?php
namespace core\murano;

use core\murano\DB;
use src\handlers\UserHandler;

class Menu {

    public static function loadMenu(){

        $usuario = UserHandler::checkLogin();
        $_SESSION['Usuario'] = DB::table('users')->select()->where('id', $usuario->id)->one();

        //? Busca o id do Grupo pelo id do usuario logado
        $id_grupo = DB::table('users')->select('id_grupo')->where('id', $usuario->id)->one();

        //? Busca os dados do grupo
        $grupo_permissoes = DB::table('grupos_permissoes')->select()->where('id_grupo', $id_grupo)->one();
        
        //? Separa os ids dos menus que o usario tem acesso
        $menusUser = explode('.', $grupo_permissoes['menus']);

        $menus = DB::table('menu_admins')->select()
        ->where('ativo', '1')
        ->whereNull('id_pai')
        ->orderBy('ordem', 'asc')
        ->get();

        $menu = [];
        foreach($menus as $item){
            if(in_array($item['id'], $menusUser)){

                $sub = DB::table('menu_admins')->select()->where('id_pai', $item['id'])->get();

                $menu[] = [
                    'id'     => $item['id'],
                    'titulo' => $item['titulo'],
                    'icone'  => $item['icone'],
                    'url'    => $item['url'],
                    'sub'    => self::verificaSub($item['id'], $grupo_permissoes) 
                ];
            }

        }
        
        $_SESSION['UsuarioMenu'] = $menu;

    }

    public static function verificaSub($id, $grupo_permissoes){
        
        //? Separa os ids dos menus que o usario tem acesso
        $menusUser = explode('.', $grupo_permissoes['menus']);

        $menus = DB::table('menu_admins')->select()
        ->where('ativo', '1')
        ->where('id_pai', $id)
        ->orderBy('ordem', 'asc')
        ->get();

        $subs = [];
        foreach($menus as $item){
            if(in_array($item['id'], $menusUser)){
                $subs[] = $item;
            }
        }
        return ($subs) ? $subs : [];
    }
    
}

<?php
namespace core;

use \src\Config;
use \src\models\Menu_Admin;
use \src\models\Notificacao_Relacao;
use \src\models\Notificacao;
use \src\models\Menu_Admin_Sub;

class Controller {

    protected function redirect($url) {
        header("Location: ".$this->getBaseUrl().$url);
        exit;
    }

    private function getBaseUrl() {
        $base = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? 'https://' : 'http://';
        $base .= $_SERVER['SERVER_NAME'];
        if($_SERVER['SERVER_PORT'] != '80') {
            $base .= ':'.$_SERVER['SERVER_PORT'];
        }
        $base .= Config::BASE_DIR;
        
        return $base;
    }

    private function _render($folder, $viewName, $viewData = []) {
        if(file_exists('../src/views/'.$folder.'/'.$viewName.'.php')) {
            extract($viewData);
            $render = fn($vN, $vD = []) => $this->renderPartial($vN, $vD);
            $base = $this->getBaseUrl();
            require '../src/views/'.$folder.'/'.$viewName.'.php';
        }
    }

    private function renderPartial($viewName, $viewData = []) {
        $this->_render('partials', $viewName, $viewData);
    }

    public function render($viewName, $viewData = []) {
        $this->_render('pages', $viewName, $viewData);
    }

    public function cutImage($file, $w, $h, $folder) {
        list($widthOrig, $heightOrig) = getimagesize($file['tmp_name']);
        $ratio = $widthOrig / $heightOrig;

        $newWidth = $w;
        $newHeight = $newWidth / $ratio;

        if($newHeight < $h) {
            $newHeight = $h;
            $newWidth = $newHeight * $ratio;
        }

        $x = $w - $newWidth;
        $y = $h - $newHeight;
        $x = $x < 0 ? $x / 2 : $x;
        $y = $y < 0 ? $y / 2 : $y;

        $finalImage = imagecreatetruecolor($w, $h);
        switch($file['type']) {
            case 'image/jpeg':
            case 'image/jpg':
                $image = imagecreatefromjpeg($file['tmp_name']);
            break;
            case 'image/png':
                $image = imagecreatefrompng($file['tmp_name']);
            break;
        }

        imagecopyresampled(
            $finalImage, $image,
            $x, $y, 0, 0,
            $newWidth, $newHeight, $widthOrig, $heightOrig
        );

        $fileName = md5(time().rand(0,9999)).'.jpg';

        imagejpeg($finalImage, $folder.'/'.$fileName);

        return $fileName;
    }

    public function getFlash(){
        $flash = '';

        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        return $flash;
    }

    public function menu_admin($id){

        $grupo_permissoes = DB::table('grupos_permissoes')->select()->where('id_grupo', $id)->one();
        $menusUser = explode('.', $grupo_permissoes['menus']);


        $aMenu = Menu_Admin::select()->orderBy('ordem', 'asc')->where('ativo', 1)->get();
        $menu = [];
        foreach($aMenu as $item){
            if(in_array($item['id'], $menusUser)){
                $menu[] = [
                    'id' => $item['id'],
                    'titulo' => $item['titulo'],
                    'icone' => $item['icone'],
                    'url' => $item['url'],
                    'sub' =>  Menu_Admin_Sub::select()->where('id_menu', $item['id'])->get()
                ];
            }
        }
        return $menu;
    }

    public function notificacoes($id_user){

        $notificacoes = Notificacao::select('notificacaos.id, notificacaos.mensagem, notificacaos.data, notificacao_relacaos.id as nr_id, notificacao_relacaos.id_user as nr_id_user')
        ->join('notificacao_relacaos', 'notificacao_relacaos.id_notificacao', '=', 'notificacaos.id')
        ->orderBy('notificacaos.data', 'desc')

        ->get();
        $aNotificao = $this->unique_multidim_array($notificacoes,'id');

        $UserNotificacao = [];

        foreach($aNotificao as $item){

            if($item['nr_id_user'] !== $id_user){
                $UserNotificacao[] = $item;
            }

            
        }

        return $UserNotificacao;
        
    }

    public function unique_multidim_array($array, $key) {
        $temp_array = array();
        $i = 0;
        $key_array = array();
       
        foreach($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }

    public function voltaPagina(){
        header("Location: ".$_SERVER['HTTP_REFERER']."");
    }

    public function dd($code){
        echo '<pre>';
        print_r($code);
        echo '</pre>';
        exit;
    }
    

}
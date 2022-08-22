<?php
namespace core\murano;

class Mensagem {

    public static function sucesso($mensagem){
        $_SESSION['flash'] = '1@'.$mensagem;
    }
    public static function erro($mensagem){
        $_SESSION['flash'] = '2@'.$mensagem;
    }
    
}
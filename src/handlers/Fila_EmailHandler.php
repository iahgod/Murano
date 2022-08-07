<?php
namespace src\handlers;

use \src\models\Fila_Email;

class Fila_EmailHandler {

        public static function addFila($from_email, $from_name, $to_email, $to_name, $to_assunto, $to_body){
            
            Fila_Email::insert([
                'from_email' => $from_email,
                'from_name'  => $from_name,
                'to_email'   => $to_email,
                'to_name'    => $to_name,
                'to_assunto' => $to_assunto,
                'to_body'    => $to_body,
                'status'     => 0
            ])->execute();

        }

}
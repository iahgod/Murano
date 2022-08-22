<?php
namespace core\murano;

class Log {

    /**
     * Tipo
     * Tabela
     *
     * @var string
     * @var string
     */
  public static function inserir($tipo, $tabela){
    $usuario = $_SESSION['Usuario'];
    
    DB::table('log')->insert([
        'id_user' => $usuario['id'],
        'tipo' => $tipo,
        'tabela' => $tabela,
        'data' => date('Y-m-d H:i:s')
    ])->execute();

  }
    
}

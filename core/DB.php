<?php

namespace core;

use \src\Config;


Class DB{

    protected static $h;
    
    public function __construct() {
        self::tabela();
    }

    public static function tabela(){

        $connection = new \PDO(Config::DB_DRIVER.':host=localhost;dbname='.Config::DB_DATABASE.';charset=utf8', Config::DB_USER, Config::DB_PASS);
        
        self::$h = new \ClanCats\Hydrahon\Builder('mysql', function($query, $queryString, $queryParameters) use($connection)
        {
            $statement = $connection->prepare($queryString);
            $statement->execute($queryParameters);

            if ($query instanceof \ClanCats\Hydrahon\Query\Sql\FetchableInterface)
            {
                return $statement->fetchAll(\PDO::FETCH_ASSOC);
            }

            elseif($query instanceof \ClanCats\Hydrahon\Query\Sql\Insert)
            {
                return $connection->lastInsertId();
            }

            else 
            {
                return $statement->rowCount();
            }	

        });

    }

    public static function table($table) {
        self::tabela();
        return self::$h->table($table);
    }
    public static function lastId($table) {
        self::tabela();
        return self::$h->table($table)->select('id')->orderBy('id', 'desc')->one();
    }

}


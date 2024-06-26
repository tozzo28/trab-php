<?php 

class Conexao{
    private static $dbNome = 'barbearia';
    private static $dbHost = 'localhost';
    private static $dbUser = 'root';
    private static $dbPwd = '';

    private static $cont = null;

    public static function __constructor(){
        die ("A função init não é permitida");
    }

    public static function conectar(){
        if ( null == self::$cont ) {
            try{
                self::$cont = new PDO(
                    "mysql:host=".self::$dbHost.
                    "; dbname=".self::$dbNome,
                     self::$dbUser, self::$dbPwd);
            }
            catch (PDOException $exception){
               die($exception->getMessage()); 
            }
        }
        return self::$cont; 
     }

     public static function desconectar(){
         self::$cont = null; 
     }
  }

?>
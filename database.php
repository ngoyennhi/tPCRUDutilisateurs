<!-- Ce fichier contient une classe qu’on va appeler « database » 
et 
qui contient les informations de connexion à notre base de donnée .
On instancie l’objet PDO qui nous permet le lien à la base. -->

<?php
class Database
{
    private static $dbName = 'testphp';
    private static $dbHost = 'localhost';
    private static $dbUsername = 'root';
    private static $dbUserPasseword = '';
    private static $cont = null;

    public function __construct()
    {
        die('Init function is not allowed');
    }
    public function connect()
    {
        if (null == self::$cont) {
            try {
                self::$cont = new PDO(
                    'mysql:host=' .
                        self::$dbHost .
                        ';' .
                        'dbname=' .
                        self::$dbName,
                    self::$dbUsername,
                    self::$dbUserPassword
                );
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>

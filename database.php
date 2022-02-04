<!-- Ce fichier contient une classe qu’on va appeler « database » 
et 
qui contient les informations de connexion à notre base de donnée .
On instancie l’objet PDO qui nous permet le lien à la base. -->

<?php
class Database
{   //nom de la base de donnees
    private static $dbName = 'testphp';

    private static $dbHost = 'localhost';
    private static $dbUsername = 'root';
    private static $dbUserPasseword = "root";
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
                  // set the PDO error mode to exception
                  self::$cont->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    echo "Connected successfully";
            } catch (PDOException $e) {
                echo "Connection failed: ";
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

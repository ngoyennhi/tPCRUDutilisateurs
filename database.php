<!-- Ce fichier contient une classe qu’on va appeler « database » 
et 
qui contient les informations de connexion à notre base de donnée .
On instancie l’objet PDO qui nous permet le lien à la base. -->
<!-- /**
 * Database
 * Connexion à la base de données
 *
 * Liste des fonctions
 *  - __construct
 *  - connect
 *  - disconnect
 */ -->
<?php
class Database
{   //nom de la base de donnees
    private static $dbName = 'testphp';

    private static $dbHost = 'localhost';
    private static $dbUsername = 'root';
    private static $dbUserPassword = "root";
    private static $cont = null;

    // on n'a pas besoin cette function __construct()
    // public function __construct()
    // {
    //     die('Init function is not allowed');
    // }

    public static function connect()
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

    public function queryBDD(string $sql)
    {
        $user = '';
        if (null !== self::$cont) {
            try {   
                  // set the PDO error mode to exception
                  $sth = self::$cont->prepare($sql);
                  $sth->execute();
                  $user = $sth->fetchAll();
            } catch (PDOException $e) {
                echo "Fetch failed: ";
                die($e->getMessage());
            }
        }
        return $user;
    }

    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>

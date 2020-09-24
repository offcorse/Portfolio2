<!----------------------------------------------------------------------------------------------------------------
--

#Original Author: Scott Pinkerton   
#Date Created: 09/11/2020                                         
#Version: 1.0                                                    
#Date Last Modified:09/23/2020                                
#Modified by: Scott                                          
#Modification log: Initial release 1.0
#                  
Modified by: Scott                                          
#Modification log: Initial release 1.0
 --
------------------------------------------------------------------------------------------------------------------>
<?php
class Database {//added class
    private static $dsn = 'mysql:host=localhost;dbname=portfoliocontact';//changed db to my db
    private static $username = 'my_user';
    private static $password = 'Pa$$w0rd';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('database_error.php');
                exit();
            }
        }
        return self::$db;
    }
}
   
//$dsn = 'mysql:host=localhost;dbname=portfoliocontact';
//            $username = 'my_user';
//            $password = 'Pa$$w0rd';
//
//    try {
//        $db = new PDO($dsn, $username, $password);
//    } catch (PDOException $e) {
//        $error_message = $e->getMessage();
//        include('/model/database_error.php');
//        exit();
//    }
?>

<!----------------------------------------------------------------------------------------------------------------
--

#Original Author: Scott Pinkerton   
#Date Created: 09/11/2020                                         
#Version: 1.0                                                    
#Date Last Modified:09/11/2020                                
#Modified by: Scott                                          
#Modification log: Initial release 1.0
#                  

 --
------------------------------------------------------------------------------------------------------------------>
<?php
    $dsn = 'mysql:host=localhost;dbname=portfoliocontact';
            $username = 'my_user';
            $password = 'Pa$$w0rd';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>

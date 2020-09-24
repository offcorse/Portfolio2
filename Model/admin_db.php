<!----------------------------------------------------------------------------------------------------------------
--

#Original Author: Scott Pinkerton   
#Date Created: 09/23/2020                                         
#Version: 1.0                                                    
#Date Last Modified:09/23/2020                                
#Modified by: Scott                                          
#Modification log: Initial release 1.0

 --
------------------------------------------------------------------------------------------------------------------>
<?php
function add_admin($email, $password) {
    //global $db;
    $db = Database::getDB();
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $query = 'INSERT INTO administrators (emailAddress, password)
              VALUES (:email, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $hash);
    $statement->execute();
    $statement->closeCursor();
}

function is_valid_admin_login($email, $password) {
    //global $db;
    $db = Database::getDB();
    $query = 'SELECT password FROM administrators
              WHERE emailAddress = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();
    if (isset($row['password'])){
        $hash = $row['password'];
    }else {
        $hash = false;
    }
    return password_verify($password, $hash);
}
?>
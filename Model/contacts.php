<!----------------------------------------------------------------------------------------------------------------
--

#Original Author: Scott Pinkerton   
#Date Created: 09/18/2020                                         
#Version: 1.0                                                    
#Date Last Modified:09/23/2020                                
#Modified by: Scott                                          
#Modification log: Initial release 1.0

#Modified by: Scott                                          
#Modification log: Added static calls to getDB()
                    Added try/catch blocks
 --
------------------------------------------------------------------------------------------------------------------>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getContactsByEmp($employeeID) {
    //global $db;
try{
    
    $db = Database::getDB();
    $queryContacts = 'SELECT * FROM contacts
        WHERE employeeID = :employeeID
                      ORDER BY contactID';
    $statement3 = $db->prepare($queryContacts);
    $statement3->bindValue(':employeeID', $employeeID);
    $statement3->execute();
    $contacts = $statement3->fetchAll();
    $statement3->closeCursor();

    }catch (PDOException $e){
        include('../model/database_error.php');
    }
return $contacts;

}

function deleteContact($contactID){
    //global $db;
    try{
    $db = Database::getDB();
    $query = 'DELETE FROM contacts
              WHERE contactID = :contactID';
    $statement = $db->prepare($query);
    $statement->bindValue(':contactID', $contactID);
    $success = $statement->execute();
    $statement->closeCursor(); 
    }catch (PDOException $e){
        include('../model/database_error.php');
    }
  }
function addContact($visitor_name,$visitor_email,$visitor_msg) {
    //global $db;
    try{
    $db = Database::getDB();
    $query = 'INSERT INTO contacts
                         (contactName, contactEmail, contactMsg, contactDate, employeeID)
                      VALUES
                         (:contactName, :contactEmail, :contactMsg, NOW(), 1)';
            $statement = $db->prepare($query);
            $statement->bindValue(':contactName', $visitor_name);
            $statement->bindValue(':contactEmail', $visitor_email);
            $statement->bindValue(':contactMsg', $visitor_msg);
            $statement->execute();
            $statement->closeCursor();
     }catch (PDOException $e){
        include('../model/database_error.php');
    }
}

?>


<!----------------------------------------------------------------------------------------------------------------
--

#Original Author: Scott Pinkerton   
#Date Created: 09/18/2020                                         
#Version: 1.0                                                    
#Date Last Modified:09/18/2020                                
#Modified by: Scott                                          
#Modification log: Initial release 1.0

 --
------------------------------------------------------------------------------------------------------------------>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getContactsByEmp($employeeID) {
    global $db;
$queryContacts = 'SELECT * FROM contacts
    WHERE employeeID = :employeeID
                  ORDER BY contactID';
$statement3 = $db->prepare($queryContacts);
$statement3->bindValue(':employeeID', $employeeID);
$statement3->execute();
$contacts = $statement3->fetchAll();
$statement3->closeCursor();

return $contacts;
}

function deleteContact($contactID){
    global $db;
    $query = 'DELETE FROM contacts
              WHERE contactID = :contactID';
    $statement = $db->prepare($query);
    $statement->bindValue(':contactID', $contactID);
    $success = $statement->execute();
    $statement->closeCursor(); 
    
  }
function addContact($visitor_name,$visitor_email,$visitor_msg) {
    global $db;
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
}

?>


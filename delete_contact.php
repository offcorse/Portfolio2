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
require_once('database.php');

// Get IDs
$contactID = filter_input(INPUT_POST, 'contactID', FILTER_VALIDATE_INT);
$employeeID = filter_input(INPUT_POST, 'employeeID', FILTER_VALIDATE_INT);

//echo $contactID;
// Delete the contact from the database
if ($contactID != false && $employeeID != false) {
    $query = 'DELETE FROM contacts
              WHERE contactID = :contactID';
    $statement = $db->prepare($query);
    $statement->bindValue(':contactID', $contactID);
    $success = $statement->execute();
    $statement->closeCursor();    
}

// Display the admin page
include('admin.php');
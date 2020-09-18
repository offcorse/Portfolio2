<!----------------------------------------------------------------------------------------------------------------
--

#Original Author: Scott Pinkerton   
#Date Created: 09/11/2020                                         
#Version: 1.1                                                    
#Date Last Modified:09/18/2020                                
#Modified by: Scott                                          
#Modification log: Initial release 1.0

#Modified by: Scott                                          
#Modification log: Added call to deleteContact
#                  

 --
------------------------------------------------------------------------------------------------------------------>

<?php
require_once('./Model/database.php');
require_once('./Model/contacts.php');

// Get IDs
$contactID = filter_input(INPUT_POST, 'contactID', FILTER_VALIDATE_INT);
$employeeID = filter_input(INPUT_POST, 'employeeID', FILTER_VALIDATE_INT);

//echo $contactID;
// Delete the contact from the database
if ($contactID != false && $employeeID != false) {
    deleteContact($contactID);
}

// Display the admin page
include('admin.php');
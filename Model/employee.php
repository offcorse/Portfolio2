<!----------------------------------------------------------------------------------------------------------------
--

#Original Author: Scott Pinkerton   
#Date Created: 09/18/2020                                         
#Version: 1.0                                                    
#Date Last Modified:09/23/2020                                
#Modified by: Scott                                          
#Modification log: Initial release 1.0
#Modified by: Scott                                          
#Modification log: Added static call to getDB()
 --
------------------------------------------------------------------------------------------------------------------>
<?php
function getEmployees(){
// Get all employees
    //
    //global $db;
    try{
        $db = Database::getDB();
        $query = 'SELECT * FROM employee
                               ORDER BY employeeID';
        $statement = $db->prepare($query);
        $statement->execute();
        $employees = $statement->fetchAll();
        $statement->closeCursor();
    }catch (PDOException $e){
            include('../model/database_error.php');
        }
    return $employees;

}
?>


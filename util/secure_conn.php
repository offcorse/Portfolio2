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
    // make sure the page uses a secure connection
    $https = filter_input(INPUT_SERVER, 'HTTPS');
    if (!$https) {
        $host = filter_input(INPUT_SERVER, 'HTTP_HOST');
        $uri = filter_input(INPUT_SERVER, 'REQUEST_URI');
        $url = 'https://' . $host . $uri;
        header("Location: " . $url);
        exit();
    }
?>
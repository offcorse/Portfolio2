<!----------------------------------------------------------------------------------------------------------------
--

#Original Author: Scott Pinkerton   
#Date Created: 09/11/2020                                         
#Version: 1.0                                                    
#Date Last Modified:09/23/2020                                
#Modified by: Scott                                          
#Modification log: Initial release 1.0
#                  Bug in the footer position that I can't figure out yet in the css.
#                   Added background image to header
Modified by: Scott                                          
#Modification log: Added function calls to the database's
#                  Added link to admin login page 

#Modified by: Scott                                          
#Modification log: Added secure authentication includes
                    Moved php to the top of the file to fix a 'header' error
 --
------------------------------------------------------------------------------------------------------------------>
<?php
    require_once('util/secure_conn.php');
    require_once('util/valid_admin.php');

    require_once('./Model/database.php');
    require_once('./Model/employee.php');
    require_once('./Model/contacts.php');
    
    //echo "connection ok"
    // Get employeeID
    if (!isset($employeeID)) {
    $employeeID = filter_input(INPUT_GET, 'employeeID', 
            FILTER_VALIDATE_INT);
    if ($employeeID == NULL || $employeeID == FALSE) {
        $employeeID = 1;
    }
}
// Get all employees
$employees = getEmployees();

// Get visitors for selected employee
$contacts = getContactsByEmp($employeeID);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>rscottpinkerton</title>
    <link type="text/css" rel="stylesheet" href="assets/css/Header.css">
    <link type="text/css" rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin:700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
<link rel="icon" 
      type="image/png" 
      href="assets/img/small_sp.png">
</head>
<body id="page-top"> 
    <nav class="navbar navbar-light navbar-expand-md navbar navbar-expand-lg" id="mainNav">
        <div class="container hdr"><a class="navbar-brand js-scroll-trigger" href="index.html" style="font-family: Lora, serif;">rscottpinkerton</a><button data-toggle="collapse" class="navbar-toggler navbar-toggler-right" data-target="#navbarResponsive" type="button" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation" value="Menu"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item nav-link js-scroll-trigger" role="presentation"><a class="nav-link js-scroll-trigger" href="index.html">Home</a></li>
                    <li class="nav-item nav-link js-scroll-trigger" role="presentation"><a class="nav-link js-scroll-trigger" href="#about">Pro About</a></li>
                    <li class="nav-item nav-link js-scroll-trigger" role="presentation"></li>
                    <li class="nav-item nav-link js-scroll-trigger" role="presentation"><a class="nav-link js-scroll-trigger" href="Pers%20About.html">Pers About</a></li>
                    <li class="nav-item nav-link js-scroll-trigger" role="presentation"><a class="nav-link js-scroll-trigger" href="portfolio2.html">Portfolio</a></li>
                    <li class="nav-item nav-link js-scroll-trigger" role="presentation"><a class="nav-link js-scroll-trigger" href="resume.html">Resume</a></li>
                    <li class="nav-item nav-link js-scroll-trigger" role="presentation"><a class="nav-link js-scroll-trigger" href="index.html#contact">contact</a></li>
                    <li class="nav-item nav-link js-scroll-trigger" role="presentation"><a class="nav-link js-scroll-trigger" href="login.php">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--shoot stars canvas
    <canvas id="canvas1" width="1500" height="100px";></canvas>-->
    <!--The shooting star javascript works when loaded here just below the canvas
    <script src="assets/js/shootingstars.js"></script>-->

<section>
    <aside>
    <h3>Select an employee to view messages</h3>
    <?php foreach ($employees as $employee) : ?>
            <li><a href="?employeeID=<?php echo $employee['employeeID']; ?>">
                    <?php echo $employee['first_name'] . " " . $employee['last_name'];
                     ?>
                </a>
            </li>
            <?php endforeach; ?>
      </aside> 
    
        <table class="contacts">
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Email</th>
                <th>Message</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($contacts as $contact) : ?>
            <tr>
                <?php if ($contact['contactName'] == ""){
                    echo "got here";
                }  ?>
                <td><?php echo $contact['contactName']; ?></td>
                <td><?php echo $contact['contactDate']; ?></td>
                <td><?php echo $contact['contactEmail']; ?></td>
                <td><?php echo $contact['contactMsg']; ?></td>
                <td><form action="delete_contact.php" method="post">
                    <input type="hidden" name="contactID"
                           value="<?php echo $contact['contactID']; ?>">
                    <input type="hidden" name="employeeID"
                           value="<?php echo $contact['employeeID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>

  <p>&nbsp;</p>
</section>
    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col item social"><a href="https://www.linkedin.com/in/rscottpinkerton/" target=_blank><i class="icon ion-social-linkedin"></i></a>
                        <a href="https://github.com/offcorse/" target="_blank"><i class="icon ion-social-github"></i></a></div>
                </div>
                <p class="copyright">Pinkerton © 2020</p>
            </div>
        </footer>
    </div>
    <section class="navbar navbar-expand-lg fixed-top"></section>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/grayscale.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
</body>

</html>


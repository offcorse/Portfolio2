<!----------------------------------------------------------------------------------------------------------------
--

#Original Author: Scott Pinkerton   
#Date Created: 09/16/2020                                         
#Version: 1.0                                                    
#Date Last Modified:09/23/2020                                
#Modified by: Scott                                          
#Modification log: Initial release 1.0
#Modified by: Scott                                          
#Modification log: Removed db constructor and included database.php constructor
 --                 Added admin.php link
------------------------------------------------------------------------------------------------------------------>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>rscottpinkerton</title>
    <link rel="stylesheet" href="assets/css/Header.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin:700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/Lightbox-Gallery.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
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
                    <li class="nav-item nav-link js-scroll-trigger" role="presentation"><a class="nav-link active js-scroll-trigger" href="index.html">Home</a></li>
                    <li class="nav-item nav-link js-scroll-trigger" role="presentation"><a class="nav-link active js-scroll-trigger" href="#about">Pro About</a></li>
                    <li class="nav-item nav-link js-scroll-trigger" role="presentation"></li>
                    <li class="nav-item nav-link js-scroll-trigger" role="presentation"><a class="nav-link js-scroll-trigger" href="Pers%20About.html">Pers About</a></li>
                    <li class="nav-item nav-link js-scroll-trigger" role="presentation"><a class="nav-link js-scroll-trigger" href="portfolio2.html">Portfolio</a></li>
                    <li class="nav-item nav-link js-scroll-trigger" role="presentation"><a class="nav-link js-scroll-trigger" href="resume.html">Resume</a></li>
                    <li class="nav-item nav-link js-scroll-trigger" role="presentation"><a class="nav-link js-scroll-trigger" href="index.html#contact">contact</a></li>
                    <li class="nav-item nav-link js-scroll-trigger" role="presentation"><a class="nav-link js-scroll-trigger" href="admin.php">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--shoot stars canvas
    <canvas id="canvas1" width="1500" height="100px";></canvas>-->
    
    <!--The shooting star javascript works when loaded here just below the canvas
    <script src="assets/js/shootingstars.js"></script>-->
<?php
require_once('./Model/database.php');

//class for employee table
class Employee {
    private $id;
    private $first_name;
    private $last_name;
    
    public function __construct($id,$first_name,$last_name) {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }
    
    public function getID(){
        return $this->id;
    }
    
    public function setID($id){
        $this->id = $id;
    }
    
    public function getFirstName(){
        return $this->first_name;
    }
    
    public function setFirstName($first_name){
        $this->first_name = $first_name;
    }
    
    public function getLastName(){
        return $this->last_name;
    }
    
    public function setLastName($last_name){
        $this->last_name = $last_name;
    }
}

class EmployeeDB {
    public static function getEmployees() {
        $db = Database::getDB();
        $query = 'SELECT * FROM employee
                  ORDER BY last_name';
        $statement = $db->prepare($query);
        $statement->execute();
        
        $employees = array();
        foreach ($statement as $row) {
            $employee = new Employee($row['employeeID'],
                                     $row['first_name'],
                                     $row['last_name']);
            $employees[] = $employee;
        }
        return $employees;
    }

}

$employees = EmployeeDB::getEmployees();

?>
<section>
  <h2>Employee Listing</h2>
<aside>
        <!-- display a list of categories -->
        <h2>Employee</h2>
        <nav>
        <ul>
        <?php foreach ($employees as $employee) : ?>
            <li>
            <a href="?employee_id=<?php echo $employee->getID(); ?>">
                <?php echo $employee->getLastName() . ", " . $employee->getFirstName(); ?>
            </a>
            </li>
        <?php endforeach; ?>
        </ul>
        </nav>
    </aside>

  <p>&nbsp;</p>
</section>
    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col item social"><a href="https://www.linkedin.com/in/rscottpinkerton/" target=_blank><i class="icon ion-social-linkedin"></i></a>
                        <a href="https://github.com/offcorse/" target="_blank"><i class="icon ion-social-github"></i></a></div>
                </div>
                <p class="copyright">Company Name © 2017</p>
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


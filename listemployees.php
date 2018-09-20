<?php

class Database{
    private static $dsn = 'mysql:host=localhost;dbname=project1';
    private static $username = 'root';
    private static $password = 'Pa$$w0rd';
    private static $db;
    
    private function __construct() {}
    
    public static function getDB(){
        if(!isset(self::$db)){
        try{
            self::$db = new PDO(self::$dsn,
                                self::$username,
                                self::$password);
        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo $error_message;
            exit();
            
            }
        }
        return self::$db;
    }
}


   class Employee{
    private $empID;
    private $firstName;
    private $lastName;
    private $email;
    
    public function __construct($empID, $firstName, $lastName, $email){
        $this->empID=$empID;
        $this->firstName=$firstName;
        $this->lastName=$lastName;
        $this->email=$email;
    }
    public function getID(){
        return $this->empID;
    }
    public function setID($value){
        $this->empID = $value;
    }
    public function getfirstName(){
        return $this->firstName;
    }
    public function setfirstName($value){
        $this->firstName = $value;
    }
    public function getlastName(){
        return $this->lastName;
    }
    public function setlastName($value){
        $this->lastName = $value;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($value){
        $this->email = $email;
    }
   
   }
   
   class EmployeeDB{
       public static function getempID(){
           $db = database::getDB();
           $query = 'SELECT * FROM employees
                     ORDER BY empID';
                     $statement = $db->prepare($query);
                     $statement->execute();
                     
$empolyees = array();
foreach($statement as $row) {
$employee = new Employee($row['empID'],
                         $row['firstName'],
                         $row['lastName'],
                         $row['email']);
       $employees[] = $employee;
       }
       return $employees;
       }
   }
   
  
   $employees = EmployeeDB::getempID();
?>

<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="css/styles.css">
    <title>Road Trippin' Calculator</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thanks for joining</title> 
</head>

<body>
        <nav class="navbar navbar-default navbar-inverse" style="margin-bottom:0;border-radius:0;">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>    
            <a class="navbar-brand" href="calculator.html">
                <img class="logo" src="css/projlogo.png"/>
                <span>Road Trippin' Calculator</span>
              </a>
          </div>
      
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="calculator.html">Calculator</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="news.html">Newsletter</a></li>
                <li><a href="listemployees.php">Employees</a></li>
                <li><a href="faq.html">FAQs</a></li>
                <li><a href="admin.php">Admin</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
    <main>
        <h1 style="color:orangered">Contact</h1> 
        <section>
            <h3>Employee List:</h3>
            <ul>
            <?php foreach ($employees as $employee) : ?>
            <li>
                    <?php echo $employee->getID(); ?>
                    <?php echo $employee->getfirstName(); ?>
                    <?php echo $employee->getlastName();?>
                    <?php echo $employee->getemail();?>
               
            </li>
            <?php endforeach; ?>
            </ul>
            
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            
            <p>&nbsp;</p>
            
        </section>
    </main>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
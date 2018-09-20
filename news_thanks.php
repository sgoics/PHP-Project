
<?php

require('model/database.php');

 // Get the newsletter data
$email = filter_input(INPUT_POST, 'email');
$firstName = filter_input(INPUT_POST, 'firstName');

$db = Database::getDB();
// Into database
$query = 'INSERT INTO newsletter
           (email, firstName)
          VALUES
            (:email, :firstName)';
$statement = $db->prepare($query);
$statement->bindValue(':email', $email);
$statement->bindValue(':firstName', $firstName);
$statement->execute();
$statement->closeCursor();

// Validate inputs
//    if ($firstName == null || $email == null){     
//        $error = "Invalid input data. Check all fields and try again.";
//        /* include('error.php'); */
//        echo "Form Data Error: " . $error; 
//        exit();
//        } else {
//            $dsn = 'mysql:host=localhost;dbname=project1';
//            $username = 'root';
//            $password = 'Pa$$w0rd';
//            
//            try {           
//                $db = 
//                    new PDO($dsn, $username, $password);
//                // other statements
//            } catch (PDOException $e) {
//                echo 'PDOException: ' . $e->getMessage();
//                exit;
//            }
//            echo 'No errors.';
//        }

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
        <?php
        //Validate inputs
    if ($firstName == null || $email == null){     
        $error = "Invalid input data. Check all fields and try again.";
        /* include('error.php'); */
        echo "Form Data Error: " . $error; 
        exit();
       } else {
            $dsn = 'mysql:host=localhost;dbname=project1';
           $username = 'root';
            $password = 'Pa$$w0rd';
            
            try {           
                $db = 
                    new PDO($dsn, $username, $password);
                // other statements
            } catch (PDOException $e) {
                echo 'PDOException: ' . $e->getMessage();
                exit;
            }
            //echo 'No errors.';
        }
        ?>
        <h1>Thanks for joining our newsletter!</h1>       
    </main>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
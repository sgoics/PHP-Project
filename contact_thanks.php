
<?php

require('model/database.php');

 // Get the visitor data
$email = filter_input(INPUT_POST, 'email');
$mobilePhone = filter_input(INPUT_POST, 'mobilePhone');
$country = filter_input(INPUT_POST, 'country');
$contactBy = filter_input(INPUT_POST, 'contactBy');
$terms = filter_input(INPUT_POST, 'terms');
if ($terms !== NULL){
    $terms = "True";
}else{
    $terms = "False";
}


$db = Database::getDB();
$comments = filter_input(INPUT_POST, 'comments');
//Insert into database
//echo "fields: " . $email . $mobilePhone . $country . $contactBy . $terms . $comments;
$query = 'INSERT INTO visitor
           (email, mobilePhone, country, contactBy, terms, comments)
            VALUES
            (:email, :mobilePhone, :country, :contactBy, :terms, :comments)';
$statement = $db->prepare($query);
$statement->bindValue(':email', $email);
$statement->bindValue(':mobilePhone', $mobilePhone);
$statement->bindValue(':country', $country);
$statement->bindValue(':contactBy', $contactBy);
$statement->bindValue(':terms', $terms);
$statement->bindValue(':comments', $comments);
$statement->execute();
$statement->closeCursor();

?>          

<!DOCTYPE HTML>
<html>
  <head>
    <link rel="stylesheet" href="css/styles.css">
    <title>Contact Us</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="contact.js"></script>
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
        <h1>Contact Us</h1>
        <p>Thanks! We have received your information.</p>
        <p>Someone will be in contact with you shortly!</p>
    </main>
</body>
</html>
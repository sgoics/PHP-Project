<?php
require('./model/admin_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action ==NULL){
        $action = 'list_visitors';
    }

if ($action == 'list_visitors'){
    $empID = filter_input (INPUT_GET, 'empID',
            FILTER_VALIDATE_INT);
    if($empID == NULL || $empID == FALSE){
        $empID = 1;
    }

//Read from employee table
$query = 'SELECT * from employees
           ORDER BY empID';
$statement = $db->prepare($query);
$statement->execute();
$employees = $statement;
//$statement->closeCursor();
//
//Read from employee table
$query2 = 'SELECT * from visitor
          WHERE empID = :empID
           ORDER BY visitorID';
$statement2 = $db->prepare($query2);
$statement2->bindValue(":empID", $empID);
$statement2->execute();
$visitors = $statement2;

}else
    if ($action == 'delete_visitor'){
        echo 'delete visitor code';
        $visitorID = filter_input (INPUT_POST, 'visitorID',
            FILTER_VALIDATE_INT);
        echo $visitorID;
        require('./model/visitor.php');
        delVisitor($visitorID);
        header("Location: admin.php");

    }
?>

<!DOCTYPE HTML>
<html>
  <head>
    <link rel="stylesheet" href="css/styles.css">
    <title>Contact Us</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    <script type="text/javascript" src="contact.js"></script>-->
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
        <h1 style="color:orangered">Customer Comments:</h1>
              <?php foreach ($employees as $employee) : ?>
        <ul>
            <li>
            <a href="?empID=<?php echo $employee['empID']; ?>">
                <?php echo $employee['firstName']?>
            </a>
            </li>
        </ul>
        <?php endforeach; ?>
           <section>
        <!-- display a table of products -->
        
        <table>
            <tr>
                <th>Name</th>
                <th class="right">Message</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($visitors as $visitor) : ?>
            <tr>
                <td><?php echo $visitor['email']; ?></td>
                <td><?php echo $visitor['comments']; ?></td>
                
                </td>
                <td><form action="admin.php" method="post"
                          id="delete_visitor_form">
                    <input type="hidden" name="action"
                           value="delete_visitor">
                    <input type="hidden" name="visitorID"
                           value="<?php echo $visitor['visitorID']; ?>">
                    <input type="hidden" name="empID"
                           value="<?php echo $current_category['empID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
<!--        <p><a href="?action=show_add_form">Add Product</a></p>-->
    </section>
            
    </main>
</body>
</html>
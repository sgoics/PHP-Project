<?php

function delVisitor($visitorID){
    global $db;
    $query3 = 'DELETE from visitor
          WHERE visitorID = :visitorID';           
    $statement3 = $db->prepare($query3);
    $statement3->bindValue(":visitorID", $visitorID);
    $statement3->execute();
    $statement3->closeCursor();
}
?>


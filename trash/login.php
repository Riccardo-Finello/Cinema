<?php
// include database connection file
require_once 'dbconfig.php';

$email=$_POST['Email'];
$pword=$_POST['Password'];

$sql = "SELECT * FROM `users` WHERE mail=:em && Password=:pw;";

//Prepare the query:
$query = $dbh->prepare($sql);

$query->bindParam(':em',$email,PDO::PARAM_STR);
$query->bindParam(':pw',$pword,PDO::PARAM_STR);

//Execute the query:
$query->execute();
//Assign the data which you pulled from the database (in the preceding step) to a variable.
$results = $query->fetchAll(PDO::FETCH_OBJ);
// For serial number initialization
if (count($results) > 0) {

    session_start();

    // $_SESSION['Name']=htmlentities($results[0] -> FirstName);
    // $_SESSION['Email']=htmlentities($results[0] -> Email);
    // $_SESSION['Password']=htmlentities($results[0] -> Password);
    // $_SESSION['Id']=htmlentities($results[0] -> Id);
    
    //header('Content-Type: application/json/text; charset=utf-8');
    echo "ok";
}else{

    //header('Content-Type: application/json/text; charset=utf-8');
    echo "error"; 
}

?>
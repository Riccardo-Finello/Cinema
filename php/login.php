<?php
// include database connection file
require_once 'dbconfig.php';

$email=$_POST['mail'];
$pword=$_POST['psw'];

$sql = "SELECT * FROM `users` WHERE mail=:em && Password=:pw;";

$query = $dbh->prepare($sql);

$query->bindParam(':em',$email,PDO::PARAM_STR);
$query->bindParam(':pw',$pword,PDO::PARAM_STR);


$query->execute();

$results = $query->fetchAll(PDO::FETCH_OBJ);

if (count($results) > 0) {

    session_start();

    $_SESSION['Name']=htmlentities($results[0] -> name);
    $_SESSION['Email']=htmlentities($results[0] -> mail);
    $_SESSION['Password']=htmlentities($results[0] -> Password);
    $_SESSION['ID']=htmlentities($results[0] -> ID);
    $_SESSION['Logged'] = htmlentities(true);
    
    header('Content-Type: text; charset=utf-8');
    exit("ok");
}else{

    header('Content-Type: text; charset=utf-8');
    exit("error"); 
}

?>
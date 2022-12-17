<?php
// include database connection file
require 'dbconfig.php';

$name = $_POST['name'];
$email=$_POST['mail'];
$pword=$_POST['psw'];



$sql = "SELECT * FROM `users` WHERE mail=:em";


$query = $dbh->prepare($sql);

$query->bindParam(':em',$email,PDO::PARAM_STR);

$query->execute();

$results = $query->fetchAll(PDO::FETCH_OBJ);

if (count($results) > 0) {
    
    header('Content-Type: text; charset=utf-8');
    exit("exists");
}
else{

     

    $sql='INSERT INTO `users`(`name`, `mail`, `Password`) VALUES (:n,:mail,:psw);';

        $query = $dbh->prepare($sql);

        $query->bindParam(':n',$name,PDO::PARAM_STR);
        $query->bindParam(':mail',$email,PDO::PARAM_STR);
        $query->bindParam(':psw',$pword,PDO::PARAM_STR);
        $query->execute();

            
    header('Content-Type: text; charset=utf-8');
    exit("success");
}

?>
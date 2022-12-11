<?php
// include database connection file
require_once 'dbconfig.php';

$name = $_POST['name'];
$email=$_POST['mail'];
$pword=$_POST['psw'];

$sql = "SELECT * FROM `users` WHERE mail=:em";

//Prepare the query:
$query = $dbh->prepare($sql);

$query->bindParam(':em',$email,PDO::PARAM_STR);
$query->bindParam(':pw',$pword,PDO::PARAM_STR);
$query->bindParam(':n',$name,PDO::PARAM_STR);
//Execute the query:
$query->execute();
//Assign the data which you pulled from the database (in the preceding step) to a variable.
$results = $query->fetchAll(PDO::FETCH_OBJ);
// For serial number initialization
if (count($results) > 0) {
    
    header('Content-Type: application/json/text; charset=utf-8');
    echo "exists";
}else{

    $sql='INSERT INTO `users`(`name`, `mail`, `Password`) VALUES (:n,:mail,:psw);';

        $query = $dbh->prepare($sql);

        $query->bindParam(':n',$name,PDO::PARAM_STR);
        $query->bindParam(':mail',$email,PDO::PARAM_STR);
        $query->bindParam(':psw',$pword,PDO::PARAM_STR);
        $query->execute();

        // $lastInsertId = $dbh->lastInsertId();
        // if($lastInsertId)//se riesce a inserirlo
        // {
            
        header('Content-Type: application/json/text; charset=utf-8');
        echo "ok"; 
    header('Content-Type: application/json/text; charset=utf-8');
    echo "success"; 
}

?>
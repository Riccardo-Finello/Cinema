<?php 

    // DB credentials.
    $name = trim($_POST['Name']);
    $email = trim($_POST['Email']);
    $pword = trim($_POST['Password']);

    require "dbconfig.php";

    $sql = "SELECT * FROM `film` WHERE 1 LIMIT 10";

    //Prepare the query:
    $query = $dbh->prepare($sql);

    $query->bindParam(':em',$email,PDO::PARAM_STR);
    $query->bindParam(':pw',$pword,PDO::PARAM_STR);
    $query->bindParam(':n',$name,PDO::PARAM_STR);

    //Execute the query:
    $query->execute();
    //Assign the data which you pulled from the database (in the preceding step) to a variable.
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    // Se non trova un account già esistente e lo inserisce
    if (count($results) == 0) {

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
        // }else{
        //     http_response_code(404);
        //     $response = "SERVER ERROR - Probably there's another account with your email";
        //     header('Content-Type: application/json/text; charset=utf-8');
        //     echo $response;
        // }
    }
    else // 
    {
        header('Content-Type: application/json/text; charset=utf-8');
        echo "error"; 
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['ID']) == false){
        echo "<script>window.location.href='../php/loginInterface.php'</script>";
        }
    ?>

    <?php
      require_once "nav.php";
    ?>
        <div align="center">
        <h1 id="title"><?php 
            require "dbconfig.php";
            $user = $_SESSION['ID'];
            //echo "<script>console.log('" . print_r($_POST) ."')</script>";
            if(isset($_POST['id'])){
                $_SESSION['booking'] = $_POST['id'];
            }
            $p = $_SESSION['booking'];
            
            $sql = "SELECT * FROM proiezioni WHERE id = $p";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $projection = $results[0];

            if(isset($_POST['remove'])){
                $sql = "DELETE FROM `bookings` WHERE User = $user AND Projection = $projection->ID";
                $query = $dbh->prepare($sql);
                $query->execute();
            }
            
            $sql = "SELECT * FROM rooms WHERE ID = $projection->Room";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $room = $results[0];


            $sql = "SELECT * FROM film WHERE id = $projection->Movie";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $movie = $results[0];
            echo $movie->Title . '<br><div class="projectionDay">' . date("l d F Y H:i",strtotime($projection->Date)) . '<br>Sala ' . $room->Id;


            $avaibleSeats = $room->Seats;
            $sql = "SELECT * FROM bookings WHERE Projection = $projection->ID";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);

            

            if($results>0){
                foreach($results as $booking){
                    $avaibleSeats -= $booking->Seats;

                }
            }

            

            if(isset($_POST['cycle'])){     
                $seats = $_POST['cycle'];                //recall pagina
                
                if($avaibleSeats - $seats >= 0){
                    $sql = "INSERT INTO `bookings`(`ID`, `Projection`, `User`, `Seats`) VALUES ('null','$projection->ID', '$user','$seats')";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $avaibleSeats -= $seats;
                }
                else{
                    echo "<script>alert('Posti non disponibili')</script>";
                }
            }

            
        ?>
        </div>
        <?php 
            echo "<h3>Posti disponibili: " . $avaibleSeats ."</h3>"
        ?>
        <?php

        $sql = "SELECT * FROM `bookings` WHERE User = $user AND Projection = $projection->ID";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if(isset($results[0])){
            echo '<div class="projectionDay" style="text-align:center; width:100%">Hai già prenotato ' . $results[0]->Seats .' posti per questo spettacolo</div><br>
                    <form id="removeForm"action="booking.php" method="POST"><input type="hidden" name="remove" value=0></input><div class="projectionDay" style="text-align:center; width:100%; font-size:20px;" id="removeButton">Annulla prenotazione</div></form>';
        }
        else{
            echo  '<div class="bookBox">
            <div id="minus" class="operator"><h1>-</h1></div>
            <div class="operator"><h1 id="seats">1</h1></div>
            <div id="plus" class="operator"><h1>+</h1></div>
        </div>
        <div class="bookBox">
            <form id="form" action="booking.php" method="POST">
                <div class="operator" id="submit" style="width:200px"><h1>Prenota</h1></div>
                <input id="hiddenValue" type="hidden" value="0" name="cycle"></input>
            </form>
        </div>';
        }
        
        ?>
</body>
<script src="../js/info.js"></script>
<script src="../js/ops.js"></script>
</html>
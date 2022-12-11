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

    <div class="nav">
      <nav>
        <a href="home.php" aria-current="page">Home</a>
        <a href="/" aria-current="page">Al Cinema</a>
        <a href="/" aria-current="page">Promozioni</a>
        <?php 
          require "dbconfig.php";
          if(isset($_SESSION['ID'])){
            echo '<h4>' . $_SESSION['Name'] . '</h4><a href="../php/logout.php" aria-current="page">Log Out</a>';
          }
          else{
            echo '<a href="../php/loginInterface.php" aria-current="page">Log In</a><a href="../php/registerInterface.php" aria-current="page">Registrati</a>';
          }

          

        ?>
        </nav>
        </div>
        <div align="center">
        <h1 id="title"><?php 
            
            //echo "<script>console.log('" . print_r($_POST) ."')</script>";
            if(isset($_POST['id'])){
                $_SESSION['booking'] = $_POST['id'];
                echo "<script>console.log('new page')</script>";
            }
            $p = $_SESSION['booking'];

            
            echo "<script>console.log('" . $_SESSION['booking'] ."')</script>";
            $sql = "SELECT * FROM proiezioni WHERE id = $p";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $projection = $results[0];
            
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
                $user = $_SESSION['ID'];
                $sql = "INSERT INTO `bookings`(`ID`, `Projection`, `User`, `Seats`) VALUES ('null','$projection->ID', '$user','$seats')";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
            }
        ?>
        </div>
        <?php 
            echo "<h3>Posti disponibili: " . $avaibleSeats ."</h3>"
        ?>
        <div class="bookBox">
            <div id="minus" class="operator"><h1>-</h1></div>
            <div class="operator"><h1 id="seats">0</h1></div>
            <div id="plus" class="operator"><h1>+</h1></div>
        </div>
        <div class="bookBox">
            <form id="form" action="booking.php" method="POST">
                <div class="operator" id="submit" style="width:200px"><h1>Prenota</h1></div>
                <input id="hiddenValue" type="hidden" value="0" name="cycle"></input>
            </form>
        </div>
</body>
<script src="../js/ops.js"></script>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le tue prenotazioni</title>
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

    <h1 id="title">Le tue prenotazioni</h1>
    <table class="bookTable">
        <tr>
            <th></th>
            <th>Film</th>
            <th>Data</th>
            <th>Sala</th>
            <th>Posti</th>
            <th></th>
        </tr>
    <?php
        require "dbconfig.php";
        $user = $_SESSION['ID'];
        $sql = "SELECT * FROM bookings b JOIN proiezioni p ON b.User = $user AND b.Projection = p.ID JOIN film f on p.Movie = f.ID ORDER BY p.Date";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $rowN = 0;
        //echo '<script>console.log("' . print_r(mysqli_num_rows($results)) .'")</script>';
        
            foreach($results as $booking){
                echo '<th><form action="info.php" method="post"><div class="movie" style="background-image: url( ../pics/' . $booking->Thumbnail . '); width:10px;"><input type="hidden" name = "hiddenId" value="' 
                . $booking->ID . '"><div class="movieTitle" style="font-size:20px">' . $booking->Title .'</div></div></form></th><th><div class="field">' . $booking->Title .'</div></th><th>
                <div class="field">' . $booking->Date .'</div></th><th>
                <div class="field">' . $booking->Room .'</div></th><th>
                <div class="field">' . $booking->Seats .'</div></th><th>
                </th>
                
                </tr>';
                $rowN++;
            }
            echo '</table>';
        
        if($rowN == 0){
          echo '</table><br><div class="projectionDay" style="text-align:center; width:100%">Non hai prenotato nessun biglietto al momento</div>';
        }
    ?>
    
    
</body>
</html>
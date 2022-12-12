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

    <div class="nav">
      <nav>
        <a href="home.php" aria-current="page">Home</a>
        <a href="yourBookings.php" aria-current="page">Le tue prenotazioni</a>
        <a href="/" aria-current="page">Promozioni</a>
        <?php 
          if(isset($_SESSION['ID'])){
            echo '<h4>' . $_SESSION['Name'] . '</h4><a href="../php/logout.php" aria-current="page">Log Out</a>';
          }
          else{
            echo '<a href="../php/loginInterface.php" aria-current="page">Log In</a><a href="../php/registerInterface.php" aria-current="page">Registrati</a>';
          }
        ?>

        
      </nav>
    </div>

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
        $sql = "SELECT * FROM bookings b JOIN proiezioni p ON b.User = 2 AND b.Projection = p.ID JOIN film f on p.Movie = f.ID ORDER BY p.Date";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        if($results>0){
            foreach($results as $booking){
                echo '<th><form action="info.php" method="post"><div class="movie" style="background-image: url( ../pics/' . $booking->Thumbnail . '); width:10px;"><input type="hidden" name = "hiddenId" value="' 
                . $booking->ID . '"><div class="movieTitle" style="font-size:20px">' . $booking->Title .'</div></div></form></th><th><div class="field">' . $booking->Title .'</div></th><th>
                <div class="field">' . $booking->Date .'</div></th><th>
                <div class="field">' . $booking->Room .'</div></th><th>
                <div class="field">' . $booking->Seats .'</div></th><th>
                </th>
                
                </tr>';
            }
        }
    ?>
    
    </table>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Rossi Cinema:Home</title>
    <link rel="stylesheet" href="../css/styles.css">
    
</head>
<body>
  
    <div class="nav">
      <nav>
        <a href="home.php" aria-current="page">Home</a>
        <a href="yourBookings.php" aria-current="page">Le tue prenotazioni</a>
        <a href="/" aria-current="page">Promozioni</a>
        <?php 
          session_start();
          if(isset($_SESSION['ID'])){
            echo '<h4>' . $_SESSION['Name'] . '</h4><a href="../php/logout.php" aria-current="page">Log Out</a>';
          }
          else{
            echo '<a href="../php/loginInterface.php" aria-current="page">Log In</a><a href="../php/registerInterface.php" aria-current="page">Registrati</a>';
          }
        ?>

        
      </nav>
    </div>
    <h1 id="title">The Rossi Cinema</h1>
    <h3>Film In Evidenza</h3>
    <div id="movies">
        <?php
            require "dbconfig.php";

            $sql = "SELECT * FROM proiezioni p JOIN `film` f ON p.Movie = f.id GROUP BY p.Movie ORDER BY p.Date  LIMIT 5";
            $query = $dbh->prepare($sql);
            $query->execute();

            $results = $query->fetchAll(PDO::FETCH_OBJ);
            
            $html = "";

            foreach($results as $movie){
              $html .= '<form action="info.php" method="post"><div class="movie" style="background-image: url( ../pics/' . $movie->Thumbnail . ')"><input type="hidden" name = "hiddenId" value="' 
              . $movie->ID . '"><div class="movieTitle">' . $movie->Title .'</div></div></form>';
            }

            echo $html;
            
        ?>
    </div>
    <script type="module" src="../js/home.js"></script>
</body>
</html>
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
  
    <?php
      require_once "nav.php";
    ?>
    <h1 id="title">The Rossi Cinema</h1>
    <h3>Film In Evidenza</h3>
    <div id="movies">
        <?php
            require "dbconfig.php";

            $sql = "SELECT * FROM proiezioni p JOIN `film` f ON p.Movie = f.id GROUP BY p.Movie ORDER BY p.Date LIMIT 27";
            $query = $dbh->prepare($sql);
            $query->execute();

            $results = $query->fetchAll(PDO::FETCH_OBJ);
            
            $html = "";
            $back = 0;
            foreach($results as $movie){
              $back++;
              if($back == 9){
                $html .= '</div><br><div id="movies">';
                $back = 0;
              }
              $html .= '<form action="info.php" method="post"><div class="movie" style="background-image: url( ../pics/' . $movie->Thumbnail . ')"><input type="hidden" name = "hiddenId" value="' 
              . $movie->ID . '"><div class="movieTitle">' . $movie->Title .'</div></div></form>';
              
            }

            echo $html;
            
        ?>
    </div>
    <script type="module" src="../js/home.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="nav">
      <nav>
        <a href="/" aria-current="page">Home</a>
        <a href="/" aria-current="page">Al Cinema</a>
        <a href="/" aria-current="page">Promozioni</a>
        <a href="/" aria-current="page">Log In</a>
        <input type="text" placeholder="Cerca.." />
        <button class="search">
        <span class="material-symbols-outlined">
        search
        </span>
        </button>
      </nav>
    </div>
    <h1 id="title">The Rossi Cinema</h1>
    <h3>Film In Evidenza</h3>
    <div id="movies">
        <?php
            require "dbconfig.php";

            $sql = "SELECT * FROM proiezioni p JOIN `film` f ON p.Movie = f.id ORDER BY p.Date LIMIT 5";
            $query = $dbh->prepare($sql);
            $query->execute();

            $results = $query->fetchAll(PDO::FETCH_OBJ);
            
            $html = "";

            foreach($results as $movie){
              $html .= '<div class="movie">' . $movie->Title .'</div>';
            }

            echo $html;
            
        ?>
    </div>
</body>
</html>
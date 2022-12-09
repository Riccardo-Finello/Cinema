<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

<?php setlocale(LC_ALL, 'it_IT.UTF-8'); //non va su xampp?>
<?php 
        require "dbconfig.php";

        $id = $_POST['hiddenId'];
        $sql = "SELECT * FROM film f WHERE f.ID = $id";             //query film
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $movie = $results[0];

        $sql = "SELECT * FROM proiezioni WHERE movie = $id";   //query proiezioni
        $query = $dbh->prepare($sql);
        $query->execute();

        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $projections = $results;
        
        
?>
<div class="nav">
      <nav>
        <a href="home.php" aria-current="page">Home</a>
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
    <h1 id="title"><?php 
        echo $movie->Title;
    ?>
    </h1>
    <div id="divider">
        <div id="picture">
        <img src=<?php
                echo '"' . $movie->Thumbnail .'"';
                ?> />
        </div>
        <div id= "info">
            
        <h3>Trama</h3>
            <p id ="Trama"><?php echo $movie->Plot; ?></p>
        <h3>Prossime Proiezioni</h3>
        <?php
            //print_r($projections);
            
            $today =  date('m/d/Y h:i:s a', time());
            $html = "";
            
            if($projections > 0){
                if($projections[0]->Date){
                    $date = $projections[0]->Date;
                    $html .= '<div class="projectionDay">' . date("l d F Y",strtotime($projections[0]->Date)) . '</div><div class="projectionBox">';
                }
                else{
                    $date = $today;
                }

                foreach($projections as $p){
                    
                    if($date < $p->Date && $p->Date > $today){
                        $html .= '</div><div class="projectionDay">' . date("l d F Y",strtotime($p->Date)) . '</div><div class="projectionBox">';
                    }

                    $html .= '<div class="projection">' . date("H:i",strtotime($p->Date)) . ", sala " . $p->Room . "</div>";
                }
            }
            else{
                $html .= '<div class="projectionDay">Per ora non sono programmate proiezioni di questo film</div>';
            }
            
            echo $html;
        ?>
            </div>
        </div>
    </div>
</body>
</html>

<!-- comments >


<!-->
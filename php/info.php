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

<?php session_start(); setlocale(LC_ALL, 'it_IT.UTF-8'); //non va su xampp?>
<?php 
        require "dbconfig.php";
        
        if(isset($_POST['hiddenId'])){
            $_SESSION['movie'] = $_POST['hiddenId'];
        }
        echo '<script>console.log("' . $_SESSION['booking'] . '")</script>';
        $id = $_SESSION['movie'];
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
    <?php
      require_once "nav.php";
    ?>
    <h1 id="title"><?php 
        echo $movie->Title;
    ?>
    </h1>
    <div id="divider">
        <div id="picture">
        <img src=<?php
                echo '"../pics/' . $movie->Thumbnail .'"';
                ?> />
        </div>
        <div id= "info">
            
        <h3>Trama</h3>
            <p id ="Trama"><?php echo $movie->Plot; ?></p>
        <h3>Prossime Proiezioni</h3>
        <?php
            //print_r($projections);
            
            $today =  date('d/m/Y h:i:s a', time());
            $html = "";
            
            if($projections > 0){
                if($projections[0]->Date > $today){
                    $date = $projections[0]->Date;
                    $html .= '<div class="projectionDay">' . date("l d F Y",strtotime($projections[0]->Date)) . '</div><div class="projectionBox">';
                }
                else{
                    $date = $today;
                }

                foreach($projections as $p){

                    if(strtotime($p->Date) >  strtotime($today)){
                        if(strtotime($p->Date) >  strtotime($date)){
                            $html .= '</div><div class="projectionDay">' . date("l d F Y",strtotime($p->Date)) . '</div><div class="projectionBox">';
                        }
                        
                        $html .= '<div class="projection">' . date("H:i",strtotime($p->Date)) . ", sala " . $p->Room . "<form action='booking.php' method='POST'>
                        <input type='hidden' name='id' value=" . $p->ID ."></input><input type='submit' value='Prenota'></input></form></div>";
                    }
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
<script src="../js/info.js"></script>
</html>

<!-- comments >


<!-->
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
<?php 
        require "dbconfig.php";

        $id = $_POST['hiddenId'];
        $sql = "SELECT * FROM film f WHERE f.ID = $id";
            $query = $dbh->prepare($sql);
            $query->execute();

            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $movie = $results[0];

        
?>
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
    <h1 id="title"><?php 
        echo $movie->Title;
    ?>
    </h1>
    <div id="divider">
        
    </div>
</body>
</html>
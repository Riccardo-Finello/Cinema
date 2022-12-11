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
<?php
    if(isset($_SESSION['ID'])){
      echo "<script>window.location.href='../php/home.php'</script>";
    }
  ?>
    <div class="nav">
      <nav>
        <a href="home.php" aria-current="page">Home</a>
        <a href="/" aria-current="page">Al Cinema</a>
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
    <h1 id="title">Registrati</h1>
    <div class="form" >
        <form id="form" action="login.php" method="POST">
            <h2 class="field">Nome:</h2>
            <input class="inputField" type="text" name="name" placeholder="Nome" required><br>
            <h2 class="field">Email:</h2>
            <input class="inputField" type="email" name="mail" placeholder="email" required><br>
            <h2 class="field">Password:</h2>
            <input class="inputField" type="password" name="psw" id="psw" placeholder="password" required><br>
            <h2 class="field">Ripeti password:</h2>
            <input class="inputField" type="password" name="psw" id="psw2" placeholder="ripeti password" required><br><br>
            <p id=error></p>
            <button id="submit">Registrati</button><br><br>
            
        </form>
    </div>
    <script src="../js/register.js"></script>
</body>
</html>
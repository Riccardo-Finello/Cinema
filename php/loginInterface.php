<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
  <?php
    if(isset($_SESSION['ID'])){
      echo "<script>window.location.href='../php/home.php'</script>";
    }
  ?>
    <?php
      require_once "nav.php";
    ?>
    </div>
    <h1 id="title">Login</h1>
    <div class="form" >
        <form id="form" action="login.php" method="POST">
            <h2 class="field">Email:</h2>
            <input class="inputField" type="email" name="mail" placeholder="email" required><br>
            <h2 class="field">Password:</h2>
            <input class="inputField" type="password" name="psw" placeholder="password" required><br><br>
            <button id="submit">Login</button><br><br>
            <p id=error></p>
            
        </form>
    </div>
    <script src="../js/login.js"></script>
</body>

</html>
<?php
    echo '
    <div class="nav">
    <nav>
      <a href="home.php" aria-current="page">Home</a>
      <a href="yourBookings.php" aria-current="page">Le tue prenotazioni</a>';
      if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
        
        if(isset($_SESSION['ID'])){
          echo '<h4>' . $_SESSION['Name'] . '</h4><a href="../php/logout.php" aria-current="page">Log Out</a>';
        }
        else{
          echo '<a href="../php/loginInterface.php" aria-current="page">Log In</a><a href="../php/registerInterface.php" aria-current="page">Registrati</a>';
        }
      

    echo '
    </nav>
  </div>'
?>
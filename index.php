<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style:"background-color:black;">
    
</body>
</html>

<?php
    
    define('DB_HOST','localhost');      //creazione db direttamente da file sql
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','cinema');

    $root = "root";
    $root_password = "";
    $user = 'root';
    $pass = '';

    $dbh = new PDO("mysql:host=" . DB_HOST , DB_USER, DB_PASS);

    $dbh->exec("CREATE DATABASE IF NOT EXISTS `cinema`;
                CREATE USER IF NOT EXISTS '$user'@'localhost' IDENTIFIED BY '$pass';
                GRANT ALL ON `cinema`.* TO '$user'@'localhost';
                FLUSH PRIVILEGES;
            ");


    $filename = 'cinema.sql';

    try{


    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS) ;//('Error connecting to MySQL server: ' . mysql_error());

    mysqli_select_db($connection, DB_NAME) ;//or die('Error selecting MySQL database: ' . mysql_error());


    $templine = '';                         //legge il file sql ed esegue le query mano a mano che scorre le righe

    $lines = file($filename);

    foreach ($lines as $line)
    {

    if (substr($line, 0, 2) == '--' || $line == '')
        continue;

    $templine .= $line;

    if (substr(trim($line), -1, 1) == ';')
    {

        mysqli_query($connection, $templine) ;//('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');

        $templine = '';
    }
    }
    echo "Tables imported successfully";
    }
    catch(mysqli_sql_exception $e){
        
    }
    //connessione con il database creato
    require_once 'php/dbconfig.php';
    
    echo "<script>window.location.href='php/home.php'</script>"
?>

<?php
    //creo database se non esiste

    

    

    
    
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','cinema');

    $root = "root";
    $root_password = "";
    $user = 'root';
    $pass = '';

    $dbh = new PDO("mysql:host=" . DB_HOST , DB_USER, DB_PASS);

    $dbh->exec("CREATE DATABASE IF NOT EXISTS `5dii_projectinfo`;
                CREATE USER IF NOT EXISTS '$user'@'localhost' IDENTIFIED BY '$pass';
                GRANT ALL ON `cinema`.* TO '$user'@'localhost';
                FLUSH PRIVILEGES;
            ");
    
    // $query = $dbh->prepare($sql);

    // //Execute the query:
    // $query->execute();

    $filename = 'cinema.sql';

    try{

    // Connect to MySQL server
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die('Error connecting to MySQL server: ' . mysql_error());
    // Select database
    mysqli_select_db($connection, DB_NAME) or die('Error selecting MySQL database: ' . mysql_error());

    // Temporary variable, used to store current query
    $templine = '';
    // Read in entire file
    $lines = file($filename);
    // Loop through each line
    foreach ($lines as $line)
    {
    // Skip it if it's a comment
    if (substr($line, 0, 2) == '--' || $line == '')
        continue;

    // Add this line to the current segment
    $templine .= $line;
    // If it has a semicolon at the end, it's the end of the query
    if (substr(trim($line), -1, 1) == ';')
    {
        // Perform the query
        mysqli_query($connection, $templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
        // Reset temp variable to empty
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

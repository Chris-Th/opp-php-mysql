<?php

  // $dbConnection = new PDO("", $dbUser, $dbPassword);
   

  // connect to mySQL using PHP PDO Object

  $dbHost = getenv('DB_HOST');
  $dbName = getenv('DB_NAME');
  $dbUser = getenv('DB_USER');
  $dbPassword = getenv('DB_PASSWORD');


  $dbConnection = new PDO(
    "mysql:host=$dbHost;dbname=$dbName;charset=utf8", 
    $dbUser, 
    $dbPassword
);

// setzte den Fehlermodus für Web Devs
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// echo "TEST - TEST - TEST";


// Alle Daten zu den Büchern aus der Datenbank auslesen (SELECT)
$sqlStatement = $dbConnection->query("SELECT * FROM `books`");

// PDO::FETCH_ASSOC: returns an array indexed by column name as returned in your result set 
// https://www.php.net/manual/en/pdostatement.fetch.php

// $row = $sqlStatement->fetch(PDO::FETCH_ASSOC);




echo "<table>";
// Falls $row === null wird die Bedingung in () von PHP als false interpretiert
// Damit kann die while-Schleife verlassen werden.



while ( $row = $sqlStatement->fetch(PDO::FETCH_ASSOC) ) {

        
    echo "<tr>";

    // Durch den Array hindurch die Angaben zu einem Buch in eine Tabellenzeile ausgeben.
    foreach ($row as $columName => $value) {
        echo "<td>$value</td>";
    } 

    echo "</tr>";

}
echo "</table>";
?>
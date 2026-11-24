<?php
include("includes/config.php");
$db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
if($db->connect_errno > 0){
    die('Fel vid anslutning [' . $db->connect_error . ']');
} 

//SQL-kommando för att skapa önskad tabell.
$sql = "DROP TABLE IF EXISTS bucketlistItem;
    CREATE TABLE bucketlistItem(
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(80) NOT NULL,
    description VARCHAR(300) NOT NULL,
    priority CHAR(1) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);";


$sql .= "INSERT INTO bucketlistItem (name, description, priority) VALUES
('Test', 'First test', 1);"; //Testdata

echo "<pre>$sql</pre>";

if($db->multi_query($sql)) { //Lyckad körning av fråga.
    echo "Tabell installerad.";
} else {
    echo "Fel vid installation av Tabell.";
}
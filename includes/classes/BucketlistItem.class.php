<?php
/*
Författare: Josefine Backlund
Datum: 2026-11-23

Denna klassfil innehåller metoder för att sätta värden på privata properties, lägga till data i en tabell, radera data och förhindra XSS-exploits.
*/
class BucketlistItem {
  private $db;
  private $name;
  private $description;
  private $priority;

  function __construct() {
    //Anslutning till databas.
    $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);

    if($this->db->connect_errno > 0) { //Vid misslyckad anslutning.
      die("Fel vid anslutning: " . $this->db->connect_error);
    }
  }

  public function getItems(): array {
    $sql = "SELECT * FROM bucketlistItem"; //Statement.
    $result = mysqli_query($this->db, $sql); //Kör statement mot databas.

    return mysqli_fetch_all($result, MYSQLI_ASSOC); //Returnerar statement som associativ array med namnsatta index.
  }

  public function addItem(string $name, string $description, string $priority) : bool {
    
  //Följande if-satser kontrollerar att värden på properties är satta, annars avbryts koden.
  if(!$this->setName($name)) {
   return false;
  } 

  if(!$this->setDescription($description)) {
    return false;
  }

  if(!$this->setPriority($priority)) {
    return false;
  }

    $sql = "INSERT INTO bucketlistItem(name, description, priority)VALUES('$this->name', '$this->description', '$this->priority');"; //Statement.

    return mysqli_query ($this->db, $sql); //Kör statement och returnerar true eller false.
  }

  public function deleteItem(int $id) : bool {
    $id = intval($id); //Konverterar till int.
    $sql = "DELETE FROM bucketlistItem WHERE id=$id;"; //Statement.
    return mysqli_query ($this->db, $sql); //Kör statement och returnerar true eller false.
  }

  public function setName(string $name) : bool {
    if($name != "") {
      $this->name = $this->db->real_escape_string($name); //Så länge strängen inte är tom så sätts propertyn till insatt värde, som även tar bort ev. tecken med real_escape_string.
      return true;
    }
    return false;
  }

  public function setDescription(string $description) : bool {
   if($description != "") {
    $this->description = $this->db->real_escape_string($description);
    return true;
   }
   return false;
  }

  public function setPriority(string $priority) : bool {
    if($priority != "1" && $priority != "2" && $priority != "3") { //Endast 1,2 eller 3 får anges. Annars returneras false.
      return false;
    }
    $this->priority = $this->db->real_escape_string($priority);
    return true;
  }

  public function preventXss($value) : string {
    return htmlspecialchars((string)$value, ENT_QUOTES, "UTF-8"); //Inbyggda funktioner som förhindrar XSS-exploits. Kan omringa utskrifter i HTML.
  }
}
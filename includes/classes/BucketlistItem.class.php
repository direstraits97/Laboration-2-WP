<?php

class BucketlistItem {
  private $db;
  private $name;
  private $description;
  private $priority;

  function __construct() {
    $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);

    if($this->db->connect_errno > 0) {
      die("Fel vid anslutning: " . $this->db->connect_error);
    }
  }

  public function getItems(): array {
    $sql = "SELECT * FROM bucketlistItem";
    $result = mysqli_query($this->db, $sql);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
  }

  public function addItem(string $name, string $description, int $priority) : bool {
    
  if(!$this->setName($name)) {
   return false;
  } 

  if(!$this->setDescription($description)) {
    return false;
  }

  if(!$this->setPriority($priority)) {
    return false;
  }

    $sql = "INSERT INTO bucketlistItem($this->name, $this->description, $this->priority)VALUES('$name', '$description', '$priority');";

    return mysqli_query ($this->db, $sql);
  }

  public function setName(string $name) : bool {
    if($name != "") {
      $this->name = $this->db->real_escape_string($name);
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

  public function setPriority(int $priority) : bool {
    if($priority != 1 || $priority != 2 || $priority != 3) {
      return false;
    }
    $this->priority = $this->db->real_escape_string($priority);
    return true;
  }
}
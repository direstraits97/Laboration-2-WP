<?php
$devMode = false;

if($devMode) {
  error_reporting(-1);
ini_set("display errors", 1); //Visa felmeddelanden.
}

spl_autoload_register(function($class_name) {
  include "classes/" . $class_name . ".class.php"; //Kunna använda klassfiler.
});

if ($devMode) {
  define("DBHOST", "localhost"); //Lokal anslutning
  define("DBUSER", "lab2wp");
  define("DBPASS", "Kst-0gBpGN6vKskz");
  define("DBDATABASE", "lab2wp");
} else {
  define("DBHOST", "studentmysql.miun.se"); //Publicerad anslutning
  define("DBUSER", "joba1602");
  define("DBPASS", "3fymHDt!af");
  define("DBDATABASE", "joba1602");
}
<?php
$devMode = false;

if($devMode) {
  error_reporting(-1);
ini_set("display errors", 1);
}

spl_autoload_register(function($class_name) {
  include "classes/" . $class_name . ".class.php";
});

if ($devMode) {
  define("DBHOST", "localhost");
  define("DBUSER", "lab2wp");
  define("DBPASS", "Kst-0gBpGN6vKskz");
  define("DBDATABASE", "lab2wp");
} else {
  define("DBHOST", "studentmysql.miun.se");
  define("DBUSER", "joba1602");
  define("DBPASS", "3fymHDt!af");
  define("DBDATABASE", "joba1602");
}
<?php
  define("HOST", "localhost");
  define("USER", "root");
  define("PASSWORD", "");
  define("DBNAME", "training");
  $conn = new mysqli(HOST, USER, PASSWORD, DBNAME);
  // Arabic
  $conn -> set_charset("utf8");
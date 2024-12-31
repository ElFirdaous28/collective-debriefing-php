<?php

try {
    $conn = new PDO("mysql:host=localhost;dbname=situation", "root", "");
  }
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

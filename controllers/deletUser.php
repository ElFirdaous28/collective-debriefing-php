<?php
require_once("../database/connection.php");


if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteUser"])){
    $userId=$_POST["userId"];
    try{
        $deletUserQuery = $conn->prepare("DELETE FROM user WHERE id=?");
        $deletUserQuery->execute([$userId]);
    
        header("Location: views\admin\dashboard.php");
    }
    catch(PDOException $e) {
        echo "signup failed: " . $e->getMessage();
    }
   
}


?>
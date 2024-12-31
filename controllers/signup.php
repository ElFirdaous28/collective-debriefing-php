<?php

require_once("../database/connection.php");
require_once("usreHomePage.php");

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])){
    $username=$_POST["username"];
    $fullname=$_POST["fullname"];
    $password=$_POST["password"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $numberOfusersQuery = $conn->prepare("SELECT COUNT(*) FROM user");
    $numberOfusersQuery->execute();
    $number = $numberOfusersQuery->fetch(PDO::FETCH_COLUMN);
    // the user is an admin if he is the first user siged up 
    $role=$number==0?1:2;
    try{
        $addUserQuery = $conn->prepare("INSERT INTO user (username,fullname,password,role_id,created_at)
                                       VALUES (?,?,?,?,NOW())");
        $addUserQuery->execute([$username,$fullname,$hashed_password,$role]);


        $_SESSION["user_loged_in_id"]=$conn->lastInsertId();
        $_SESSION["user_loged_in_role"]=$role;

        redirectHomepage($_SESSION["user_loged_in_role"]);
    }
    catch(PDOException $e) {
        echo "signup failed: " . $e->getMessage();
    }

    
}
?>
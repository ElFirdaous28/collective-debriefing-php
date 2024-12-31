<?php
require_once("../database/connection.php");
require_once("usreHomePage.php");

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])){
    $username=$_POST["username"];
    $password=$_POST["password"];

    $selectUserQuery = $conn->prepare("SELECT * FROM user WHERE username=?");
    $selectUserQuery->execute([$username]);
    $user = $selectUserQuery->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($password, $user["password"])){
        $_SESSION["user_loged_in_id"]=$user["id"];
        $_SESSION["user_loged_in_role"]=$user["role_id"];

        redirectHomepage($_SESSION["user_loged_in_role"]);
    }
}
?>
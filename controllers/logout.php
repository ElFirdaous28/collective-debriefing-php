<?php
require_once("usreHomePage.php");

session_start();
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["logout"])){
    if(isset($_SESSION["user_loged_in_id"])&& isset($_SESSION["user_loged_in_role"])){
        unset($_SESSION["user_loged_in_id"]);
        unset($_SESSION["user_loged_in_role"]);
    }
    redirectHomepage();
}
?>
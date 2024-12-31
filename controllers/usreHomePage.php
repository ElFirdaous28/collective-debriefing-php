<?php
function redirectHomepage($role=null){
    echo "called and role= ";
    if(isset($role)){
        if($role===1){
            header("Location: ../views/admin/dashboard.php");
        }
        else if($role===2){
            header("Location: ../views/user/home.php");
        }
    }
    
    else{
        header("Location: ../views/auth/login.php");
    }

}
?>
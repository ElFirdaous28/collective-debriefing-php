<?php

try{
    $allUsersQuery = $conn->prepare("SELECT u.*,r.name AS role FROM user u
                                     JOIN role r ON r.id=u.role_id");
    $allUsersQuery->execute();
    $users=$allUsersQuery->fetchAll(PDO::FETCH_ASSOC);
}
catch(PDOException $e) {
    echo "signup failed: " . $e->getMessage();
}

?>
<?php include __DIR__.'/../layouts/header.php'; ?>
<?php include __DIR__.'/../../database/connection.php'; ?>

<?php include '../../controllers/allUsers.php'?>

<h2>Admin Dashboard</h2>


<!-- Add User Button -->
<a href="./users/add.php" class="btn btn-primary mb-3">Add User</a>


<!-- TODO: Display a table of users with options to edit or delete -->
<!-- Use Bootstrap table classes -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Fullname</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        
       <?php foreach ($users as $user) : ?>
            <tr>
                <td><?=$user['id']?></td>
                <td><?=$user['username']?></td>
                <td><?=$user['fullname']?></td>
                <td> <?=$user['role']?></td>
                <td>
                    <form action="../../controllers/deletUser.php" method="POST">
                        <input style="display: none;" name="userId" type="text" value="<?=$user['id']?>" >
                        <input type="submit" value="deleteUser">
                    </form>
                </td>
                <td>Edite</td>
            </tr>
        
        <?php endforeach; ?>
    </tbody>
</table>

<?php include __DIR__.'/../layouts/footer.php'; ?>

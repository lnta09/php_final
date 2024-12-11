<?php 
        require('../template/admin_head.php');
        require ('../template/admin_header.php');
?>


    <div class="content">
        <div class="header">
            <h1>User</h1>
        </div>
        <div class="container mt-4">
            <h2>Welcome to the Admin Dashboard!</h2>
            <p>This is your central hub for managing the application.</p>

            <?php
                require ('../controller/c_list_user.php');
                $c_user = new C_user();
                $list_user = $c_user->list_all_user();
            ?>
            <!-- Add your content here -->

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($list_user as $user): ?>
                            <tr>
                                <td><?php echo "{$user['email']}";     ?></td>
                                <td><?php echo "{$user['firstname']}";    ?></td>
                                <td><?php echo "{$user['lastname']}";     ?></td>
                                <td><?php echo "{$user['role']}";         ?></td>
                                <td>
                                    <button class="btn btn-primary btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php require('../template/admin_footer.php'); ?>

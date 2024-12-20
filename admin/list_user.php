<?php 
        require('../template/admin_head.php');
        require ('../template/admin_header.php');
    session_start();
?>


    <div class="content">
        <div class="header">
            <h1>User</h1>
        </div>
        <div class="container mt-4">
            <h2>Welcome to the Admin Dashboard!</h2>
            <p>This is your central hub for managing the application.</p>

            <?php 
                require('add_user.php'); 
                require('edit_user.php');
                require('delete_user.php');
            ?>

            <?php
                require ('../controller/c_list_user.php');
                $c_user = new C_user();
                $list_user = $c_user->list_all_user();
            ?>
            
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
                            <tr class="<?php if($_SESSION["loginUSER"] == $user['email']){echo 'text-danger-emphasis h5';} ?>">
                                <td><?php echo "{$user['email']}";     ?></td>
                                <td><?php echo "{$user['firstname']}";    ?></td>
                                <td><?php echo "{$user['lastname']}";     ?></td>
                                <td><?php 
                                    $role = $user['role'] == 0 ? "admin" : "user";
                                    echo $role; 
                                ?></td>
                                <td>
                                    <div class="flex-row d-flex justify-content-start align-items-center ">
                                        <button class="me-1 btn btn-primary btn-sm edit-btn"
                                            data-email="<?php echo $user['email']; ?>" 
                                            data-firstname="<?php echo $user['firstname']; ?>" 
                                            data-lastname="<?php echo $user['lastname']; ?>"
                                            data-role="<?php echo $user['role']; ?>"
                                            data-bs-toggle="modal" data-bs-target="#editUserModal">
                                            Edit
                                        </button>
                                        <button class="me-1 btn btn-danger btn-sm delete-btn"
                                            data-email="<?php echo $user['email']; ?>" 
                                            data-bs-toggle="modal" data-bs-target="#deleteUserModal"
                                            <?php  if($_SESSION["loginUSER"] == $user['email']){echo 'disabled';}?>>
                                            Delete
                                        </button>
                                        
                                    </div>
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

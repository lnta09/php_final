<?php
    require('../template/admin_head.php');
    require('../template/admin_header.php');
?>

<div class="content">
        <div class="header flex-row d-flex justify-content-center align-items-center">
            <div class="h1 m-0 p-0">Category</div>
        </div>
        <div class="container mt-4">
            <h2>Welcome to the Admin Dashboard!</h2>
            <p>This is your central hub for managing the application.</p>
            <?php require('add_category.php'); ?>

            <div class="row">
                <div class="col-md-12">
                    <?php
                        require ('../controller/c_list_category.php');

                        $c_category = new C_category();
                        $list_category= $c_category->list_all_category();
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_category as $category): ?>
                            <tr>
                                <td> <?php echo "{$category['id']}"; ?> </td>
                                <td> <?php  echo "{$category['name']}";     ?>  </td>
                                <td> <?php  echo "{$category['description']}";     ?> </td>
                                <td>
                                    <div class="flex-row d-flex justify-content-center">
                                        <button class="btn btn-primary btn-sm me-1">Edit</button>
                                        <button class="btn btn-danger btn-sm">Delete</button>
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
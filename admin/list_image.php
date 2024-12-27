<?php
    require('../template/admin_head.php');
    require('../template/admin_header.php');
?>

<div class="content">
        <div class="header flex-row d-flex justify-content-center align-items-center">
            <div class="h1 m-0 p-0">Image</div>
        </div>
        <div class="container mt-4">
            <h2>Welcome to the Admin Dashboard!</h2>
            <p>This is your central hub for managing the application.</p>
            <?php require('add_image.php'); ?>

            <div class="row">
                <div class="col-md-12">
                    <?php
                        require ('../controller/c_list_image.php');

                        $c_image = new C_image();
                        $list_image= $c_image->list_all_image();
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product</th>
                                <th>Path</th>
                                <th>Picture</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_image as $image): ?>
                            <tr>
                                
                                <td> <?php echo "{$image['id']}"; ?> </td>
                                <td> 
                                    <?php  foreach ($list_product as $product){
                                        if($product['id'] == $image['product_id']){
                                            echo $product['name'];
                                        }
                                    } ?>  
                                </td>
                                <td> <?php  echo "{$image['path']}"; ?> </td>
                                <td><img style="height:75px;" src="<?php echo "{$image['path']}"; ?> "></td>
                                <td>
                                    <div class="flex-row d-flex justify-content-start">
                                        <button class="btn btn-primary btn-sm me-1 edit-btn"
                                            data-id="<?php echo $image['id']; ?>"
                                            data-product_id="<?php echo $image['product_id']; ?>"
                                            data-path="<?php echo $image['path']; ?>"
                                            data-bs-toggle="modal" data-bs-target="#editImageModal"
                                            >
                                            Edit
                                        </button>
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
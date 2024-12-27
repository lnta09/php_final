    <?php 
        require('../template/admin_head.php');
        require ('../template/admin_header.php');
    ?>
    

    <div class="content">
        <div class="header flex-row d-flex justify-content-center align-items-center">
            <div class="h1 m-0 p-0">Product</div>
        </div>
        <div class="container mt-4">
            <h2>Welcome to the Admin Dashboard!</h2>
            <p>This is your central hub for managing the application.</p>
            <!-- Add your content here -->
            <?php require('add_product.php'); ?>

            <div class="row">
                <div class="col-md-12">
                    <?php
                        require ('../controller/c_list_product.php');
                        $c_product = new C_product();
                        $list_product= $c_product->list_all_product();
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_product as $product): ?>
                            <tr>
                                <td>  <?php  echo "{$product['id']}";     ?></td>
                                <td> <?php  echo "{$product['name']}";     ?>  </td>
                                <td> <?php  echo "{$product['description']}";     ?> </td>
                                <td><?php 
                                    foreach ($list_category as $category) {
                                        if($product['category_id'] == $category['id']){
                                            echo $category['name'];
                                            break;
                                        }
                                    }    
                                ?></td>
                                <td> <?php  echo "{$product['price']}";     ?> </td>
                                <td><?php  echo "{$product['quantity']}";     ?></td>
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
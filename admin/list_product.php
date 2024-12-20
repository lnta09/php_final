    <?php 
        require('../template/admin_head.php');
        require ('../template/admin_header.php');
    ?>
    

    <div class="content">
        <div class="header">
            <h1>Product</h1>
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
                                <th>Image</th>
                                <th>Name</th>
                                <th>Mô tả</th>
                                <th>Price</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_product as $product): ?>
                            <tr>
                                <td> <img style="height:75px;" src="<?php echo "{$product['avatar']}"; ?> "> </td>
                                <td> <?php  echo "{$product['name']}";     ?>  </td>
                                <td> <?php  echo "{$product['description']}";     ?> </td>
                                <td> <?php  echo "{$product['price']}";     ?> </td>
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
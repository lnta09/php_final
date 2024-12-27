<button type="button" class="p-2 mb-4 btn btn-outline-success flex-row d-flex justify-content-center align-items-center" 
  data-bs-toggle="modal" data-bs-target="#addImageModal">
    <img src="https://cdn-icons-png.flaticon.com/128/4315/4315609.png"
        width="30" height="30">
    <div class="ms-2">Add Image</div>
</button>

<?php 
    require('../controller/c_list_product.php');

    $c_product = new C_product();
    $list_product = $c_product->list_all_product();
?>

<div class="modal fade " id="addImageModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="../controller/c_add_image.php" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Image</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group flex-column d-flex justify-content-start">
            <label class="mb-1 pr-5 mr-5 h6">Product</label>
            <select class="form-select" name="product_id">
                <?php foreach ($list_product as $product){ ?>
                <option value="<?php echo $product['id']; ?>"><?php echo $product['name']; ?></option>
                <?php } ?>
            </select>
          </div>
          <div class="form-group flex-column d-flex justify-content-start mb-0 mt-3">
              <label class="mb-1 h6">Picture</label>
              <input class="form-control" id="path" name="path" type="file" accept="image/*">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Add</button>
        </div>
      </div>
    </form>
  </div>
</div>
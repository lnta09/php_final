<button type="button" class="p-2 mb-4 btn btn-outline-success flex-row d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    <img src="https://cdn-icons-png.flaticon.com/128/4315/4315609.png"
        width="30" height="30">
    <div class="ms-2">Add Product</div>
</button>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="../controller/c_add_product.php">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Add product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Product Description</label>
                <textarea class="form-control" name="description" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" id="price" name="price" class="form-control" step="0.01" required>
            </div>
            <?php 
              require('../controller/c_list_category.php');
              $c_category = new C_category();
              $list_category = $c_category->list_all_category();
            ?>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select" aria-label="Default select example" name="category">
                  <?php foreach($list_category as $category): ?>
                    <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                  <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
                <label for="avatar" class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" required>
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
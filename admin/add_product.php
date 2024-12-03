<div class="">
    <h2>Thêm sản phẩm</h2>
    
    <form action="../controller/c_add_product.php" method="POST" enctype="multipart/form-data">
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

        <div class="mb-3">
            <label for="category_id" class="form-label">Category ID</label>
            <input type="number" id="category_id" name="category_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="avatar" class="form-label">Product Avatar (Image)</label>
            <input type="file" id="avatar" name="avatar" class="form-control" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>
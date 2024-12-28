<div class="modal fade" id="editImageModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="editForm" method="POST" action="../controller/c_edit_image.php">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label h6">ID</label>
                    <input class="form-control" id="edit-id" name="id" readonly>
                  </div>
                  <div class="mb-3">
                      <label for="edit-lastname" class="form-label h6">Image</label>
                      <img id="edit-path" width="100%" height="100%">
                    </div>
                  <div class="mb-3">
                      <label class="form-label h6">Product</label>
                      <select class="form-select" name="product_id" id="edit-product_id">
                            <?php foreach ($list_product as $product){ ?>
                            <option value="<?php echo $product['id']; ?>"><?php echo $product['name']; ?></option>
                            <?php } ?>
                        </select>
                  </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", () => {
      const editButtons = document.querySelectorAll(".edit-btn");

      editButtons.forEach(btn => {
          btn.addEventListener("click", () => {
            const id = btn.getAttribute("data-id");
            const product_id = btn.getAttribute("data-product_id");
            const path = btn.getAttribute("data-path");

              document.getElementById("edit-id").value = id;
              document.getElementById("edit-product_id").value = product_id;
              document.getElementById("edit-path").src = path;
          });
      });
  });
</script>
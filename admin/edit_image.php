<div class="modal fade" id="editImageModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="editForm" method="POST" action="../controller/c_edit_user.php">
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
                      <label class="form-label h6">Product</label>
                      <input type="text" class="form-control" id="edit-product_id" name="product_id" required>
                  </div>
                  <div class="mb-3">
                      <label for="edit-lastname" class="form-label h6">Image</label>
                      <input type="file" class="form-control" id="edit-path" name="path" required>
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
            const email = btn.getAttribute("data-email");
            const username = btn.getAttribute("data-username");
            const phone = btn.getAttribute("data-phone");
            const gender = btn.getAttribute("data-gender");
            const birthday = btn.getAttribute("data-birthday");
            const role = btn.getAttribute("data-role");

              document.getElementById("edit-email").value = email;
              document.getElementById("edit-username").value = username;
              document.getElementById("edit-phone").value = phone;
              document.getElementById("edit-gender").value = gender;
              document.getElementById("edit-birthday").value = birthday;
              document.getElementById("edit-role").value = role;
          });
      });
  });
</script>
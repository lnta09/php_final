<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="editForm" method="POST" action="../controller/c_edit_user.php">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                  <div class="mb-3">
                    <label for="edit-email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="edit-email" name="email" readonly>
                  </div>
                  <div class="mb-3">
                      <label for="edit-firstname" class="form-label">Userame</label>
                      <input type="text" class="form-control" id="edit-username" name="username" required>
                  </div>
                  <div class="mb-3">
                      <label for="edit-lastname" class="form-label">Phone Number</label>
                      <input type="number" class="form-control" id="edit-phone" name="phone" required>
                  </div>
                  <?php //if($_SESSION["loginUSER"] != $user['email']){  ?>
                    <div class="mb-3">
                        <label for="edit-role" class="form-label">Role</label>
                        <select class="form-select" aria-label="Default select example" id="edit-role" name="role">
                            <option value="0">Admin</option>
                            <option value="1">User</option>
                        </select>
                    </div>
                  <?php //} ?>
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
            const role = btn.getAttribute("data-role");

              document.getElementById("edit-email").value = email;
              document.getElementById("edit-username").value = username;
              document.getElementById("edit-phone").value = phone;
              document.getElementById("edit-role").value = role;
          });
      });
  });
</script>
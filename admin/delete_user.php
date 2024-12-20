<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="" method="POST" action="../controller/c_delete_user.php">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div>Are you sure you want to <b class="text-danger">DELETE</b> this user?</div>
                    <div id="delete-email-display" class="h4 mt-2 text-danger"></div>
                    <input type="hidden" class="form-control" id="delete-email" name="email">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", () => {
      const deleteButtons = document.querySelectorAll(".delete-btn");

      deleteButtons.forEach(btn => {
          btn.addEventListener("click", () => {
            const email = btn.getAttribute("data-email");
            document.getElementById("delete-email").value = email;
            const emailDisplayDiv = document.getElementById("delete-email-display");
            emailDisplayDiv.textContent = email;
          });
      });
  });
</script>
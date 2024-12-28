<div class="modal fade" id="deleteImageModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="../controller/c_delete_image.php">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-1">Are you sure you want to <b class="text-danger">DELETE</b> this image?</div>
                    <input type="hidden" class="form-control" id="delete-id" name="id">
                    <img id="delete-path" width="100%" height="100%">
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
            const id = btn.getAttribute("data-id");
            document.getElementById("delete-id").value = id;

            const path = btn.getAttribute("data-path");
            document.getElementById("delete-path").src = path;
          });
      });
  });
</script>
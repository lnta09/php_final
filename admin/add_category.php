<button type="button" class="p-2 mb-4 btn btn-outline-success flex-row d-flex justify-content-center align-items-center" 
  data-bs-toggle="modal" data-bs-target="#addCategoryModal">
    <img src="https://cdn-icons-png.flaticon.com/128/4315/4315609.png"
        width="30" height="30">
    <div class="ms-2">Add Category</div>
</button>

<div class="modal fade " id="addCategoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="../controller/c_add_category.php">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Category</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group flex-column d-flex justify-content-start">
            <label class="mb-1 pr-5 mr-5"">Name</label>
            <input class="form-control" type="text" name="name" required>
          </div>
          <div class="form-group flex-column d-flex justify-content-start mb-0 mt-3">
              <label class="mb-1">Description</label>
              <textarea class="form-control" name="description" rows="3"></textarea>
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
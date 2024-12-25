<button type="button" class="p-2 mb-4 btn btn-outline-success flex-row d-flex justify-content-center align-items-center" 
  data-bs-toggle="modal" data-bs-target="#addUserModal">
    <img src="https://cdn-icons-png.flaticon.com/128/4315/4315609.png"
        width="30" height="30">
    <div class="ms-2">Add User</div>
</button>

<div class="modal fade " id="addUserModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="../controller/c_add_user.php">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Add user</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group flex-column d-flex justify-content-start">
            <label class="mb-1 pr-5 mr-5" for="username">Email Address</label>
            <input class="form-control" type="text" id="email" name="email" required>
          </div>
          <div class="form-group flex-column d-flex justify-content-start mb-0 mt-3">
              <label class="mb-1" for="password">Password</label>
              <input class="form-control" type="password" id="password" name="password" required>
          </div>
          <div class="form-group flex-column d-flex justify-content-start mt-3">
              <label class="mb-1" for="username">Userame</label>
              <input class="form-control" type="text" id="username" name="username" required>
          </div>
          <div class="form-group flex-column d-flex justify-content-start mt-3">
              <label class="mb-1" for="phone">Phone</label>
              <input class="form-control" type="number" id="phone" name="phone" required>
          </div>
          <div class="form-group flex-column d-flex justify-content-start mt-3">
              <label class="mb-1" for="role">Role</label>
              <select class="form-select" aria-label="Default select example" name="role">
                <option value="0">Admin</option>
                <option value="1" selected>User</option>
              </select>
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
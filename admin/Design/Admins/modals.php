<!-- Delete Modal -->
<div class="modal fade" id="del" tabindex="-1" aria-labelledby="deleteexampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteexampleModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are You Sure You Want To Delete User : <span class="adminName"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" data-id="" class="confirmDelete btn btn-danger">Confirm</button>
      </div>
    </div>
  </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="addexampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addexampleModalLabel">ADD USER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="" class="addForm">
          <div class="form-group ">
            <label for="addexampleFormControlInput1" class="form-label">Username</label>
            <input type="text" name="username" value="" class="username form-control" id="addexampleFormControlInput1">
          </div>
          <div class="form-group">
            <label for="addexampleFormControlInput2" class="form-label">Password</label>
            <input type="password" name="password" value="" class="password form-control" id="addexampleFormControlInput2">
          </div>
          <div class="form-group">
            <label for="addexampleFormControlInput3" class="form-label">E-mail Address</label>
            <input type="text" name="email" value="" class="email form-control" id="addexampleFormControlInput3">
          </div>
          <div class="form-group">
            <label for="addexampleInputEmail1">Phone Number</label>
            <input type="text" name="phone" value="" class="phone form-control" id="addexampleInputEmail1" >
          </div>
          <div class="form-check">
            <input class="gender form-check-input" type="radio" name="gender" id="addflexRadioDefault1" value="0">
            <label class="form-check-label" for="addflexRadioDefault1">
              Male
            </label>
          </div>
          <div class="form-check">
            <input class="gender form-check-input" type="radio" name="gender" id="addflexRadioDefault2" value="1">
            <label class="form-label" for="addflexRadioDefault2">
              Female
            </label>
          </div>
          <div class="form-group">
            <label for="addexampleFormControlInput4" class="form-label">Address</label>
            <input type="text" name="address" value="" class="address form-control" id="addexampleFormControlInput4">
          </div>
          <div class="form-group">
            <label for="addexampleFormControlSelect1">Privliges</label>
            <select class="privliges form-control" name="privliges" id="addexampleFormControlSelect1">
              <option value="0">Admin</option>
              <option value="1">User</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="addUser btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editmodal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editmodal">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="" class="editForm">
          <input type="text" name="id" value="" class="id" hidden>
          <div class="form-group">
            <label for="editusername" class="form-label">Username</label>
            <input type="text" name="username" value="" class="form-control" id="editusername">
          </div>
          <div class="form-group">
            <label for="editpassword" class="form-label">Password</label>
            <input type="password" name="password" value="" class="form-control" id="editpassword">
          </div>
          <div class="form-group">
            <label for="editemail" class="form-label">E-mail Address</label>
            <input type="text" name="email" value="" class="form-control" id="editemail">
          </div>
          <div class="form-group">
            <label for="editphone">Phone Number</label>
            <input type="text" name="phone" value="" class="form-control" id="editphone" >
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="editgender0" value="0">
            <label class="form-check-label" for="editgender0">
              Male
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="editgender1" value="1">
            <label class="form-check-label" for="editgender1">
              Female
            </label>
          </div>
          <div class="form-group">
            <label for="editaddress" class="form-label">Address</label>
            <input type="text" name="address" value="" class="form-control" id="editaddress">
          </div>
          <div class="form-group">
            <label for="editadmin" class="form-label">Privliges</label>
            <select class="form-control" name="privliges" id="editadmin">
              <option value="0" class="admin">Admin</option>
              <option value="1" class="user">User</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="editUser btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
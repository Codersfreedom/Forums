


<!-- Modal -->

<div class="modal fade" id="signupbtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Register to our website</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action ="partials/signuphandle.php" method = "post">
          <div class="form-group">
            <label for="user">Email address</label>
            <input type="email" class="form-control" id="user" name="user" aria-describedby="emailHelp"
              placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="cpass">Confirm Password</label>
            <input type="password" class="form-control" id="cpass" name="cpass" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-primary">Signup</button>
      </div>

      </form>
    </div>
  </div>
</div>
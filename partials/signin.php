<div class="modal fade" id="loginbtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="partials/loginhandle.php" method ="post">
                    <div class="form-group">
                        <label for="user">Email address</label>
                        <input type="text" class="form-control" id="user" name="user" aria-describedby="emailHelp"
                            placeholder="Enter email">
                
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" class="form-control" id="pass" name= "pass" placeholder="Password">
                    </div>
                 
                 
               <button type="submit" class="btn btn-primary">Login</button>
           </form>    
            </div>



            
        </div>
    </div>
</div>
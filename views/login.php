<?php
if(isset($_SESSION["logged"]) && $_SESSION["logged"]=== true){
        Redirect::to("home");
    }
    $user = new UserController();
    $user->auth();
?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Login </h3>
                </div>
                <div class="card-body" >
                    <form action="" method="post" class="mr-1">
                      
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="enter your  username">
                        </div>
                       
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="enter your password">
                        </div>
                        <div class="form-group">
                            <button name="submit" class="btn-primary">Login</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?=BASE_URL?>register" class="btn btn-link">Register</a>
                </div>
            </div>
        </div>
    </div>
</div>
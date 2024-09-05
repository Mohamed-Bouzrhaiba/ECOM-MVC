<?php
if(isset($_SESSION["logged"]) && $_SESSION["logged"]=== true){
        Redirect::to("home");
    }
    if(isset($_POST["submit"])){
        $newUser = new UserController();
        $newUser->register();
    }
?>
    
<div class="container">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Register </h3>
                </div>
                <div class="card-body">
                    <form  method="post" class="mr-1">
                        <div class="form-group">
                            <input type="text" name="fullname" placeholder="enter your full name" class="form-control" >
                        </div>
                        <div class="form-group">
                            <input type="text" name="username" placeholder="enter your  username" class="form-control" >
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="enter your email" class="form-control" >
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="enter your password" class="form-control" >
                        </div>
                        <div class="form-group">
                            <button name="submit" class="btn-primary">Register</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?=BASE_URL?>login" class="btn btn-link">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
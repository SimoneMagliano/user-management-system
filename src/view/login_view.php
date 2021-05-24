<?php include './src/view/head.php' ?> 
<?php include './src/view/header.php' ?>


<div class="container">
<div id="login">
        
        <?php if(isset($msg)) : ?>

                <div class="alert alert-danger m-4"><?= $msg ?></div>

        <?php endif ?>

        <div class="pt-5">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-4">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="login_user.php" method="post">
                            <h3 class="text-center">Login</h3>
                            <div class="form-group pt-3">
                                <label for="email">Email</label><br>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group pt-3">
                                <label for="password">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group pt-3">
                                <!-- <label for="remember-me"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br> -->
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                               <!-- <button type="submit">Accedi</button> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
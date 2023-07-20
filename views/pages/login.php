<main class="ik-bg-green">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Login</h2>
                <span class="ik-border mx-auto"></span>
            </div>
            <form  class="mt-3">
                <div class="form-row d-flex flex-wrap mt-3">
                    <div class="form-group col-12 col-md-6 px-3">
                        <label for=""><i class="bi ik-icons ik-color-blue me-2 bi-envelope"></i> Username:</label> 
                        <div class="d-flex align-items-center">
                            <input type="text" name="login_user_name" id="login_user_name" class="form-control rounded-0">
                        </div>
                    </div>
                    <div class="form-group col-12 col-md-6 px-3">
                        <label for=""><i class="bi ik-icons ik-color-blue me-2 bi-lock-fill"></i> Password:</label>
                        <div class="d-flex align-items-center">
                            <input type="password" name="login_password" id="login_password" class="form-control rounded-0">
                        </div>
                    </div>
                    <div class="form-group col-12 px-3 mt-3 d-flex justify-content-end">
                        <a class="btn btn-dark rounded-0" id="login_btn"><i class="bi ik-icons me-2 bi-door-open-fill"></i> Login</a>
                    </div>
                </div>
            </form>
            <?php if(isset($_SESSION['errr'])): ?>
            <div class="col-12">
                <p class="alert alert-danger"><?=$_SESSION['errr']?></p>
            </div>
            <?php endif;unset($_SESSION['errr']);?>
        </div>
    </div>
</main>
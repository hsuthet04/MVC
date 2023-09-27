<?php require_once APPROOT."/views/inc/header.php"; ?> 
<?php require_once APPROOT."/views/inc/nav.php"; ?>

<div class="container-fluid">
    <div class="container my-5">
        <div class="col-md-8 offset-md-2">
            <div class="card bg-light p-5">
                <!-- Register Form Start -->
                <h1 class="english text-info text-center mb-3">Register to Post</h1>
                <form action="<?php echo URLROOT.'user/register' ?>" method="post" >
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control <?php echo !empty($data['name_err']) ? 'is-valid' : ''; ?>" id="username" name="name">
                        <span class="text-danger"><?php echo !empty($data['name_err']) ? $data['name_err'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control <?php echo !empty($data['email_err']) ? 'is-valid' : ''; ?>" id="email" name="email">
                        <span class="text-danger"><?php echo !empty($data['email_err']) ? $data['email_err']  : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control <?php echo !empty($data['password_err']) ? 'is-valid' : ''; ?>" id="password" name="password">
                        <span class="text-danger"><?php echo !empty($data['password_err']) ? $data['password_err']  : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="confirm password">Confirm Password</label>
                        <input type="password" class="form-control <?php echo !empty($data['email_err']) ? 'is-valid' : ''; ?>" id="confirm_password" name="confirm_password">
                        <span class="text-danger"><?php echo !empty($data['confirm_password_err']) ? $data['confirm_password_err']  : ''; ?></span>
                    </div>
                    <div class="row justify-content-between no-gutters" style="display: inline-block;">
                        <a href="<?php echo URLROOT.'user/login' ?>">Already register.Plz Login</a>
                    </div>
                    <div style="float: right;" >
                        <button class="btn btn-outline-secondary english">Cancel</button>
                        <button class="btn btn-primary english">Register</button>
                    </div>
                </form>
                <!-- Register Form  End -->
            </div>
        </div>
    </div>
</div>

<?php  require_once APPROOT."/views/inc/footer.php"; ?>
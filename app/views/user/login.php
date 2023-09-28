<?php require_once APPROOT."/views/inc/header.php"; ?> 
<?php require_once APPROOT."/views/inc/nav.php"; ?>

<div class="container-fluid">
    <div class="container my-5">
        <div class="col-md-8 offset-md-2">
            <div class="card bg-light p-5">
                <!-- Register Form Start -->
               <?php flash('register_success'); ?>
               <?php flash('login_fail'); ?>
                <h1 class="english text-info text-center mb-3">Login to Post</h1>
                <form action="<?php echo URLROOT.'user/login' ?>" method="post">
                    
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
                    <div class="row justify-content-between no-gutters" style="display: inline-block;">
                        <a href="<?php echo URLROOT.'user/register' ?>">Not a user yet.Plz Register</a>
                    </div>
                    <div style="float: right;" >
                        <button class="btn btn-outline-secondary english">Cancel</button>
                        <button class="btn btn-primary english">Login</button>
                    </div>
                </form>
                <!-- Register Form  End -->
            </div>
        </div>
    </div>
</div>

<?php  require_once APPROOT."/views/inc/footer.php"; ?>
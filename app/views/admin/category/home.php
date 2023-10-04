<?php require_once APPROOT."/views/inc/header.php"; ?>
<?php require_once APPROOT."/views/inc/nav.php"; ?>

<div class="container-fluid m-5">
    <div class="row">
    <div class="col-md-3">
            <!-- Sidebar start -->
            <div class="card">
              <div class="card-header">
                <h2>Category</h2>
              </div>
              <div class="card-block">
                <!-- sidebar menu start -->
                <ul class="list-group">
                        <?php foreach($data['cats'] as $cat) : ?>
                            <li class="list-group-item d-flex justify-content-between">
                            <span class="english">
                              <?php echo $cat->name; ?>
                            </span>
                            <?php if(getUserSession()!=null && getUserSession()->email=="ocha@gmail.com"): ?>
                            <span>
                                <a href="<?php echo URLROOT.'category/edit/'.$cat->id ?>" class="english"><i class="fa fa-edit text-warning" ></i></a>
                                <a href="<?php echo URLROOT.'category/delete/'.$cat->id ?>" class="english"><i class="fa fa-trash text-danger"></i></a>
                            </span>
                            <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                </ul>
                <!-- sidebar menu end -->
              </div>
            </div>
            <!-- Sidebar end -->
        </div>

        <div class="col-md-5 offset-md-2">
            <!-- Register Form Start -->
            <?php flash('register_success'); ?>
               <?php flash('login_fail'); ?>
                <h1 class="english text-info text-center">Create Category</h1>
                <form action="<?php echo URLROOT.'category/create' ?>" method="post" class="table-bordered p-5" >
                    
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control <?php echo !empty($data['email_err']) ? 'is-valid' : ''; ?>" id="name" name="name">
                        <span class="text-danger"><?php echo !empty($data['name_err']) ? $data['name_err']  : ''; ?></span>
                    </div>
                    
                    <div class="row justify-content-end no-gutters">
                       
                    <div>
                        <button class="btn btn-outline-secondary english">Cancel</button>
                        <button class="btn btn-primary english">Create</button>
                    </div>
                </form>
                <!-- Register Form  End -->
        </div>
    </div>
</div>

<?php  require_once APPROOT."/views/inc/footer.php"; ?>
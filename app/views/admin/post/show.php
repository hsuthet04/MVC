<?php require_once APPROOT."/views/inc/header.php"; ?>
<?php require_once APPROOT."/views/inc/nav.php"; ?>


<div class="container-fluid">
    <div class="container my-5">
        <?php flash('pes'); ?>
        <div class="row justify-content-between no-gutters">
            <a href="<?php echo URLROOT."post/home/".$data['post'][0]->cat_id; ?>" class="btn btn-primary">Back</a>
            <a href="<?php echo URLROOT."post/edit/".$data['post'][0]->id; ?>" class="btn btn-primary">Edit</a>
        </div>
        <div class="com-md-8 offset-md-2">
            <div class="card p-5">
                <div class="card-header">
                    <h6><?php echo $data['post'][0]->title; ?></h6>
                </div>
                <div class="card-body">
                    <img src="<?php echo URLROOT.'assets/uploads/capy.jpg'. $data['post'][0]->image; ?>" alt="">
                    <p>
                    <?php echo $data['post'][0]->content; ?>    
                    </p>
                </div>         
            </div>
        </div>
    </div>
</div>

<?php  require_once APPROOT."/views/inc/footer.php"; ?>

<?php require_once APPROOT."/views/inc/header.php"; ?>
<?php require_once APPROOT."/views/inc/nav.php"; ?>

<div class="container-fliuid">
    <div class="container my-2">
        <?php flash('del_suc'); ?>
        <?php if(getUserSession()!=null && getUserSession()->email=="ocha@gmail.com"): ?>
        <a herf="<?php echo URLROOT.'post/create'; ?>" class="btn btn-primary mb-2 english">Create</a>
        <?php endif; ?>
        <div class="row">
        <div class="col-md-4">
        <ul class="list-group">
            <?php foreach($data['cats'] as $cat) : ?>
                <li class="list-group-item">
                    <a href="<?php echo URLROOT.'post/home/'.$cat->id; ?>"><?php echo $cat->name; ?></a>
                </li>
            <?php endforeach; ?>           
        </ul>
        </div>
        <div class="col-md-8">
        <!-- Post Card Start -->
            <?php foreach($data['posts'] as $post) : ?>
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="text-center" ><?php echo $post->title; ?></h5>
                    </div>
                <div class="card-body">
                <p><?php echo $post->description; ?></p>
                <div class="row justify-content-end no-gutters">
                    <a href="<?php echo URLROOT.'post/show/'.$post->id ?>" class="english btn btn-sm">Detail</a>
                    <?php if(getUserSession()!=null && getUserSession()->email=="ocha@gmail.com"): ?>
                    
                    <a href="<?php echo URLROOT.'post/edit/'.$post->id ?>" class="english btn btn-sm ml-3">Edit</a>
                    <a href="<?php echo URLROOT.'post/delete/'.$post->id ?>" class="english btn btn-danger btn-sm ml-3">Delete</a>
                    <?php endif; ?>
                </div>
                </div>
                </div>
            <?php endforeach; ?>
        <!-- Post Card Start -->
        </div>
        </div>
    </div>
</div>
<?php  require_once APPROOT."/views/inc/footer.php"; ?>

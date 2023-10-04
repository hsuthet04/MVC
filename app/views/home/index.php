<?php require_once APPROOT . "/views/inc/header.php"; ?>
<?php require_once APPROOT . "/views/inc/nav.php"; ?>

<div class="container-fluid my-5">
    <div class="row justify-content-between">

        <div class="card" style="width: 40%;">
        <?php foreach($data['userposts'] as $userposts): ?>
            
            <div class="card-body">
            <img class="image" src="<?php echo URLROOT . '/assets/uploads/'.$userposts->image  ?>" alt="capy" width="40%;" >
                <h5 class="card-title p-3"><?php echo $userposts->description ?></h5>
                <a href="<?php echo URLROOT.'post/show/'.$userposts->id ?>" class="btn btn-primary">For More details</a>
            </div>
        <?php endforeach; ?> 
        </div>

        
        

        <!-- <div class="card-block">
                    <ul class="list group">
                        <?php //foreach ($data['cats'] as $cat) : 
                        ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="english">
                                    <a href=""><?php //echo $cat->name; 
                                                ?></a>
                                </span>
                            </li>
                        <?php //endforeach; 
                        ?>
                    </ul> 
                </div> -->



    </div>
    <div class="col-md-8">
        <!-- Post Card Start -->

        <?php foreach ($data['posts'] as $post) : ?>
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="text-center"><?php echo $post->title; ?></h5>
                </div>
                <div class="card-body">
                    <p><?php echo $post->description; ?></p>
                    <div class="row justify-content-end no-gutters">
                        <a href="<?php echo URLROOT . 'post/show/' . $post->id ?>" class="english btn btn-sm">Detail</a>
                        <?php if (getUserSession() != null && getUserSession()->email == "ocha@gmail.com") : ?>
                            <a href="<?php echo URLROOT . 'post/edit/' . $post->id ?>" class="english btn btn-sm ml-3">Edit</a>
                            <a href="<?php echo URLROOT . 'post/delete/' . $post->id ?>" class="english btn btn-danger btn-sm ml-3">Delete</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- Post Card Start -->
    </div>
</div>

<?php require_once APPROOT . "/views/inc/footer.php"; ?>
<?php require_once APPROOT."/views/inc/header.php"; ?>
<?php require_once APPROOT."/views/inc/nav.php"; ?>

<div class="container-fliuid">
    <div class="container my-2">
        <a class="<?php echo URLROOT.'post/create'; ?>" class="btn btn-primary mb-2 english">Create</a>
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
                <p><?php echo $post->desc; ?></p>
                <div class="row justify-content-end no-gutters">
                <button class="english btn btn-sm">Detail</button>
                    <button class="english btn btn-sm ml-3">Edit</button>
                    <button class="english btn btn-danger btn-sm ml-3">Delete</button>
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
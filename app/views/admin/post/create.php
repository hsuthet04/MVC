<?php require_once APPROOT."/views/inc/header.php"; ?>
<?php require_once APPROOT."/views/inc/nav.php"; ?>

<div class="container-fluid">
    <div class="container my-5">
        <div class="com-md-8 offset-md-2">
            <div class="card p-5">

            <h1 class="english text-info text-center mb-3">Create to Post</h1>
                <form action="<?php echo URLROOT.'post/create' ?>" method="post" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="cat_id">Post Category</label>
                        <select class="form-control" id="cat_id" name="cat_id" >
                            <?php foreach($data['cats']as $cat): ?>
                                <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
                            <?php endforeach; ?>  
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control <?php echo !empty($data['title_err']) ? 'is-valid' : ''; ?>" id="title" name="title">
                        <span class="text-danger"><?php echo !empty($data['title_err']) ? $data['title_err'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="desc">Post Description</label>
                        <textarea class="form-control <?php echo !empty($data['desc_err']) ? 'is-valid' : ''; ?>" id="desc" name="desc" rows="3"></textarea>
                        <span class="text-danger"><?php echo !empty($data['desc_err']) ? $data['desc_err'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="files">File Input</label>
                        <input type="file" class="form-control" name="file" id="file">
                        <span class="text-danger"><?php echo !empty($data['file_err']) ? $data['file_err'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="content">Post Content</label>
                        <textarea class="form-control <?php echo !empty($data['content_err']) ? 'is-valid' : ''; ?>" id="content" name="content" rows="3"></textarea>
                        <span class="text-danger"><?php echo !empty($data['content_err']) ? $data['content_err'] : ''; ?></span>
                    </div>
                    
                    <div class="row justify-content-end no-gutters" style="display: inline-block;">
        
                    <div style="float: right;" >
                        <button class="btn btn-outline-secondary english">Cancel</button>
                        <button class="btn btn-primary english">Register</button>
                    </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<?php  require_once APPROOT."/views/inc/footer.php"; ?>

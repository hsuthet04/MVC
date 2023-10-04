<?php require_once APPROOT."/views/inc/header.php"; ?>
<?php require_once APPROOT."/views/inc/nav.php"; ?>
<?php error_reporting(0); ?>
<div class="container-fluid">
    <div class="container my-5">
        <div class="com-md-8 offset-md-s2">
            <div class="card p-5">
            <?php flash('pef'); ?>
            <h1 class="english text-info text-center mb-3">Create to Post</h1>
                <form action="<?php echo URLROOT.'post/edit' ?>" method="post" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="cat_id">Post Category</label>
                        <select class="form-control" id="cat_id" name="cat_id" >
                            
                        <?php foreach($data['cats']as $cat): ?>
                            <?php if($cat->id==$data['post']->cat_id): ?>
                                    <option value="<?php echo $cat->id; ?>" selected><?php echo $cat->name; ?></option>
                                <?php else: ?> 
                                    <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>                                
                            <?php endif; ?>   
                        <?php endforeach; ?>  

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control <?php echo !empty($data['title_err']) ? 'is-valid' : ''; ?>" id="title" name="title" value="<?php echo $data['post']->title; ?>">
                        <span class="text-danger"><?php echo !empty($data['title_err']) ? $data['title_err'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="desc">Post Description</label>
                        <textarea class="form-control <?php echo !empty($data['desc_err']) ? 'is-valid' : ''; ?>" id="desc" name="desc" rows="3">
                        <?php echo $data['post']->description; ?>
                        </textarea>
                        <span class="text-danger"><?php echo !empty($data['desc_err']) ? $data['desc_err'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="files">File Input</label>
                        <input type="file" class="form-control" name="file" id="file">
                        <span class="text-danger"><?php echo !empty($data['file_err']) ? $data['file_err'] : ''; ?></span>
                        <input type="hidden" name="old_file" value="<?php echo $data['post']->image; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="content">Post Content</label>
                        <textarea class="form-control <?php echo !empty($data['content_err']) ? 'is-valid' : ''; ?>" id="content" name="content" rows="3">
                        <?php echo $data['post']->description; ?>
                        </textarea>
                        <span class="text-danger"><?php echo !empty($data['content_err']) ? $data['content_err'] : ''; ?></span>
                    </div>
                    
                    <div class="row justify-content-end no-gutters" style="display: inline-block;">
        
                    <div style="float: right;" >
                        <button class="btn btn-outline-secondary english">Cancel</button>
                        <button class="btn btn-primary english">Update</button>
                    </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<?php  require_once APPROOT."/views/inc/footer.php"; ?>

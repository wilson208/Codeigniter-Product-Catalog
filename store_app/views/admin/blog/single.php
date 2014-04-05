<h2>Blog Editor</h2>
<div class="col-md-12">
    <script type="text/javascript" src="<?php echo asset_url(); ?>js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
    tinymce.init({
        mode : "specific_textareas",
        plugins: [ "", "code", "", ""],
        editor_selector : "myHtmlEditor"
     });
    </script>
    <?php if($blog != null){ ?>
    <?php echo validation_errors(); ?>
    <?php echo form_open(admin_url('blog/save'), array('role' => 'form')); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Blog Title" value="<?php echo $blog->title; ?>" />
            </div>
            <?php if($user != null && isset($user->title)){ ?> 
            <h4>Made By: <?php echo $user->title . ' ' . $user->forename . ' ' .$user->surname; ?></h4>
            <?php } ?>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="status">Enabled</label>
                <select class="form-control" name="status" id="status">
                    <option value="1" <?php if(isset($blog->status) && $blog->status == 1){echo 'selected';} ?>>Yes</option>
                    <option value="0" <?php if(isset($blog->status) && $blog->status == 0){echo 'selected';} ?>>No</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <label for="blog">Blog</label>
            <textarea class="myHtmlEditor" id="blog" name="blog" style="width: 100%; height: 300px;"><?php echo $blog->blog; ?></textarea>
        </div>
    </div>
        <input type="hidden" name="id" value="<?php echo $blog->id;?>" />
        <input type="submit" value="Save" class="btn btn-primary" />
    </form>
    <?php }else{ ?>
    <h1>Apologies, an error has occurred loading the page</h1>
    <?php } ?>
</div>
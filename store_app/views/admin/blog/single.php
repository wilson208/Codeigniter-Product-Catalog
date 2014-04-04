<div class="col-md-12">
    <script type="text/javascript" src="<?php echo asset_url(); ?>js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
    tinymce.init({
        //selector: "textarea",
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
                
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="1" <?php if(isset($blog->status) && $blog->status == 1){echo 'selected';} ?>>Yes</option>
                        <option value="0" <?php if(isset($blog->status) && $blog->status == 0){echo 'selected';} ?>>No</option>
                    </select>
                </div>
                
            </div>
            
            <div class="col-md-6">
                
                <div class="form-group">
                    <label for="user_id">User ID</label>
                    <input type="text" class="form-control" name="user_id" id="user_id" placeholder="User ID" value="<?php echo $blog->user_id ?>" />
                </div>
                
            </div>
            <div class="form-group">
                <label for="blog">Blog</label>
                <textarea class="myHtmlEditor" id="blog" name="blog" style="width: 100%; height: 300px;"><?php echo $blog->blog; ?></textarea>
            </div>
         </div>
        <input type="hidden" name="id" value="<?php echo $blog->id;?>" />
        <input type="submit" value="Save" class="btn btn-default" />
    </form>
    <?php }else{ ?>
    <h1>Apologies, an error has occurred loading the page</h1>
    <?php } ?>
</div>
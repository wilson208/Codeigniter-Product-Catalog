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
    <?php if($page != null){ ?>
    <?php echo validation_errors(); ?>
    <?php echo form_open(admin_url('pages/save'), array('role' => 'form')); ?>
        <div class="row">
            <div class="col-md-6">
                
                <div class="form-group">
                    <label for="page_title">Page Title</label>
                    <input type="text" name="page_title" class="form-control" id="exampleInputEmail1" placeholder="Page Title" value="<?php echo $page->page_title; ?>" />
                </div>
                
                <div class="form-group">
                    <label for="url">SEO Url</label>
                    <input type="text" class="form-control" name="url" id="url" placeholder="SEO Url e.g. about_ur" value="<?php echo $page->url ?>"/>
                </div>
                
            </div>
            
            <div class="col-md-6">
                
                <div class="form-group">
                    <label for="menu_title">Menu Title</label>
                    <input type="text" class="form-control" name="menu_title" id="menu_title" placeholder="Menu Title" value="<?php echo $page->menu_title ?>" />
                </div>
                
                <div class="form-group">
                    <label for="show_in_menu">Show In Menu</label>
                    <select class="form-control" name="show_in_menu" id="show_in_menu">
                        <option value="1" <?php if(isset($page->show_in_menu) && $page->show_in_menu == 1){echo 'selected';} ?>>Yes</option>
                        <option value="0" <?php if(isset($page->show_in_menu) && $page->show_in_menu == 0){echo 'selected';} ?>>No</option>
                    </select>
                </div>
                
            </div>
            
            <div class="form-group">
                <label for="url">Additional CSS</label>
                <textarea class="form-control" name="css" id="css" rows="4" placeholder="Additional CSS to apply to page content"><?php echo $page->css ?></textarea>
            </div>
            <div class="form-group">
                <label for="content">Page Content</label>
                <textarea class="myHtmlEditor" id="content" name="content" style="width: 100%; height: 300px;"><?php echo $page->content; ?></textarea>
            </div>
         </div>
        <input type="hidden" name="id" value="<?php echo $page->id;?>" />
        <input type="submit" value="Save" class="btn btn-default" />
    </form>
    <?php }else{ ?>
    <h1>Apologies, an error has occurred loading the page</h1>
    <?php } ?>
</div>
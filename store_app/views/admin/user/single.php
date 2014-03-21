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
    <?php if($user != null){ ?>
    <?php echo validation_errors(); ?>
    <?php echo form_open(admin_url('user/save'), array('role' => 'form')); ?>
        <div class="row">
            <div class="col-md-6">
                
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="<?php echo $user->title; ?>" />
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $user->email; ?>"/>
                </div>
                
                <div class="form-group">
                    <label for="address1">Address 1</label>
                    <input type="text" class="form-control" name="address1" id="address1" placeholder="Address 1" value="<?php echo $user->address1; ?>"/>
                </div>
                
                <div class="form-group">
                    <label for="address2">Address 2</label>
                    <input type="text" class="form-control" name="address2" id="address2" placeholder="Address 2" value="<?php echo $user->address2; ?>"/>
                </div>
                
                <div class="form-group">
                    <label for="forname">Forename</label>
                    <input type="text" class="form-control" name="forename" id="forename" placeholder="Menu Title" value="<?php echo $user->forename; ?>" />
                </div>
                
                <div class="form-group">
                    <label for="surname">Surname</label>
                    <input type="text" class="form-control" name="surname" id="surname" placeholder="Surname" value="<?php echo $user->surname; ?>" />
                </div>
                
                <div class="form-group">
                    <label for="county">County</label>
                    <input type="text" class="form-control" name="county" id="county" placeholder="County" value="<?php echo $user->county; ?>" />
                </div>
                
            <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" name="country" id="country" placeholder="Country" value="<?php echo $user->country; ?>" />
                </div>
                
            <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $user->phone; ?>" />
                </div>
            </div>
            
            
         </div>
        <input type="hidden" name="id" value="<?php echo $user->id;?>" />
        <input type="submit" value="Save" class="btn btn-default" />
    </form>
    <?php }else{ ?>
    <h1>Apologies, an error has occurred loading the page</h1>
    <?php } ?>
</div>
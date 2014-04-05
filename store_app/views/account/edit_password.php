<script type="text/javascript" src="<?php echo asset_url('js/validation.js'); ?>"></script>

<div class="row">
    <h2> Edit Password </h2>
    <?php if(isset($error)){ ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php } ?>
        
    <?php if(isset($message)){ ?>
    <div class="alert alert-success"><?php echo $message; ?></div>
    <?php } ?>
    
    <?php echo form_open('account/processEditPassword', array('role' => 'form')); ?>
    <div class="col-lg-4 border-right">
        
        <div class="form-group">
            <label for="oldPassword">Old Password</label>
            <input name="oldPassword" type="password" class="form-control" id="oldPassword" placeholder="Old Password" value="<?php if(isset($oldPassword)){echo $oldPassword;} ?>">
        </div>
        
        <div class="form-group">
            <label for="newPassword">New Password</label>
            <input name="newPassword" type="password" class="form-control" id="oldPassword" placeholder="New Password" value="<?php if(isset($newPassword)){echo $newPassword;} ?>">
        </div>
        
        <div class="form-group">
            <label for="confirmPassword">Confirm Password</label>
            <input name="confirmPassword" type="password" class="form-control" id="oldPassword" placeholder="Confirm Password" value="<?php if(isset($oldPassword)){echo $oldPassword;} ?>">
        </div>
        
        <div class="form-group">
            <button name="submit" value="Save" type="submit" class="btn btn-default">Save Changes</button>
        </div>
    </div>
</div>
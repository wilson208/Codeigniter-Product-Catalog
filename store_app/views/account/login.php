<script type="text/javascript" src="<?php echo asset_url('js/validation.js'); ?>"></script>
<div class="row">
    <div class="col-lg-4 border-right">
        <h2>Login</h2>
        
        <?php if(isset($error)){ ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        
        <?php if(isset($message)){ ?>
        <div class="alert alert-success"><?php echo $message; ?></div>
        <?php } ?>
        
        <?php echo form_open('account/processLogin', array('role' => 'form')); ?>
        
            <div class="form-group">
                <label for="username">Email address</label>
                <input name="email" type="email" class="form-control" id="username" placeholder="Enter email or Username">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="Password">
            </div>

            <input type="submit" class="btn btn-default" value="Login"/>

        </form>
    </div>
    
    <div class="col-lg-5">
        <h2>Not Registered?</h2>
        <a href="<?php echo base_url('register'); ?>"><h3>Click Here</h3></a>
        
        <h2>Forgot Password?</h2>
        <a href="<?php echo base_url('account/forgotpassword'); ?>"><h3>Click Here</h3></a>
    </div>
</div>
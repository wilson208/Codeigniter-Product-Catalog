<h2>Password Reset</h2>
<p>To have your password reset, enter the email address linked to the account in the field below and submit.</p>
<p>If the email address is linked to an account, you will be emailed a temporary password to login. Once you receive this, please login and change your password.</p>

<?php if(isset($error)){ ?>
<div class="alert alert-warning"><?php echo $error; ?></div>
<?php } ?>

<?php if(isset($message)){ ?>
<div class="alert alert-success"><?php echo $message; ?></div>
<?php } ?>

<?php echo form_open('account/processForgotPassword', array('role' => 'form')); ?>
    <div class="form-group">
        <label for="emailAddress">Email address</label>
        <input type="email" class="form-control" id="emailAddress" name="emailAddress" placeholder="Enter email">
    </div>
    <input type="submit" class="btn btn-primary" value="Reset Password"/>
</form>

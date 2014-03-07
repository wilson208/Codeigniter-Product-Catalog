<h1>Contact Us</h1>
<div class="row">
    <div class="col-md-6">
        <?php echo validation_errors(); ?>
        <?php echo form_open('contact/process', array('role' => 'form')); ?>

            <div class="form-group">
              <label for="name">Name</label>
              <input name="name" type="text" class="form-control" id="name" placeholder="Enter Name" value="<?php echo setValue('name'); ?>">
            </div>

            <div class="form-group">
              <label for="email">Email address</label>
              <input name="email" type="email" class="form-control" id="email" placeholder="Enter Email" value="<?php echo setValue('email'); ?>">
            </div>

            <div class="form-group">
              <label for="phone">Phone (Optional)</label>
              <input name="phone" type="text" class="form-control" id="phone" placeholder="Enter Phone" value="<?php echo setValue('phone'); ?>">
            </div>

            <div class="form-group">
              <label for="address">Address (Optional)</label>
              <input name="address" type="text" class="form-control" id="phone" placeholder="Enter Address" value="<?php echo setValue('address'); ?>">
            </div>

            <div class="form-group">
              <label for="enquiry">Enquiry</label>
              <textarea name="enquiry" rows="3" class="form-control" id="enquiry" placeholder="Ask Your Question"></textarea>
            </div>
            
            <input type="submit" class="btn btn-block" value="Submit" />

        </form>
    </div>
    
    <div class="col-md-6">
        <h2>Contact Details</h2>
        <h3>Tel: <a href="tel:028 1234 1234">(028) 1234 1234</a></h3>
        <h3>Email: <a href="mailto:info@test.com">info@test.com</a></h3>
        <h3>Address:</h3>
        <p>123 Black Road,<br>Atown, Acounty, Apostcode</p>
    </div>
</div>

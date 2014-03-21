<script type="text/javascript" src="<?php echo asset_url('js/validation.js'); ?>"></script>

<div class="row">
    <h1>Edit Details</h1>
    <div style="color:red;"><?php echo validation_errors(); ?></div>
    <div style="color:red;"><?php if(isset($message)){echo $message;}?></div>
        <?php echo form_open('account/processEditDetails', array('role' => 'form')); ?>           
       
        <div class="col-lg-5 border-right">
            <div class="form-group">
                <label for="username">Title</label>
                <select name="title" class="form-control">
                    <option name="title" value="Mr" <?php if($user->title == "Mr"){ echo 'checked'; } ?>>Mr.</option>
                    <option name="title" value="Mrs" <?php if($user->title == "Mrs"){ echo 'checked'; } ?>>Mrs.</option>
                    <option name="title" value="Miss" <?php if($user->title == "Miss"){ echo 'checked'; } ?>>Miss.</option>
                    <option name="title" value="Ms" <?php if($user->title == "Ms"){ echo 'checked'; } ?>>Ms.</option>
                    <option name="title" value="Dr" <?php if($user->title == "Dr"){ echo 'checked'; } ?>>Dr.</option>
                </select>
            </div>
        
            <div class="form-group">
                <label for="forename">Forename</label>
                <input name="forename" type="text" class="form-control" id="forename" placeholder="Forename" value="<?php echo $user->forename; ?>">
            </div>
        
            <div class="form-group">
                <label for="surname">Surname</label>
                <input name="surname" type="text" class="form-control" id="surname" placeholder="Surname"  value="<?php echo $user->surname; ?>">
            </div>
            
            <div class="form-group">
                <label for="phone">Phone</label>
                <input name="phone" type="text" class="form-control" id="phone" placeholder="Phone" value="<?php echo $user->phone; ?>">
            </div>

            <div id="emailGroup" class="form-group">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="Email" value="<?php echo $user->email; ?>" onchange="validateEmail()" onpropertychange="validateEmail()" onkeyup="validateEmail()">
                <span id="emailSpan" class=""></span>
                <label id="emailError"></label>
            </div>                                              
                 
            <div class="checkbox">
                <label>
                  <input name="newsletter" type="checkbox" value="0" <?php if(isset($newsletter)){echo 'checked';} ?>>I do not wish to subscribe to the monthly newsletter
                </label>
            </div>            
                       
            <div class="pagination">
                <button name="submit" value="Save" type="submit" class="btn btn-default">Save Changes</button>
            </div>            
        </div>
    
        <div class="col-lg-5">
            
            <div class="form-group">
                <label for="address1">Address 1</label>
                <input name="address1" type="text" class="form-control" id="address1" placeholder="Address Line 1" value="<?php echo $user->address1; ?>">
            </div>
            
            <div class="form-group">
                <label for="address2">Address 2</label>
                <input name="address2" type="text" class="form-control" id="address2" placeholder="Address Line 2" value="<?php echo $user->address2; ?>">
            </div>
            
            <div class="form-group">
                <label for="town">Town</label>
                <input name="town" type="text" class="form-control" id="town" placeholder="Town" value="<?php echo $user->town; ?>">
            </div>
            
            <div class="form-group">
                <label for="postcode">Postcode</label>
                <input name="postcode" type="text" class="form-control" id="postcode" placeholder="Postcode" value="<?php echo $user->postcode; ?>">
            </div>
            
            <div class="form-group">
                <label for="county">County</label>
                <input name="county" type="text" class="form-control" id="county" placeholder="County" value="<?php echo $user->county; ?>">
            </div>
            
            <div class="form-group">
                <label for="country">Country</label>
                <select name="country" class="form-control">
                    <option name="country" value="UK" <?php if($user->country == 'UK'){ echo 'checked'; } ?>>UK</option>
                    <option name="country" value="Ireland" <?php if($user->country){ echo 'checked'; } ?>>Ireland</option>
                </select>
            </div>       
            
        </div>
    </form>
</div>
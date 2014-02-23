<script type="text/javascript" src="<?php echo asset_url('js/validation.js'); ?>"></script>
<div class="row">
    <div class="col-lg-4 border-right">
        <h2>Login</h2>
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
        <h2>Register</h2>
        <?php echo form_open('account/register', array('role' => 'form')); ?>
            
            <div class="form-group">
                <label for="title">Title</label>
                <select class="form-control">
                    <option name="title" value="Mr">Mr.</option>
                    <option name="title" value="Mrs">Mrs.</option>
                    <option name="title" value="Miss">Miss.</option>
                    <option name="title" value="Ms">Ms.</option>
                    <option name="title" value="Dr">Dr.</option>
                </select>
            </div>
        
            <div class="form-group">
                <label for="forename">Forename</label>
                <input required="yes" name="forename" type="text" class="form-control" id="forename" placeholder="Forename">
            </div>
        
            <div class="form-group">
                <label for="surname">Surname</label>
                <input required="yes" name="surname" type="text" class="form-control" id="surname" placeholder="Surname">
            </div>
        
            <div class="form-group">
                <label for="email">Email</label>
                <input required="yes" name="email" type="email" class="form-control" id="email" placeholder="Forename">
            </div>

            <div id="passwordGroup" class="form-group">
                <label for="password">Password</label>
                <input maxlength="20" required="yes" name="password" id="password" type="password" class="form-control" id="password" placeholder="Password" onkeyup="validatePassword()" onchange="validatePassword()" value="<?php if(isset($password)){echo $password;} ?>">
                <span id="passwordSpan" class=""></span>
            </div>

            <button type="submit" name="submit" value="Register" class="btn btn-default">Next</button>

        </form>
    </div>
</div>
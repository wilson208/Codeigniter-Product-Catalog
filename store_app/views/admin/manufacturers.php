<h2>Manufacturers</h2>
<div clas="row">
    <div class="col-lg-6 bottom-buffer">
        
        <?php if(isset($upload_error)){ ?> 
        <div class="alert alert-danger"><?php echo $upload_error; ?></div>    
        <?php } ?>
        
        <?php echo form_open_multipart(admin_url('upload'), array('role' => 'form', 'class' => 'form-inline'));?>
            <input type="hidden" name="path" value="manufacturers"/>
            <input type="hidden" name="redirect" value="manufacturers"/>
            <label>Upload A New Manufacturer Logo</label><br />
            <div class="form-group">
                <label class="sr-only" for="imagefile">Choose File:</label>
                <input type="file" class="form-control" id="imagefile" name="imagefile">
            </div>
            <div class="form-group">
                <input type="submit" class="form-control" value="upload">
            </div>
        </form>
        
    </div>
    
    <div class="col-lg-6" style="text-align: right;">
        <a href="<?php echo admin_url('manufacturers/add'); ?>">Add New Manufacturer</a>
    </div>
</div>

<div class="row">
    <?php if(isset($error)){ ?>
    <div class="alert alert-danger">
        <?php echo $error; ?>
    </div>
    <?php } ?>
    
    <?php echo form_open(admin_url('manufacturers/save')); ?>
    <table class="table table-responsive table-bordered">
        <thead>
            <tr>
                <td>Manu. #</td>
                <td>Name</td>
                <td>Phone</td>
                <td>Email</td>
                <td>Logo</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php $count = 1; ?>
            <?php foreach($manufacturers-> result() as $manufacturer){ ?>
            <?php echo form_hidden("manufacturerid$count", $manufacturer->id); ?>
            <tr>
                <td><?php echo $count; ?></td>
                
                <td>
                    <input type="text" name="<?php echo "manufacturername$count"; ?>" value="<?php echo set_value("manufacturername$count", $manufacturer->name); ?>"/>
                </td>
                
                <td>
                    <input type="text" name="<?php echo "manufacturerphone$count"; ?>" value="<?php echo set_value("manufacturerphone$count", $manufacturer->phone); ?>"/>
                </td>
                
                <td>
                    <input type="text" name="<?php echo "manufactureremail$count"; ?>" value="<?php echo set_value("manufactureremail$count", $manufacturer->email); ?>"/>
                </td>
                
                <td>
                    <select name="manufacturerlogo<?php echo $count; ?>">
                        <option value=""></option>
                        <?php foreach ($files as $file) { ?>     
                            <?php if($file != '..' && $file != '.'){ ?>
                            <option value="<?php echo $file; ?>" <?php if($manufacturer->logo == $file){echo 'selected';} ?>>
                                <?php echo $file; ?>
                            </option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </td>
                
                <td>
                    <a href="<?php echo admin_url('manufacturers/delete?id=' . $manufacturer->id); ?>">Delete</a>
                </td>
                
            </tr>
            <?php $count++; ?>
            <?php } ?>
        </tbody>
    </table>
    <input type="submit" class="btn btn-primary" value="Save Manufacturers"/>
    </form>
</div>
<div class="col-md-6">
    <?php if(isset($upload_error)){ echo '<p>' . $upload_error . '</p>'; } ?>
    <?php echo form_open_multipart(admin_url('gallery/upload'), array('role' => 'form', 'class' => 'form-inline'));?>
        <div class="form-group">
            <label class="sr-only" for="imagefile">Choose File:</label>
            <input type="file" class="form-control" id="imagefile" name="imagefile">
        </div>
        <div class="form-group">
            <input type="submit" class="form-control" value="upload">
        </div>
    </form>
</div>

<div class="col-md-6">
    <a href="<?php echo admin_url('gallery/add');?>">Add New Gallery Item</a>
</div>

<div class="col-md-12">
    <?php echo form_open('admin/gallery/save', array('role' => 'form')); ?>
        <table class="table table-responsive table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Title</td>
                    <td>Image</td>
                    <td>Order</td>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1; ?>
                <?php foreach($gallery->result() as $item){ ?>
                <tr>
                    <input type="hidden" name="id<?php echo $count; ?>" value="<?php echo $item -> id; ?>" />
                    <td><?php echo $item -> id; ?></td>

                    <td>
                        <input type="text" name="title<?php echo $count; ?>" value="<?php echo $item -> title; ?>" />
                    </td>

                    <td>
                        <select name="image<?php echo $count; ?>">
                            <option value=""></option>
                            <?php foreach ($files as $file) { ?>     
                                <?php if($file != '..' && $file != '.'){ ?>
                                <option value="<?php echo $file; ?>" <?php if($file == $item->image){echo 'selected';} ?>>
                                    <?php echo $file; ?>
                                </option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </td>

                    <td>
                        <input type="number" name="order<?php echo $count; ?>" value="<?php echo $item -> order; ?>" />
                    </td>
                    
                    <td>
                        <a href="<?php echo admin_url('gallery/delete?id=' . $item->id); ?>">Remove</a>
                    </td>
                    
                </tr>
                <?php $count++; ?>
                <?php } ?>
            </tbody>
        </table>
        <input type="submit" value="Save Gallery" class="btn"/>
    </form>
</div>
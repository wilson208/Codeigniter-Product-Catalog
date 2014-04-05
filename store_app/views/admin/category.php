<h2>Categories</h2>
<?php if(isset($error)){ ?>
<div class="alert alert-danger">
    <?php echo $error; ?>
</div>
<?php } ?>
<a href="<?php echo admin_url('category/add'); ?>">Add New category</a>
<?php echo form_open(admin_url('category/save'), array('role' => 'form'));?>
    <table class="table table-responsive table-bordered">
        <thead>
            <tr>
                <td>Category #</td>
                <td>Name</td>
                <td>Order</td>
            </tr>
        </thead>
        <tbody>
            <?php $count = 1; ?>
            <?php foreach($categories->result() as $category){ ?>
            <tr>
                <?php echo form_hidden('categoryid' . $count, $category->id); ?>
                <td><?php echo $count; ?></td>
                <td><input type="text" name="<?php echo "categoryname$count"; ?>" value="<?php echo set_value("cateogryname$count", $category->name); ?>"/></td>
                <td><input type="number" step="1" name="<?php echo "categoryorder$count"; ?>" value="<?php echo set_value("cateogryorder$count", $category->order); ?>"/></td>
                <td><a href="<?php echo admin_url('category/delete?id=' . $category->id) ?>">Delete</a></td>
            </tr>
            <?php $count++; ?>
            <?php } ?>
        </tbody>
    </table>
    <input type="submit" class="btn btn-primary" value="Save Categories"/>
</form>
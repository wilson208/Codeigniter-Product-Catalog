<?php 
    if($product->num_rows() == 0){
        redirect('admin/product/all', 'refresh');
    }else{
        $product = $product->row();
?>
<script type="text/javascript" src="<?php echo asset_url(); ?>js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        //selector: "textarea",
        mode : "specific_textareas",
        plugins: [ "", "code", "", ""],
        editor_selector : "myHtmlEditor"
     });
</script>

<a href="<?php echo admin_url('product'); ?>"><p>Return To All Products</p></a>
<?php echo form_open(admin_url('product/updateInfo')); ?>
    <div class="row">
        <h1>Product Information</h1>
        <p><?php echo validation_errors(); ?></p>
        <p><?php if(isset($message)){echo $message;}?></p>
            <div class="col-lg-6">
                <input type="hidden" class="form-control" id="product_id" name="product_id" value="<?php echo $product->id ;?>" />

                <div class="form-group">
                    <label for="product_name">Name:</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo set_value('product_name', $product->name);?>"/>
                </div>

                <div class="form-group">
                    <label for="product_sku">Stock Keeping Unit:</label>
                    <input type="text" class="form-control" id="product_sku" name="product_sku" value="<?php echo set_value('product_sku', $product->sku); ?>"/>
                </div>

                <div class="form-group">
                    <label for="product_quantity">Quantity:</label>
                    <input type="number" class="form-control" id="product_quantity" name="product_quantity" value="<?php echo set_value('product_quantity', $product->quantity); ?>" min="0"/>
                </div>

                <div class="form-group">
                    <label for="product_quantity">Price:</label>
                    <input type="number" step="any" class="form-control" id="product_price" name="product_price" value="<?php echo set_value('product_price', $product->price); ?>" min="0"/>
                </div>

            </div>

            <div class="col-lg-6">

                <div class="form-group">
                    <label for="product_manufacturer">Manufacturer:</label>
                    <select name="product_manufacturer" id="product_manufacturer" class="form-control">
                        <?php foreach($manufacturers->result() as $manufacturer){ ?>
                        <option value="<?php echo $manufacturer->id; ?>" <?php echo set_select('product_manufacturer', $manufacturer->id); ?>>
                            <?php echo $manufacturer->name; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="product_category">Category:</label>
                    <select name="product_category" id="product_category" class="form-control">
                        <?php foreach($categories->result() as $category){ ?>
                        <option value="<?php echo $category->id; ?>" <?php echo set_select('product_category', '$category->id'); ?>>
                            <?php echo $category->name; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="product_image">Main Image:</label>
                    <select name="product_image" id="product_image" class="form-control">
                        <?php foreach($images as $image){ ?>
                        <option value="<?php echo $image; ?>" <?php echo set_select('product_image', $image); ?>>
                            <?php echo $image; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="product_status">Status:</label>
                    <select name="product_status" id="product_status" class="form-control">
                        <option value="1" <?php echo set_select('product_status', '1', true); ?>>Enabled</option>
                        <option value="0" <?php echo set_select('product_status', '0', true); ?>>Disabled</option>
                    </select>
                </div>
            </div>
    </div>
    <div class="row">
        <div class="form-group">
            <label for="product_description">Description:</label>
            <textarea class="myHtmlEditor" id="product_description" name="product_description" style="width: 100%; height: 200px;"><?php echo set_value('product_description', $product->description);?></textarea>
        </div>
        <input class="btn btn-primary" type="submit" value="Save Product Info" />
    </div>
</form>

<div class="row">
    <h1>Additional Product Images</h1>
    <a href="<?php echo admin_url('product/addProductImage?product_id=' . $product->id); ?>">Add New</a>
    <?php echo form_open(admin_url('product/updateImages')); ?>
        <table class="table table-responsive table-striped">
        <?php $count = 1; ?>
        <?php foreach($productImages->result() as $image){ ?>
            <tr>
                <input type="hidden" name="id<?php echo $count;?>" value="<?php echo $image->id;?>" />
                <td><input type="text"</td>
            </tr>
        <?php } ?>
        </table>
    </form>
</div>

<div class="row">
    <h1>Product Specials</h1>
</div>

<div class="row">
    <h1>Product Reviews</h1>
</div>

<?php } ?>
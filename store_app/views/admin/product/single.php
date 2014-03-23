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
<?php echo form_open(admin_url('product/updateInfo')); ?>
    <div class="row">
        <h1>Product Information</h1>
            <div class="col-lg-6">

                <div class="form-group">
                    <label for="product_id">ID:</label>
                    <input type="text" class="form-control" id="product_id" name="product_id" value="<?php echo $product->id ;?>" disabled/>
                </div>

                <div class="form-group">
                    <label for="product_name">Name:</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $product->name ;?>"/>
                </div>

                <div class="form-group">
                    <label for="product_sku">Stock Keeping Unit:</label>
                    <input type="text" class="form-control" id="product_sku" name="product_sku" value="<?php echo $product->sku ;?>"/>
                </div>

                <div class="form-group">
                    <label for="product_quantity">Quantity:</label>
                    <input type="number" class="form-control" id="product_quantity" name="product_quantity" value="<?php echo $product->quantity ;?>" min="0"/>
                </div>

                <div class="form-group">
                    <label for="product_quantity">Price:</label>
                    <input type="number" class="form-control" id="product_price" name="product_price" value="<?php echo $product->price ;?>" min="0"/>
                </div>

            </div>

            <div class="col-lg-6">

                <div class="form-group">
                    <label for="product_manufacturer">Manufacturer:</label>
                    <select name="product_manufacturer" id="product_manufacturer" class="form-control">
                        <?php foreach($manufacturers->result() as $manufacturer){ ?>
                        <option value="<?php echo $manufacturer->id; ?>" <?php if($manufacturer->id == $product->manufacturer){echo 'selected';}?>>
                            <?php echo $manufacturer->name; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="product_category">Category:</label>
                    <select name="product_category" id="product_category" class="form-control">
                        <?php foreach($categories->result() as $category){ ?>
                        <option value="<?php echo $category->id; ?>" <?php if($category->id == $product->category){echo 'selected';}?>>
                            <?php echo $category->name; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="product_image">Main Image:</label>
                    <select name="product_image" id="product_image" class="form-control">
                        <?php foreach($images as $image){ ?>
                        <option value="<?php echo $image; ?>" <?php if($image == $product->image){echo 'selected';} ?>>
                            <?php echo $image; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="product_status">Status:</label>
                    <select name="product_status" id="product_status" class="form-control">
                        <option value="1">Enabled</option>
                        <option value="0">Disabled</option>
                    </select>
                </div>
            </div>
    </div>
    <div class="row">
        <div class="form-group">
            <label for="product_description">Description:</label>
            <textarea class="myHtmlEditor" id="product_description" name="product_description" style="width: 100%; height: 200px;"></textarea>
        </div>
        <input class="btn btn-primary" type="submit" value="Save Product Info" />
    </div>
</form>

<div class="row">
    <h1>Additional Product Images</h1>
    <a href="<?php echo admin_url('product/addProductImage?product_id=' . $product->id); ?>">Add New</a>
    <?php foreach($productImages->result as $image){ ?>
        
    <?php } ?>
</div>

<div class="row">
    <h1>Product Specials</h1>
</div>

<div class="row">
    <h1>Product Reviews</h1>
</div>

<?php } ?>
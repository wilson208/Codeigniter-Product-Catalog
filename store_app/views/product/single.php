<?php if($product != null && $product->num_rows() > 0){ ?>

<div class="col-lg-6">
    <img src="<?php echo asset_url('images/products/' . $product->row()->image); ?>" class="img-responsive img-rounded img-thumbnail" />
</div>

<div class="col-lg-6">
    <div class="row">
        <h2><?php echo $product->row()->name; ?></h2>
        <p><?php echo $product->row()->description; ?></p>
        <p>Details:</p>
        <table class="table table-responsive table-bordered">
            <tr>
                <td>Manufacturer</td>
                <td><?php echo $productManufacturer->row()->name;?></td>
            </tr>
            <tr>
                <td>Category</td>
                <td><?php echo $productCategory->row()->name;?></td>
            </tr>
            <tr>
                <td>Stock Status</td>
                <td>
                    <?php if($product->row()->quantity > 0){ ?>
                    <p>In Stock</p>
                    <?php }else{ ?>
                    <p>Out Of Stock</p>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td>Reviews</td>
                <td><a href="<?php echo base_url('review/',$product->row()->id); ?>">score</a></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><?php echo '£' . number_format((float)$product->row()->price, 2, '.', ''); ?></td>
            </tr>
        </table> 
    </div>
    
    <div class="row bottom-buffer">
        <div class="col-lg-6">
            <?php echo form_open('product/addToCart'); ?>
            <?php echo form_hidden('quantity', '1'); ?>
            <?php echo form_hidden('product_id', $product->row()->id); ?>
            <input type="submit" class="btn btn-block btn-default btn-primary" value="Add To Cart" />
            </form>
        </div>
    </div>
    
    <?php if($productImages->num_rows() > 0){ ?>
    
    <div class="row">
    <?php $count = 0; ?>
    <?php foreach($productImages->result() as $image){ ?>
        <div class="col-lg-6">
            <img class="img-thumbnail" src="<?php echo asset_url('images/products/' . $image->url); ?>" />
        </div>
    <?php $count++; ?>
    <?php if(($count % 2) == 0){ echo '</div><div class="row">'; }?>
    <?php } ?>
    </div>
    <?php } ?>
    
</div>

<?php }else{ ?>
<h2>Product Not Found</h2>
<?php } ?>



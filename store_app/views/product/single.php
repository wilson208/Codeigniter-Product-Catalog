<?php if($product != null && $product->num_rows() > 0){ ?>

<h2><?php echo $product->row()->name; ?></h2>
<p><?php echo $product->row()->description; ?></p>

<?php }else{ ?>
<h2>Product Not Found</h2>
<?php } ?>



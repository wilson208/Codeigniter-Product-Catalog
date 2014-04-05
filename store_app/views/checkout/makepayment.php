<?php if(isset($message)){ ?>
<div class="alert alert-danger"><?php $message; ?></div>
<?php } ?>

<div class="row">
    <h2>Payment</h2>
    <h3>Order Status: <?php echo $order->row()->status;?></h3>
    <table class="table table-responsive table-bordered">
        <thead>
            <tr>
                <td>Product Name:</td>
                <td>Quantity:</td>
                <td>Unit Price:</td>
                <td>Total Price:</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products->result() as $product){ ?>
            <tr>
                <td><?php echo $product->name; ?></td>
                <td><?php echo $product->quantity; ?></td>
                <td>£<?php echo number_format($product->price, 2, '.', ''); ?></td>
                <td>£<?php echo number_format(($product->price * $product->quantity), 2, '.', '');($product->price * $product->quantity); ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <p>Order Total: <?php echo $total; ?></p>
    <?php echo form_open('checkout/processPayment', array('role' => 'form')); ?>
        <?php echo form_hidden('order_id', $order->row()->id); ?>
        <input type="submit" class="btn btn-primary" value="Make Payment" onsubmit="show()" />
        <div id = "loadingDiv" style="display:none"><img id = "myImage" src = "<?php echo asset_url('images/ajax-loader.gif') ?>"></div>
        
    </form>
</div>

<script type = "text/javascript">

function show() {
    document.getElementById("loadingDiv").style.display="block";
    setTimeout("hide()", 5000);  // 5 seconds
    return true;
}

function hide() {
    document.getElementById("loadingDiv").style.display="none";
}

</script>
<div class="row">
    <h1>Checkout</h1>
<?php if(sizeof($this->cart->contents()) > 0){ ?>
    <div class="row">
        <h3>Customer Details</h3>
        
        <div class="col-lg-6">
            
        </div>
        
        <div class="col-lg-6">
            
        </div>
        
    </div>
    <table class="table table-responsive table-striped">
        <thead>
            <tr>
                <td>Product Name</td>
                <td>Quantity</td>
                <td>Price</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($this->cart->contents() as $item){ ?>
            <tr>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['qty']; ?></td>
                <td><?php echo "£" . number_format($item['price'], 2, '.', ''); ?></td>
                <td><a href="<?php echo base_url('product/deleteFromCart?rowid=' . $item['rowid']); ?>"></a></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td>Total:</td>
                <td><?php echo "£" . number_format($this->cart->total(), 2, '.', ''); ?></td>
            </tr>
        </tfoot>
    </table>
<?php } else { ?>
    <h2>Sorry, Your Cart Is Empty!</h2>
<?php } ?>
</div>

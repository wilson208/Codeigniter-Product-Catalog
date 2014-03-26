<div class="row">
    <h1>Checkout</h1>
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
                <td><?php echo $item['price']; ?></td>
                <td><a href="<?php echo base_url('product/deleteFromCart?rowid=' . $item['rowid']); ?>"></a></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td>Total:</td>
                <td><?php echo "£" . number_format($this->cart->total(), 2, '.', ''); ?></td>
            </tr>
        </tfoot>
    </table>
</div>

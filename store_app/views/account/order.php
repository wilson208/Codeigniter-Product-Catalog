<h2>Viewing Order #<?php echo $order->id; ?></h2>
<h3>Details</h3>
<table class="table table-responsive table-bordered">
    <tr>
        <td>Order Made:</td>
        <td><?php echo $order->date_created;?></td>
    </tr>
    <tr>
        <td>Status:</td>
        <td><?php echo $order->status;?></td>
    </tr>
    <tr>
        <td>Order Status Updated: </td>
        <td><?php echo $order->date_modified;?></td>
    </tr>
</table>

<h3>Products</h3>
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
<h4>Total: £<?php echo number_format($total, 2); ?></h4>
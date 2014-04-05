<h2>Viewing Order #<?php echo $order->id; ?></h2>
<div class="row">
    
    <div class="col-lg-6">
        <h3>Order Details</h3>
        <table class="table table-responsive table-bordered">
            <tr>
                <td>Order Made:</td>
                <td><?php echo $order->date_created;?></td>
            </tr>
            <tr>
                <td>Status:</td>
                <td>
                    <?php echo $order->status;?>
                    <?php if($order->status != 'shipped'){ ?>
                    <a href="<?php echo admin_url('orders/markShipped?id=' . $order->id); ?>">Mark As Shipped</a>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td>Order Status Updated: </td>
                <td><?php echo $order->date_modified;?></td>
            </tr>
        </table>
    </div>

    <div class="col-lg-6">
        <h3>User Details</h3>
        <table class="table table-responsive table-bordered">
            <tr>
                <td>Name: </td>
                <td><?php echo $user->title . ' ' . $user->forename . ' ' . $user->surname; ?></td>
            </tr>
            <tr>
                <td>Address 1:</td>
                <td><?php echo $user->address1;?></td>
            </tr>
            <tr>
                <td>Address 2:</td>
                <td><?php echo $user->address2;?></td>
            </tr>
            <tr>
                <td>Town:</td>
                <td><?php echo $user->town;?></td>
            </tr>
            <tr>
                <td>Postcode:</td>
                <td><?php echo $user->postcode;?></td>
            </tr>
            <tr>
                <td>County:</td>
                <td><?php echo $user->county;?></td>
            </tr>
            <tr>
                <td>Country:</td>
                <td><?php echo $user->country;?></td>
            </tr>
        </table>
    </div>
    
</div>


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
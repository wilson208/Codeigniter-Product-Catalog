<h2>Orders</h2>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Status</td>
            <td>Date Made</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($orders->result() as $order){ ?>
        <tr>
            <td><?php echo $order->id; ?></td>
            <td><?php echo $order->status; ?></td>
            <td><?php echo $order->date_created; ?></td>
            <td><a href="<?php echo admin_url('orders/single?id=' . $order->id); ?>">View Order</a></td>
        </tr>
        <?php } ?> 
    </tbody>
</table>
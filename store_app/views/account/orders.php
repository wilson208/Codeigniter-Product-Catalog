<h2>My Order History</h2>
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
            <td><?php echo date('l jS F Y H:i', strtotime($order->date_created));?></td>
            <td><a href="<?php echo base_url('account/orders/' . $order->id); ?>">View Order</a></td>
        </tr>
        <?php } ?> 
    </tbody>
</table>

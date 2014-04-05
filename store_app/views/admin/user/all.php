<div class="col-md-12">
    <h1>Users</h1>
    <table class="table table-responsive table-bordered table-hover">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Country</td>
                <td>Date Created</td>
                <td>Is Admin?</td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($user->result() as $user){ ?>
            <tr>
                <td><?php echo $user->id; ?></td>
                <td><?php echo $user->title . ' ' . $user->forename . ' ' . $user->surname ?></td>
                <td><?php echo $user->email; ?></td>
                <td><?php echo $user->phone; ?></td>
                <td><?php echo $user->country; ?></td>
                <td><?php echo date('l jS F Y H:i', strtotime($user->date_created));?></td>
                <td><?php if($user->admin == 1){echo 'Yes';}else{echo 'No';} ?></td>
                
                <td><a href="<?php echo admin_url('user/single?id=' . $user->id); ?>">Edit</a></td>
                <td><a href="<?php echo admin_url('user/delete?id=' . $user->id); ?>">Delete</a></td>
            </tr>
            <?php } ?>
        </tbody>
        
    </table>
</div>

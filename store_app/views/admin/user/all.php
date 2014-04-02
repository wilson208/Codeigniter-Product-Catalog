<div class="col-md-12">
    <h1>Users</h1>
    <table class="table table-responsive table-responsive">
        <thead>
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Forename</td>
                <td>Surname</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Address 1</td>
                <td>Town</td>
                <td>Country</td>
                <td>Date Created</td>
                <td>Admin</td>
                <td><a href="<?php echo admin_url('user/add'); ?>">New User</a></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($user->result() as $user){ ?>
            <tr>
                <td><?php echo $user->id; ?></td>
                <td><?php echo $user->title; ?></td>
                <td><?php echo $user->forename; ?></td>
                <td><?php echo $user->surname; ?></td>
                <td><?php echo $user->email; ?></td>
                <td><?php echo $user->phone; ?></td>
                <td><?php echo $user->address1; ?></td>
                <td><?php echo $user->town; ?></td>
                <td><?php echo $user->country; ?></td>
                <td><?php echo $user->date_created; ?></td>
                <td><?php echo $user->admin; ?></td>
                
                <td><a href="<?php echo admin_url('user/single?id=' . $user->id); ?>">Edit</a></td>
                <td><a href="<?php echo admin_url('user/delete?id=' . $user->id); ?>">Delete</a></td>
            </tr>
            <?php } ?>
        </tbody>
        
    </table>
</div>

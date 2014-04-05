<div class="col-md-12">
    <h1>Blogs</h1>
    <table class="table table-responsive table-responsive">
        <thead>
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Blog</td>
                <td>User ID</td>
                <td>Status</td>
                
                <td><a href="<?php echo admin_url('blog/add'); ?>">New Blog</a></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($blog->result() as $blog){ ?>
            <tr>
                <td><?php echo $blog->id; ?></td>
                <td><?php echo $blog->title; ?></td>
                <td><?php echo $blog->blog; ?></td>
                <td><?php echo $blog->user_id; ?></td>
                <td><?php echo $blog->status; ?></td>
                <td><a href="<?php echo admin_url('blog/single?id=' . $blog->id); ?>">Edit</a></td>
                <td><a href="<?php echo admin_url('blog/delete?id=' . $blog->id); ?>">Delete</a></td>
            </tr>
            <?php } ?>
        </tbody>
        
    </table>
</div>
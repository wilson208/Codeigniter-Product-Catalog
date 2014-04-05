<div class="col-md-12">
    <h1>Blogs</h1>
    <a href="<?php echo admin_url('blog/add'); ?>">New Blog</a>
    <table class="table table-responsive table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Status</td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($blog->result() as $blog){ ?>
            <tr>
                <td><?php echo $blog->id; ?></td>
                <td><?php echo $blog->title; ?></td>
                <td><?php if($blog->status == 1){ echo 'Enabled'; }else{ echo 'Disabled';} ?></td>
                <td><a href="<?php echo admin_url('blog/single?id=' . $blog->id); ?>">Edit</a></td>
                <td><a href="<?php echo admin_url('blog/delete?id=' . $blog->id); ?>">Delete</a></td>
            </tr>
            <?php } ?>
        </tbody>
        
    </table>
</div>
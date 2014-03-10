<div class="col-md-12">
    <h1>Pages</h1>
    <table class="table table-responsive table-responsive">
        <thead>
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>URL</td>
                <td><a href="<?php echo admin_url('pages/add'); ?>">New Page</a></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($pages->result() as $page){ ?>
            <tr>
                <td><?php echo $page->id; ?></td>
                <td><?php echo $page->page_title; ?></td>
                <td><?php echo $page->url; ?></td>
                <td><a href="<?php echo admin_url('pages/single?id=' . $page->id); ?>">Edit</a></td>
                <td><a href="<?php echo admin_url('pages/delete?id=' . $page->id); ?>">Delete</a></td>
            </tr>
            <?php } ?>
        </tbody>
        
    </table>
</div>
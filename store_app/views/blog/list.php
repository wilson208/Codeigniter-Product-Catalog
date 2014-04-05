<div class="row">
    <h2>Our Blog</h2>
    <ul class="list-group">
        <?php foreach($blogs->result() as $blog){ ?>
        <li class="list-group-item">
            <a href="<?php echo base_url('blog/' . $blog->id); ?>">
                <h4><?php echo $blog->title ?></h4>
            </a>
                <p><?php echo substr(strip_tags($blog->blog), 0, 240 ) . ' . . . '; ?></p>
                <p>Created: <?php echo date('l jS F Y', strtotime($blog->date_created)); ?></p>
        </li>
        <?php } ?>
    </ul>
</div>
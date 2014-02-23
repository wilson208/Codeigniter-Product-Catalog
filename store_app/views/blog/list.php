<div class="row">
    <h2>Our Blog</h2>
    <ul>
        <?php foreach($blogs->result() as $blog){ ?>
        <li>
            <a href="<?php echo base_url('blog/single?blog_id=' . $blog->id); ?>"><?php echo $blog->title ?></a>
        </li>
        <?php } ?>
    </ul>
</div>
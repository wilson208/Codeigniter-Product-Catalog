<script type="text/javascript" src="<?php echo asset_url('raty/lib/jquery.raty.min.js'); ?>"></script>

<h1>Reviews for <?php echo $product->name ?></h1>
<?php foreach($review as $row){?>
<div class="row  col-lg-10">
    <table class="table table-responsive table-striped table-condensed ">
        <tr>
            <td><?php echo $row->name; ?></td> 
            <td><?php echo date('jS M Y', strtotime($row->date)); ?></td>
            <td><div id="star<?php echo $row->id; ?>" class=""></div></td>
        </tr>
    </table>
</div> 
<div class="col-lg-8 row bottom-buffer"><?php echo $row->review; ?></div>   
<script type="text/javascript">
    $(function()
    {
        $('#star<?php echo $row->id; ?>').raty({ 
            path: '<?php echo asset_url('raty/lib/img') ?>',
            score: <?php echo $row->score; ?>,
            readOnly: true});
    });
</script>
<?php } ?>

<script type="text/javascript" src="<?php echo asset_url('raty/lib/jquery.raty.min.js'); ?>"></script>

<h1>Reviews for (ProductName)</h1>
<?php foreach($review->result() as $row){?>
<div class="row  col-lg-10">
    <table class="table table-responsive table-striped table-condensed ">
        <tr>
            <td><?php echo $row->name; ?></td> 
            <td><?php echo date('jS M Y', strtotime($row->date)); ?></td>
            <td><div id="star" class=""></div></td>
        </tr>
    </table>
</div> 
<div class="col-lg-8 row"><?php echo $row->review; ?></div>   
<?php } ?>
<script type="text/javascript">
    $(function()
    {
        $('#star').raty({ 
            path: '<?php echo asset_url('raty/lib/img') ?>',
            score: 3});
    });
</script>
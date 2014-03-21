<!--This should probably be implemented with Ajax or something? will work on-->
<h1>Details were updated successfully</h1>
<script type="text/javascript">
    setTimeout(function () {
        window.location.href = "<?php echo base_url('account/login'); ?>";
    }, 6000);
</script>
If you are not redirected automatically, <a href="<?php echo base_url('account/login');?>">Click Here</a>
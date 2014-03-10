<?php 
    if($product_info->num_rows() == 0){
        redirect('admin/product/all', 'refresh');
    }else{
?>

<div class="col-md-12">
    <table class="table table-responsive table-striped">
        <tr>
            <td>Name:</td>
            <td><input type="text" name="name" id="name" value="" /></td>
        </tr>
    </table>
</div>

<?php } ?>
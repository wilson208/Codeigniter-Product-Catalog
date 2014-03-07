<?php
    if(isset($title)){
        echo '<h1>' . $title . '</h1>';
    }
    $count = 0;
    foreach($products->result() as $row){
        
        if($count > 2){
            $count = 0;
        }
        
        if($count == 0){
            echo '<div class="row">';
        }
?>
<a href="<?php echo base_url('product/' . $row->id); ?>">
    <div class="col-lg-4 text-center">
        <h4><?php echo $row->name; ?></h4>
        <img class="img-responsive img-thumbnail img-square" src="<?php echo asset_url('images/products/' . $row->image) ; ?>" />
        <?php if($row->quantity > 0){ ?>
        <p style="color:green;">In Stock</p>
        <?php }else{ ?>
        <p style="color:red;">Out Of Stock</p>
        <?php } ?>
    </div>
</a>
<?php

        $count++;
        
        if($count > 2 || $count >= $products->num_rows()){
            echo '</div>';
        }
    }
?>
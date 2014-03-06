
<h1>Gallery</h1>
<?php 
if($gallery != null && $gallery->num_rows() > 0){
    $count = 0;
    foreach($gallery->result() as $image){ 
        if($count > 2){
            $count = 0;
        }
        
        if($count == 0){
            echo '<div class="row">';
        }
?>        
<div class="col-md-4">
    <a href="<?php echo asset_url('images/gallery/' . $image->image); ?>" >
        <img class="img-responsive img-rounded" src="<?php echo asset_url('images/gallery/' . $image->image); ?>" alt="<?php echo $image->title; ?>" />
    </a>
    <center><h4><?php echo $image->title; ?></h4></center>
</div>   
<?php        
        if($count == 2 || $count == $gallery->num_rows()){
            echo '</div>';
        }
        
        $count++;
    }
}else{
?>
<h2>
    No Images In Gallery
</h2>
<?php } ?>
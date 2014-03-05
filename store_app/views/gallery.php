<link type="text/css" src="<?php echo asset_url('css/jquery.simple.lightbox.css'); ?>"/>
<link type="text/javascript" src="<?php echo asset_url('js/jquery.bootstrap.simple.lightbox.js'); ?>"/>
<h1>Gallery</h1>
<?php 
if($gallery != null && $gallery->num_rows() > 0){
    $count = 0;
    foreach($gallery->result() as $image){ 
        if($count >= 2){
            $count = 0;
        }
        
        if($count == 0){
            echo '<div class="row">';
        }
?>        
<div class="col-md-4">
    <img class="img-responsive img-thumbnail" src="<?php echo asset_url('images/gallery/' . $image->image); ?>" />
    <h4><?php echo $image->title; ?></h4>
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

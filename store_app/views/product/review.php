<div>
    <h1>Reviews for (ProductName)</h1>
    <div class="col-lg-5"><?php echo $review->name; ?></div>
    <div class="right"><?php echo date('jS M Y', strtotime($review->date)); ?></div>
    <div ><?php echo $review->score; ?></div>
    <div class="star"
    <div class="col-lg-7"><?php echo $review->review; ?></div>
</div>
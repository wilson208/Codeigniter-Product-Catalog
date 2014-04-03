<a href="<?php echo base_url('review/' . $row->id); ?>">
<div>
    <h1>Reviews</h1>
    
    <?php
    
    $count = 0;
    while($count < 4)
    {
    ?>
        <div><?php echo $user->forename; ?>  date</div>
        <div>
            <textarea>
                review
            </textarea>
        </div>        
    <?php
        $count ++;
    }
    ?>
</div> 
</a>
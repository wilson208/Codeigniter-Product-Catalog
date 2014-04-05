<script type="text/javascript" src="<?php echo asset_url('raty/lib/jquery.raty.min.js'); ?>"></script>

<h1>Reviews for <?php echo $product->name; ?></h1>
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
<?php echo form_open('review/processReview', array('role' => 'form')); ?>
<?php echo form_hidden('productId',$product->id); ?>
<div >
    <div class="row col-lg-8 ">
        <label>Add your own review!</label>
    </div>
    <div class="form-group">
        <textarea name="review" type="text" class="form-control" id="review" placeholder="Type your review here!" rows="8" maxlength="500" cols="1"></textarea>
    </div>
    <div class="form-group pagination">
        <select name="score" class="form-control ">
            <option name="score" value="1" selected>1</option>
            <option name="score" value="2">2</option>
            <option name="score" value="3">3</option>
            <option name="score" value="4">4</option>
            <option name="score" value="5">5</option>
        </select>
    </div>
    <div class="pagination">
        <button name="submit" value="Submit" type="submit" class="btn btn-default btn-primary">Submit Review</button>
    </div>
    <div id="charsLeft" class="pagination"></div>
</div>
</form>

<script type="text/javascript">
    $('#review').keyup(function () {
      var max = 500;
      var len = $(this).val().length;
      if (len >= max) {
        $('#charsLeft').text('Limit reached!');
      } else {
        var char = max - len;
        $('#charsLeft').text(char);
      }
    });
</script>
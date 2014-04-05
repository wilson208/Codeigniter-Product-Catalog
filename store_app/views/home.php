<div id="carousel-homepage" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel-homepage" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-homepage" data-slide-to="1"></li>
    <li data-target="#carousel-homepage" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="item active">
        <img src="<?php echo asset_url('images/homepage/1.jpg') ?>" data-src="holder.js/900x500/auto/#777:#555/text:First slide" alt="First slide">
        <div class="carousel-caption">
          <h3>Our Store In London</h3>
        </div>
    </div>
    <div class="item">
      <img src="<?php echo asset_url('images/homepage/2.jpg') ?>" data-src="holder.js/900x500/auto/#666:#444/text:Second slide" alt="Second slide">
      <div class="carousel-caption">
          <h3>A Bracket For One Of Our Cameras</h3>
      </div>
    </div>
    <div class="item">
      <img src="<?php echo asset_url('images/homepage/3.jpg') ?>" data-src="holder.js/900x500/auto/#555:#333/text:Third slide" alt="Third slide">
      <div class="carousel-caption">
          <h3>The Engine Of One Of Our Delivery Bikes!</h3>
      </div>
    </div>
  </div>

  <a class="left carousel-control" href="#carousel-homepage" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-homepage" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
<script type="text/javascript">
$('.carousel').carousel({
  interval: 2000
})
</script>
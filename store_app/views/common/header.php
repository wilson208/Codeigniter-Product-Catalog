<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if(isset($title)){echo $title;}else{echo getOption('title', 'Online Store');} ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo asset_url('css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo asset_url('css/style.css'); ?>" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-40701782-2', 'none');
  ga('send', 'pageview');

</script>
    
    
  </head>
  <body>
    
    <div class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            
            <li <?php if($this->uri->segment(1) == 'home' || $this->uri->segment(1) == ''){ echo 'class="active"';} ?>>
                <a href="<?php echo base_url('home'); ?>">Home</a>
            </li>
            
            <li <?php if($this->uri->segment(1) == 'blog'){ echo 'class="active"';} ?>>
                <a href="<?php echo base_url('blog'); ?>">Blog</a>
            </li>
            
            <li <?php if($this->uri->segment(1) == 'gallery'){ echo 'class="active"';} ?>>
                <a href="<?php echo base_url('gallery'); ?>">Gallery</a>
            </li>
            
            <li <?php if($this->uri->segment(1) == 'contact'){ echo 'class="active"';} ?>>
                <a href="<?php echo base_url('contact'); ?>">Contact Us</a>
            </li>
            
                <?php if(isset($categories)){ ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <?php foreach($categories->result() as $category){ ?>
                    <li><a href="<?php echo base_url('category/' . $category->id) ;?>"><?php echo $category->name;?></a></li>
                    <?php } ?> 
              </ul>
            </li>
            <?php } ?>
            
          </ul>
            
          <ul class="nav navbar-nav navbar-right">
            <?php if(isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in'] == true){?>
              <li class="dropdown">
                  <a href="<?php echo base_url('checkout');?>" class="dropdown-toggle" data-toggle="dropdown">Cart <b class="caret"></b></a>
                  <table class="table table-responsive table-striped dropdown-menu">
                      <?php foreach($this->cart->contents() as $item){ ?>
                      <tr>
                          <td><?php echo $item['qty'] . 'x ' . $item['name'] . ' @ £' . number_format($item['price'], 2, '.', ''); ?> <a href="<?php echo base_url('product/deleteFromCart?rowid=' . $item['rowid']); ?>">Remove</a></td>
                      </tr>
                      <?php } ?>
                      <tr>
                          <td>Total: <?php echo "£" . number_format($this->cart->total(), 2, '.', ''); ?></td>
                      </tr>
                      <tr>
                          <td><a href="<?php echo base_url('checkout');?>">Checkout</a></td>
                      </tr>
                  </table>
              </li>
              
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome <?php echo $this->session->userdata['name']; ?> <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="<?php echo base_url('account/editDetails'); ?>">Edit Details</a></li>
                      <li><a href="<?php echo base_url('account/editPassword'); ?>">Edit Password</a></li>
                      <li><a href="<?php echo base_url('account/orders');?>">Order History</a></li>
                  </ul>
              </li>
              <li>
                <a href="<?php echo base_url('account/processLogout'); ?>">Logout</a>
              </li>
            <?php }else{ ?>
              <li><a>Welcome Guest</a></li>
              <li <?php if($this->uri->segment(1) == 'account' && $this->uri->segment(2) == 'login'){ echo 'class="active"';} ?>>
                <a href="<?php echo base_url('account/login'); ?>">Login/Register</a>
              </li>
            <?php } ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    
    <div class="container">
        <div class="row">
<?php if(!$fullWidth){ ?>            
            <div class="col-md-3">
                <div class="list-group">
                    <p>Shop By Brand</p>
                    <?php foreach($manufacturers->result() as $manufacturer){ ?>
                    <a href="<?php echo base_url('manufacturer/' . $manufacturer->id) ;?>" class="list-group-item"><?php echo $manufacturer->name;?></a>
                    <?php } ?>
                </div>
                <div class="alert alert-info">See Our <a>Special Offers</a></div>
                <div class="alert alert-success"><a href="<?php echo base_url('account/register');?>">Register</a> & Join Our Newsletter</div>
                <div class="alert alert-info"><a href="<?php echo base_url('gallery');?>">Look Around</a> Our Store</div>
            </div>
            <div class="col-md-9">
<?php }else{ ?>
                <div class="col-md-12">
<?php } ?>

                
           

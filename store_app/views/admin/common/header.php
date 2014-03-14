<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Store Administration</title>

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
          <a class="navbar-brand" href="#">Administration</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            
            <li <?php if($this->uri->segment(2) == 'home' || $this->uri->segment(1) == ''){ echo 'class="active"';} ?>>
                <a href="<?php echo base_url('home'); ?>">Home</a>
            </li>
            
            <li <?php if($this->uri->segment(2) == 'blog'){ echo 'class="active"';} ?>>
                <a href="<?php echo admin_url('blog'); ?>">Blog</a>
            </li>
            
            <li <?php if($this->uri->segment(2) == 'gallery'){ echo 'class="active"';} ?>>
                <a href="<?php echo admin_url('gallery'); ?>">Gallery</a>
            </li>
            
            <li <?php if($this->uri->segment(2) == 'products'){ echo 'class="active"';} ?>>
                <a href="<?php echo admin_url('product'); ?>">Products</a>
            </li>
            
            <li <?php if($this->uri->segment(2) == 'pages'){ echo 'class="active"';} ?>>
                <a href="<?php echo admin_url('pages'); ?>">Pages</a>
            </li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php if(isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in'] == true){?>
              <li><a>Welcome <?php echo $this->session->userdata['name']; ?></a></li>
              <li>
                <a href="<?php echo base_url('account/processLogout'); ?>">Logout</a>
              </li>
            <?php }else{ ?>
              <li><a>Welcome Guest</a></li>
              <li <?php if($this->uri->segment(1) == 'account' && $this->uri->segment(2) == 'login'){ echo 'class="active"';} ?>>
                <a href="<?php echo base_url('account/login'); ?>">Login</a>
              </li>
            <?php } ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
      
      <div class="container">
          <div class="row">
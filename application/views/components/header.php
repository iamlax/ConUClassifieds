<!DOCTYPE html>
<html>
<head>
<title>ConUClassifieds</title>
<link rel="stylesheet" href="<?php echo asset_url();?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo asset_url();?>css/bootstrap-select.css">
<link href="<?php echo asset_url();?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo asset_url();?>css/flexslider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo asset_url();?>css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>css/easy-responsive-tabs.css " />
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!--//fonts-->	
<!-- js -->
<script type="text/javascript" src="<?php echo asset_url();?>js/jquery.min.js"></script>
<!-- js -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo asset_url();?>js/bootstrap.min.js"></script>
<script src="<?php echo asset_url();?>js/bootstrap-select.js"></script>
<script src="<?php echo asset_url();?>js/easyResponsiveTabs.js"></script>
<script>
  $(document).ready(function () {
    var mySelect = $('#first-disabled2');

        function hideURLbar() {
            window.scrollTo(0, 1);
        } });</script>
    <!-- //for-mobile-apps -->
    <!--fonts-->
    <link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
          rel='stylesheet' type='text/css'>
    <!--//fonts-->
    <!-- js -->
    <script type="text/javascript" src="<?php echo asset_url(); ?>js/jquery.min.js"></script>
    <!-- js -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo asset_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/bootstrap-select.js"></script>
    <script src="<?php echo asset_url(); ?>js/easyResponsiveTabs.js"></script>
    <script>
        $(document).ready(function () {
            var mySelect = $('#first-disabled2');

            $('#special').on('click', function () {
                mySelect.find('option:selected').prop('disabled', true);
                mySelect.selectpicker('refresh');
            });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });
  });
</script>
<script type="text/javascript" src="<?php echo asset_url();?>js/jquery.leanModal.min.js"></script>
<link href="<?php echo asset_url();?>css/jquery.uls.css" rel="stylesheet"/>
<link href="<?php echo asset_url();?>css/jquery.uls.grid.css" rel="stylesheet"/>
<link href="<?php echo asset_url();?>css/jquery.uls.lcd.css" rel="stylesheet"/>
<!-- Source -->
<script src="<?php echo asset_url();?>js/jquery.uls.data.js"></script>
<script src="<?php echo asset_url();?>js/jquery.uls.data.utils.js"></script>
<script src="<?php echo asset_url();?>js/jquery.uls.lcd.js"></script>
<script src="<?php echo asset_url();?>js/jquery.uls.languagefilter.js"></script>
<script src="<?php echo asset_url();?>js/jquery.uls.regionfilter.js"></script>
<script src="<?php echo asset_url();?>js/jquery.uls.core.js"></script>
<script src="<?php echo asset_url();?>js/list.min.js"></script>
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="logo">
				<a href="<?php echo base_url();?>"><span>ConU</span>Classifieds</a>
			</div>
            <div class="header-right">
                <?php if($this->session->userdata('userId') !== null ) : ?>
                    <a class="account" href="<?php echo base_url();?>viewProfile">My Account</a>
                <?php endif; ?>
            </div>
		</div>
	</div>
</body
<header role="banner">
<nav id="navbar-primary" class="navbar" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-primary-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="navbar-primary-collapse">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url();?>">Home</a></li>
        <li><a href="<?php echo base_url();?>locations">Locations</a></li>
        <li><a href="<?php echo base_url();?>categories">Categories</a></li>
        <li><a href="<?php echo base_url();?>advertisements/user/<?php echo $this->session->userdata('userId');?>">My Ads</a></li>
        <li><a href="<?php echo base_url();?>viewProfile">My Account</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header><!-- header role="banner" -->
<?php if ($this->session->flashdata('success') !== null) { ?>
    <div class="alert alert-success text-center">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php } ?>
<?php if ($this->session->flashdata('error') !== null) { ?>
    <div class="alert alert-danger text-center">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php } ?>
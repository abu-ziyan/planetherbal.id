<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <base href="" />
	<!-- Basic Page Needs

     ================================================== -->
	 
	 <meta charset="utf-8">
	 
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
	 <link rel="icon" type="image/png" href="images/favicon.png">
	
     <title><?= $title ?></title>
    
     <meta name="description" content="">
    
     <meta name="keywords" content="">
    
     <meta name="author" content="">

	 
	 <!-- Mobile Specific Metas
    
     ================================================== -->
    
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    
     <meta name="format-detection" content="telephone=no">
	 
	 
	 <!-- Web Font
	 ============================================= -->
	 <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet">
	 
	
	<!-- CSS
    
     ================================================== -->
	 
	 
	<!-- Theme Color
	============================================= -->
	<link rel="stylesheet" id="color" href="<?= base_url('assets/front/css/cyan.css') ?>">
    
	
	<!-- Medicom Style
	============================================= -->
    <link rel="stylesheet" href="<?= base_url('assets/front/css/medicom.css') ?>">

	
	<!-- Bootstrap
	============================================= -->
    <link rel="stylesheet" href="<?= base_url('assets/front/css/bootstrap.css') ?>">

    
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->	
	
	<!-- Header Scripts
    
    ================================================== -->
	
	<script src="<?= base_url('assets/front/js/modernizr-2.6.2.min.js') ?>"></script>
	
	

	</head>
    <body class="fixed-header">
	
		
    
		<!-- Document Wrapper
		============================================= -->
		<div id="wrapper" class="clearfix">
    
    
			<!-- Header
			============================================= -->
			<header id="header" class="medicom-header">
			
				<!-- Top Row
				============================================= -->
				<div class="colourfull-row"></div>
			
				<div class="container">
					
					
					<!-- Primary Navigation
					============================================= -->
					<nav class="navbar navbar-default" role="navigation">
					
						<!-- Brand and toggle get grouped for better mobile display
						============================================= -->
						
						<div class="navbar-header">
							
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary-nav">
							  <span class="sr-only">Toggle navigation</span>
							  <span class="icon-bar"></span>
							  <span class="icon-bar"></span>
							  <span class="icon-bar"></span>
							</button>
							
							<a class="navbar-brand" href="<?= base_url('front/index') ?>"><img src="images/planetherbal.png" alt="" title=""></a>
						
						</div>
					
						
						<div class="collapse navbar-collapse navbar-right" id="primary-nav">
							
							<ul class="nav navbar-nav">
								
								<li class="dropdown">
									<a href="<?= base_url('front/index') ?>">Beranda</a>															
								</li>
							  
								<li class="mega-menu-item dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Produk Kami</a>
									<div class="mega-menu dropdown-menu">
										<img src="images/produk-kami.png" class="img-rounded" alt="" title="">
										<ul>
											<li><a href="semuaproduk.html">Semua Produk</a></li>
											<?php foreach ($kategori_produk as $katpro): ?>
                                                <li value="<?= $katpro->nm_kategori_produk ?>">
                                                    <?= $katpro->nm_kategori_produk ?>
                                            </li>
                                            <?php endforeach; ?> 
										</ul>
									</div>
								</li>
							  
								<li class="mega-menu-item dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Artikel</a>
									<div class="mega-menu dropdown-menu">
										<img src="images/produk-kami.png" class="img-rounded" alt="" title="">
										<ul>
											<li><a href="semuaproduk.html">Semua Kategori</a></li>
											<?php foreach ($kategori_artikel as $katart): ?>
                                                <li value="<?= $katart->nm_kategori_artikel ?>">
                                                    <?= $katart->nm_kategori_artikel ?>
                                            </li>
                                            <?php endforeach; ?>
										</ul>
									</div>
								</li>

								<li class="dropdown">
									<a href="tentang-kami.html">Tentang Kami</a>															
								</li>
							  
							</ul>
							
						</div>
						
					</nav>

				</div>
				
				<div class="header-bottom-line"></div>

			</header>
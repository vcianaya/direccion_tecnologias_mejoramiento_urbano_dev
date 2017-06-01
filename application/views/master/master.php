<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>DTMU | Sistemas</title>
	<!-- Google fonts -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
	<!-- font awesome -->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<!-- bootstrap -->
	<?php if (isset($css)): ?>
		<?php echo $css; ?>
	<?php endif ?>
	<link href="<?= base_url() ?>assets/plugin/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
	<!-- animate.css -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/master/animate/animate.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/master/animate/set.css" />
	<!-- gallery -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/master/gallery/blueimp-gallery.min.css">
	<!-- favicon -->
	<link rel="shortcut icon" href="<?=base_url()?>assets/logos/icon.png" type="image/x-icon">
	<link rel="stylesheet" href="<?= base_url() ?>assets/master/style.css">
</head>
<body>
	<div class="topbar animated fadeInLeftBig"></div>
	<!-- Header Starts -->
	<div class="navbar-wrapper">
		<div class="container">
			<div class="navbar navbar-default navbar-fixed-top" role="navigation" id="top-nav">
				<div class="container">
					<div class="navbar-header">
						<!-- Logo Starts -->
						<a class="navbar-brand" href="#home"><img src="<?= base_url() ?>assets/logos/DTMU_1.png" width="300px" height="60px" alt="logo"></a>
						<!-- #Logo Ends -->
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<!-- Nav Starts -->
					<div class="navbar-collapse  collapse">
						<ul class="nav navbar-nav navbar-right scroll">

							<li class="dropdown active">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="true">
									<i class="fa fa-user fa-fw"></i><?= $this->session->userdata('username') ?><i class="fa fa-caret-down"></i>
								</a>
								<ul class="dropdown-menu dropdown-user">

									<li><a href="#"><i class="fa fa-user fa-fw"></i> <?= $this->session->userdata('username') ?></a>
									</li>

									<li class="divider"></li>
									<li><a href=""></i> Cerrar Session</a>
									</li>
								</ul>
								<!-- /.dropdown-user -->
							</li>
						</ul>
					</div>
					<!-- #Nav Ends -->
				</div>
			</div>

		</div>
	</div>
	<!-- #Header Starts -->
	<!-- works -->
	<div id="works"  class=" clearfix grid">
		<figure class="effect-oscar  wowload fadeIn">
			<img src="<?= base_url() ?>assets/master/images/portfolio/1.jpg" alt="img01"/>
			<figcaption>
				<h2>Nature</h2>
				<p>Lily likes to play with crayons and pencils<br>
					<a href="<?= base_url() ?>assets/master/images/portfolio/1.jpg" title="1" data-gallery>View more</a></p>
				</figcaption>
			</figure>
			<figure class="effect-oscar  wowload fadeInUp">
				<img src="<?= base_url() ?>assets/master/images/portfolio/2.jpg" alt="img01"/>
				<figcaption>
					<h2>Events</h2>
					<p>Lily likes to play with crayons and pencils<br>
						<a href="<?= base_url() ?>assets/master/images/portfolio/2.jpg" title="1" data-gallery>View more</a></p>
					</figcaption>
				</figure>
				<figure class="effect-oscar  wowload fadeInUp">
					<img src="<?= base_url() ?>assets/master/images/portfolio/3.jpg" alt="img01"/>
					<figcaption>
						<h2>music</h2>
						<p>Lily likes to play with crayons and pencils<br>
							<a href="<?= base_url() ?>assets/master/images/portfolio/3.jpg" title="1" data-gallery>View more</a></p>
						</figcaption>
					</figure>
					<figure class="effect-oscar  wowload fadeInUp">
						<img src="<?= base_url() ?>assets/master/images/portfolio/4.jpg" alt="img01"/>
						<figcaption>
							<h2>Vintage</h2>
							<p>Lily likes to play with crayons and pencils<br>
								<a href="<?= base_url() ?>assets/master/images/portfolio/4.jpg" title="1" data-gallery>View more</a></p>
							</figcaption>
						</figure>
						<figure class="effect-oscar  wowload fadeInUp">
							<img src="<?= base_url() ?>assets/master/images/portfolio/5.jpg" alt="img01"/>
							<figcaption>
								<h2>Typers</h2>
								<p>Lily likes to play with crayons and pencils<br>
									<a href="<?= base_url() ?>assets/master/images/portfolio/5.jpg" title="1" data-gallery>View more</a></p>
								</figcaption>
							</figure>

							<figure class="effect-oscar  wowload fadeInUp">
								<img src="<?= base_url() ?>assets/master/images/portfolio/6.jpg" alt="img01"/>
								<figcaption>
									<h2>hotel</h2>
									<p>Lily likes to play with crayons and pencils<br>
										<a href="<?= base_url() ?>assets/master/images/portfolio/6.jpg" title="1" data-gallery>View more</a></p>
									</figcaption>
								</figure>
								<figure class="effect-oscar  wowload fadeInUp">
									<img src="<?= base_url() ?>assets/master/images/portfolio/7.jpg" alt="img01"/>
									<figcaption>
										<h2>Chinese</h2>
										<p>Lily likes to play with crayons and pencils<br>
											<a href="<?= base_url() ?>assets/master/images/portfolio/7.jpg" title="1" data-gallery>View more</a></p>
										</figcaption>
									</figure>
									<figure class="effect-oscar  wowload fadeInUp">
										<img src="<?= base_url() ?>assets/master/images/portfolio/8.jpg" alt="img01"/>
										<figcaption>
											<h2>Dicrap</h2>
											<p>Lily likes to play with crayons and pencils<br>
												<a href="<?= base_url() ?>assets/master/images/portfolio/8.jpg" title="1" data-gallery>View more</a></p>
											</figcaption>
										</figure>
										<figure class="effect-oscar  wowload fadeInUp">
											<img src="<?= base_url() ?>assets/master/images/portfolio/9.jpg" alt="img01"/>
											<figcaption>
												<h2>Coffee</h2>
												<p>Lily likes to play with crayons and pencils<br>
													<a href="<?= base_url() ?>assets/master/images/portfolio/9.jpg" title="1" data-gallery>View more</a></p>
												</figcaption>
											</figure>
											<figure class="effect-oscar  wowload fadeInUp">
												<img src="<?= base_url() ?>assets/master/images/portfolio/10.jpg" alt="img01"/>
												<figcaption>
													<h2>cameras</h2>
													<p>Lily likes to play with crayons and pencils<br>
														<a href="<?= base_url() ?>assets/master/images/portfolio/10.jpg" title="1" data-gallery>View more</a></p>
													</figcaption>
												</figure>
												<figure class="effect-oscar  wowload fadeInUp">
													<img src="<?= base_url() ?>assets/master/images/portfolio/11.jpg" alt="img01"/>
													<figcaption>
														<h2>design</h2>
														<p>Lily likes to play with crayons and pencils<br>
															<a href="<?= base_url() ?>assets/master/images/portfolio/11.jpg" title="1" data-gallery>View more</a></p>
														</figcaption>
													</figure>
													<figure class="effect-oscar  wowload fadeInUp">
														<img src="<?= base_url() ?>assets/master/images/portfolio/12.jpg" alt="img01"/>
														<figcaption>
															<h2>studio</h2>
															<p>Lily likes to play with crayons and pencils<br>
																<a href="<?= base_url() ?>assets/master/images/portfolio/12.jpg" title="1" data-gallery>View more</a></p>
															</figcaption>
														</figure>
													</div>
													<!-- works -->
													<!-- jquery -->
													<script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
													<!-- wow script -->
													<script src="<?=base_url() ?>assets/master/wow/wow.min.js"></script>
													<!-- boostrap -->
													<script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
													<!-- jquery mobile -->
													<script src="<?= base_url() ?>assets/master/mobile/touchSwipe.min.js"></script>
													<script src="<?= base_url() ?>assets/master/respond/respond.js"></script>
													<!-- gallery -->
													<script src="<?= base_url() ?>assets/master/gallery/jquery.blueimp-gallery.min.js"></script>
													<!-- custom script -->
													<script src="<?= base_url() ?>assets/master/script.js"></script>
												</body>
												</html>
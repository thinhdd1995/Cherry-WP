<!DOCTYPE html>
<html <?php language_attributes(); ?> />
<head>
	<meta charset="<?php bloginfo(charset); ?>" />
	<link rel="profile" href="http://gmgp.org/xfn/11" />
	<link href="https://fonts.googleapis.com/css?family=Droid+Serif|Kaushan+Script" rel="stylesheet">
	<link rel="pingback"  href="<?php bloginfo('pingback_url'); ?>" />
	<script src="https://use.fontawesome.com/b72421ded4.js"></script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >	
	
			<header id="header" class="<?php if ( get_option( 'show_on_front' ) == 'page' && is_front_page() ): echo 'header-front-page';
						else: echo 'header-blog'; endif; ?>" style="<?php echo $style ?>">
						<div class="top-header">
							<div class="container-fluid">
								<div class="row" style="background: #222222;">
									<div class="container">
										<div class="col-sm-4 col-xs-8">
											<h3>Cherry</h3>
										</div><!--/.col-sm-2-->
										<div class="col-sm-8 col-xs-4">
											<nav class="header-navigation">
											<?php
												wp_nav_menu( array(
													'theme_location'  => 'primary-menu',
													'menu'            => 'nav',
													'container_class'       => 'navbar-right',
													'menu_class'      => 'clearfix',
													'menu_id'         => '',
												) );
											?>
											</nav>
										</div><!--/.col-sm-10-->
									</div>
								</div><!--/.row-->
							</div><!--/.container-->
						</div><!--/.top-header-->

			</header><!--/#header-->
			<div class="logo text-center">
				<?php ducthinh_logo(); ?>
			</div>
<div id="container">
		
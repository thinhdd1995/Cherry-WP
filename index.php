<?php get_header(); ?>
<div class="logo text-center">
	<?php ducthinh_logo_homepage(); ?>
</div>
<div id="container">
	<div class="container">
		<div class="content">
			<div id="main-content" class="col-md-8">	
					<div class="row">
						<?php if ( have_posts() ) :while( have_posts() ): the_post(); ?>
							<?php get_template_part('content', get_post_format()); ?>
						<?php endwhile ?>
						<?php ducthinh_pagination(); ?>
						<?php else: ?>
							<?php get_template_part('content','none'); ?>
						<?php endif; ?>
					</div>
			</div>			
			<div id="sidebar" class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div><!-- end #container -->
<?php get_footer(); ?>
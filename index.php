<?php get_header(); ?>
<div class="content">
	<div id="main-content" class="col-md-8">
		<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
			<?php get_template_part('content',get_post_format()); ?>
		<?php endwhile ?>
		<?php else: ?>
			<?php get_template_part('content','none'); ?>
		<?php endif; ?>
	</div>			
	<div id="sidebar" class="col-md-4">
		<?php get_sidebar(); ?>
	</div>
</div>
</div><!-- end #container -->
<?php get_footer(); ?>
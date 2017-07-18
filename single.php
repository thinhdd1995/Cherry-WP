<?php get_header(); ?>
<div id="container">
<div class="content">
	<div class="entry-title-single">
		<?php ducthinh_entry_header(); ?>
		<?php ducthinh_entry_meta();   ?>
	</div>
	<div id="main-content-single" class="col-md-8">
		<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
			<?php postview_set(get_the_ID()); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
				<div class="entry-content-single">
					<?php ducthinh_entry_content(); ?>
					<?php (is_single()  ? ducthinh_entry_tag() : ''); ?>
				</div>
			</article>
			
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
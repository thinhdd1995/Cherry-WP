<article id="post-<?php the_ID(); ?>" <?php post_class("col-md-6"); ?> >
	<div class="entry-content">
		<?php the_content(); ?>
		<?php (is_single()  ? ducthinh_entry_tag() : ''); ?>
	</div>
	<div class="entry-header">
		<?php ducthinh_entry_header(); ?>
		<?php ducthinh_entry_meta(); ?>
	</div>
</article>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<div class="entry-thumbnail">
		<?php ducthinh_thumbnail('medium_large') ?>
	</div>
	<div class="entry-header">
		<?php ducthinh_entry_header(); ?>
		<?php
			$attachment = get_children( array('post_parent' => $post->ID ) );
			$attachment_number = count($attachment);
			printf( __('This image post contains %1$s photos', 'ducthinh'), $attachment_number);
		?>
	</div>
	<div class="entry-content">
		<?php ducthinh_entry_content(); ?>
		<?php (is_single()  ? ducthinh_entry_tag() : ''); ?>
	</div>
</article>
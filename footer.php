<div id="pre-footer" class="text-center">
	<div class="logo-footer">
		
		<img src="<?php echo get_theme_mod( 'img-upload' ); ?>">
		<h5><?php bloginfo('sitename'); ?> RESTAURANT</h5>	
	</div>
	<p><?php echo get_theme_mod( 'Texts' ); ?></p>

	<div class="more-info">
		<a href=""><i class="fa fa-bookmark-o" aria-hidden="true"></i> Terms of Use</a>
		<a href=""><i class="fa fa-question" aria-hidden="true"></i> FAQs</a>
		<a href=""><i class="fa fa-asterisk" aria-hidden="true"></i> Privacy Policy</a>
	</div>
</div>

<footer id="footer" class="text-center">
	<div class="social-contact text-center">
		<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
		<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
		<a href="#"><i class="fa fa-glide-g" aria-hidden="true"></i></a>
		<a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>		
	</div>
	<div class="copyright ">
		<?php echo date('Y'); ?> <span><?php bloginfo('sitename'); ?></span>. Designed with <?php echo '<i class="fa fa-heart-o" aria-hidden="true"></i>'; ?> by Duc Thinh
	</div>
</footer>  
<?php wp_footer(); ?>
</body>
</html>
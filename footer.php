<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Stock
 */
$social_links = cs_get_option('social_links');
$body_end_scripts = cs_get_option('body_end_scripts');
$footer_copyright_text = cs_get_option('footer_copyright_text');
?>

	

	<footer id="colophon" class="site-footer">
		<div class="container">
		<?php if(is_active_sidebar('stock_footer')):?>
			<div class="row">
				<?php dynamic_sidebar('stock_footer'); ?>
			</div>
		<?php endif; ?>
			<div class="row">
				<div class="col-lg-12">
					<div class="stock-footer-bottom">
						<div class="row">
							<div class="col-lg-4">
								<?php if(!empty($footer_copyright_text)){ echo $footer_copyright_text; }else{echo esc_html_e('Copyright@2017-Crazycafe All right reserved','stock-crazycafe');} ?>
							</div>
							<div class="col-lg-4">
								<?php
									wp_nav_menu( array(
									'theme_location' => 'footer',
									) );
									?>
							</div>
							<div class="col-lg-4">
								<?php if(!empty($social_links)):?>
								<div class="social-icons">
									<?php foreach($social_links as $links):?>
									<a href="<?php echo $links['link']; ?>" target="_blank"><i class="<?php echo $links['icon']; ?>"></i></a>
								<?php endforeach; ?>
									
								</div>
								<?php endif;?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php echo ($body_end_scripts); wp_footer(); ?>

</body>
</html>

<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blankcanvas
 */

?>

	<footer 
		class="site-footer text-center p-4 position-relative z-index-20"
		style="background-image: url(<?= wp_upload_dir()['baseurl'] . '/revslider/christmas-landing-page-11/mountains.png' ?>)"
		>
		<!-- <div class="site-info">

			<?php
			printf(esc_html__('@ %s Blank Canvas. All Rights Reserved.', 'blankcanvas' ), date('Y')); ?>

		</div> -->
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>

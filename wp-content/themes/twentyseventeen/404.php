<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<section class="errorPageSec">	
			<div class="container">
				<div class="errorPageMiddle d-flex flex-wrap w-100 justify-content-centere">
					<div class="errorImg w-100">
						<img src="<?php echo get_template_directory_uri(); ?>/images/error_404.png" alt="error_404" title="Not Found 404">
					</div>
					<div class="errorText w-100"><p>Looks like you’re lost</p></div>
					<div class="comingSoonBtn w-100">
						<a href="<?php echo home_url(); ?>" class="btn btn-outline-gradient bigBtn" title="Back Home">Back Home</a>
					</div>
				</div>
			</div>
		</section>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();

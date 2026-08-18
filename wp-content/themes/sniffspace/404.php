<?php
/**
 * The template for displaying 404 pages.
 *
 * @package sniffspace
 */

get_header();

$sniffspace_home_url = sniffspace_get_main_website_home_url();
?>

	<main id="primary" class="ss-not-found-main">
		<section class="ss-not-found-container" aria-labelledby="ss-not-found-title">
			<div class="ss-not-found-card">
				<p class="ss-not-found-code"><?php esc_html_e( '404', 'sniffspace' ); ?></p>
				<h1 id="ss-not-found-title"><?php esc_html_e( "We couldn't find that page", 'sniffspace' ); ?></h1>
				<p class="ss-not-found-copy"><?php esc_html_e( "The link may be out of date, or the page may have moved. It's not you - it's us.", 'sniffspace' ); ?></p>

				<div class="ss-not-found-actions">
					<a class="ss-not-found-primary" href="<?php echo esc_url( $sniffspace_home_url ); ?>" title="<?php esc_attr_e( 'Back to Home', 'sniffspace' ); ?>">
						<?php esc_html_e( 'Back to Home', 'sniffspace' ); ?>
					</a>
					<a class="ss-not-found-secondary" href="<?php echo esc_url( trailingslashit( $sniffspace_home_url ) . 'find-a-space' ); ?>" title="<?php esc_attr_e( 'Find a Space', 'sniffspace' ); ?>">
						<?php esc_html_e( 'Find a Space', 'sniffspace' ); ?>
					</a>
				</div>

				<div class="ss-not-found-links" aria-label="<?php esc_attr_e( 'Helpful links', 'sniffspace' ); ?>">
					<p><?php esc_html_e( 'Looking for something in particular?', 'sniffspace' ); ?></p>
					<nav>
						<a href="<?php echo esc_url( trailingslashit( $sniffspace_home_url ) . 'find-a-space' ); ?>" title="<?php esc_attr_e( 'Find a Space', 'sniffspace' ); ?>"><?php esc_html_e( 'Find a Space', 'sniffspace' ); ?></a>
						<a href="<?php echo esc_url( trailingslashit( $sniffspace_home_url ) . 'my-account' ); ?>" title="<?php esc_attr_e( 'My Account', 'sniffspace' ); ?>"><?php esc_html_e( 'My Account', 'sniffspace' ); ?></a>
						<a href="<?php echo esc_url( trailingslashit( $sniffspace_home_url ) . 'support' ); ?>" title="<?php esc_attr_e( 'Support', 'sniffspace' ); ?>"><?php esc_html_e( 'Support', 'sniffspace' ); ?></a>
					</nav>
				</div>
			</div>
		</section>
	</main>

<?php
get_footer();

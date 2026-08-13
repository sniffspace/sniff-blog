<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sniffspace
 */

?>
<?php
$sniffspace_home_url   = sniffspace_get_main_website_home_url();
$sniffspace_asset_url  = get_template_directory_uri() . '/assets/images/';
?>

	<footer id="colophon" class="ss-site-footer">
		<div class="ss-footer-main">
			<div class="ss-footer-inner">
				<div class="ss-footer-brand">
					<a class="ss-footer-logo" href="<?php echo esc_url( $sniffspace_home_url ); ?>" aria-label="<?php esc_attr_e( 'Sniffspace home', 'sniffspace' ); ?>" title="<?php esc_attr_e( 'Sniffspace home', 'sniffspace' ); ?>">
						<?php echo sniffspace_get_site_logo_image( 'ss-footer-logo-img', 94, 50 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</a>
					<p><?php esc_html_e( 'Download the Sniffspace App', 'sniffspace' ); ?></p>
					<div class="ss-store-row">
						<a class="ss-store-button ss-store-google" href="https://play.google.com/store/search?q=sniffspace&amp;c=apps&amp;hl=en-IN" aria-label="<?php esc_attr_e( 'Get it on Google Play', 'sniffspace' ); ?>" title="<?php esc_attr_e( 'Get it on Google Play', 'sniffspace' ); ?>">
							<svg aria-hidden="true" viewBox="0 0 24 24" focusable="false">
								<path fill="#34a853" d="M3.6 2.8c-.2.2-.3.6-.3 1v16.4c0 .4.1.7.3 1l8.9-9.2-8.9-9.2Z"/>
								<path fill="#4285f4" d="m14.9 9.5-2.4 2.5 2.4 2.5 3.2-1.9c1.1-.6 1.1-1.6 0-2.2l-3.2-1.9Z"/>
								<path fill="#fbbc04" d="m3.6 2.8 8.9 9.2 2.4-2.5L5.9 4.3c-.8-.5-1.6-1-2.3-1.5Z"/>
								<path fill="#ea4335" d="m3.6 21.2 2.3-1.5 9-5.2-2.4-2.5-8.9 9.2Z"/>
							</svg>
							<span>
								<small><?php esc_html_e( 'GET IT ON', 'sniffspace' ); ?></small>
								<strong><?php esc_html_e( 'Google Play', 'sniffspace' ); ?></strong>
							</span>
						</a>
						<a class="ss-store-button ss-store-apple" href="https://apps.apple.com/app/sniffspace/id6467835662" aria-label="<?php esc_attr_e( 'Download on the App Store', 'sniffspace' ); ?>" title="<?php esc_attr_e( 'Download on the App Store', 'sniffspace' ); ?>">
							<svg aria-hidden="true" viewBox="0 0 24 24" focusable="false">
								<path fill="currentColor" d="M16.8 12.6c0-2 1.6-3 1.7-3.1-.9-1.4-2.4-1.6-2.9-1.6-1.2-.1-2.4.7-3 0-.6-.6-1.6-.7-2.6-.7-1.3 0-2.5.8-3.2 1.9-1.4 2.4-.4 6 1 8 .7 1 1.5 2.1 2.6 2.1 1 0 1.4-.7 2.7-.7 1.2 0 1.6.7 2.7.7s1.8-1 2.5-2c.8-1.1 1.1-2.3 1.1-2.4 0 0-2.6-1-2.6-4.2ZM14.8 6.6c.6-.7 1-1.7.9-2.6-.9 0-1.9.6-2.5 1.3-.6.6-1 1.6-.9 2.5 1 0 1.9-.5 2.5-1.2Z"/>
							</svg>
							<span>
								<small><?php esc_html_e( 'Download on the', 'sniffspace' ); ?></small>
								<strong><?php esc_html_e( 'App Store', 'sniffspace' ); ?></strong>
							</span>
						</a>
					</div>
				</div>

				<div class="ss-footer-links" aria-label="<?php esc_attr_e( 'Footer navigation', 'sniffspace' ); ?>">
					<?php if ( has_nav_menu( 'footer-sniffspace-menu' ) ) : ?>
						<div class="ss-footer-column">
							<h2><?php esc_html_e( 'Sniffspace', 'sniffspace' ); ?></h2>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'footer-sniffspace-menu',
									'container'      => false,
									'menu_class'     => 'ss-footer-menu',
									'depth'          => 1,
									'fallback_cb'    => false,
								)
							);
							?>
						</div>
					<?php endif; ?>

					<?php if ( has_nav_menu( 'footer-guest-menu' ) || has_nav_menu( 'footer-host-menu' ) ) : ?>
						<div class="ss-footer-column ss-footer-guest-host-column">
							<?php if ( has_nav_menu( 'footer-guest-menu' ) ) : ?>
								<div class="ss-footer-menu-group">
									<h2><?php esc_html_e( 'Guest', 'sniffspace' ); ?></h2>
									<?php
									wp_nav_menu(
										array(
											'theme_location' => 'footer-guest-menu',
											'container'      => false,
											'menu_class'     => 'ss-footer-menu',
											'depth'          => 1,
											'fallback_cb'    => false,
										)
									);
									?>
								</div>
							<?php endif; ?>

							<?php if ( has_nav_menu( 'footer-host-menu' ) ) : ?>
								<div class="ss-footer-menu-group">
									<h2><?php esc_html_e( 'Host', 'sniffspace' ); ?></h2>
									<?php
									wp_nav_menu(
										array(
											'theme_location' => 'footer-host-menu',
											'container'      => false,
											'menu_class'     => 'ss-footer-menu',
											'depth'          => 1,
											'fallback_cb'    => false,
										)
									);
									?>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ( has_nav_menu( 'footer-support-menu' ) ) : ?>
						<div class="ss-footer-column">
							<h2><?php esc_html_e( 'Support', 'sniffspace' ); ?></h2>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'footer-support-menu',
									'container'      => false,
									'menu_class'     => 'ss-footer-menu',
									'depth'          => 1,
									'fallback_cb'    => false,
								)
							);
							?>
						</div>
					<?php endif; ?>

					<?php if ( has_nav_menu( 'footer-popular-locations-menu' ) ) : ?>
						<div class="ss-footer-column">
							<h2><?php esc_html_e( 'Popular Locations', 'sniffspace' ); ?></h2>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'footer-popular-locations-menu',
									'container'      => false,
									'menu_class'     => 'ss-footer-menu ss-footer-popular-locations-menu',
									'depth'          => 1,
									'fallback_cb'    => false,
								)
							);
							?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<div class="ss-footer-bottom">
			<div class="ss-footer-bottom-inner">
				<div class="ss-footer-legal">
					<span>&copy; <?php echo esc_html__( 'Sniffspace Australia 2026', 'sniffspace' ); ?></span>
					<?php
					if ( has_nav_menu( 'footer-legal-menu' ) ) :
						wp_nav_menu(
							array(
								'theme_location' => 'footer-legal-menu',
								'container'      => false,
								'menu_class'     => 'ss-footer-legal-menu',
								'depth'          => 1,
								'fallback_cb'    => false,
							)
						);
					endif;
					?>
				</div>

				<?php
				$sniffspace_social_items = sniffspace_get_menu_items_by_location( 'footer-social-menu' );
				if ( ! empty( $sniffspace_social_items ) ) :
					?>
					<div class="ss-social-row">
						<?php
						foreach ( $sniffspace_social_items as $sniffspace_social_item ) :
							$sniffspace_social_key = strtolower( preg_replace( '/[^a-z0-9]+/i', '-', $sniffspace_social_item->title ) );
							$sniffspace_social_icon = '';

							switch ( trim( $sniffspace_social_key, '-' ) ) {
								case 'facebook':
									$sniffspace_social_icon = 'footer-facebook.png';
									break;
								case 'instagram':
									$sniffspace_social_icon = 'footer-instagram.png';
									break;
								case 'tiktok':
								case 'tik-tok':
									$sniffspace_social_icon = 'tiktok-white-icon.svg';
									break;
								case 'youtube':
								case 'you-tube':
									$sniffspace_social_icon = 'footer-youtube.png';
									break;
							}

							if ( empty( $sniffspace_social_icon ) ) {
								continue;
							}
							?>
							<a href="<?php echo esc_url( $sniffspace_social_item->url ); ?>" aria-label="<?php echo esc_attr( $sniffspace_social_item->title ); ?>" title="<?php echo esc_attr( $sniffspace_social_item->title ); ?>">
								<img src="<?php echo esc_url( $sniffspace_asset_url . $sniffspace_social_icon ); ?>" width="18" height="18" alt="">
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</footer>
	<button class="ss-back-to-top" type="button" aria-label="<?php esc_attr_e( 'Back to Top', 'sniffspace' ); ?>" title="<?php esc_attr_e( 'Back to Top', 'sniffspace' ); ?>">
		<span aria-hidden="true"></span>
	</button>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

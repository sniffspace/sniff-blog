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
							<svg fill="currentColor" width="32px" height="32px" viewBox="-1 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m3.751.61 13.124 7.546-2.813 2.813zm-2.719-.61 12.047 12-12.046 12c-.613-.271-1.033-.874-1.033-1.575 0-.023 0-.046.001-.068v.003-20.719c-.001-.019-.001-.042-.001-.065 0-.701.42-1.304 1.022-1.571l.011-.004zm19.922 10.594c.414.307.679.795.679 1.344 0 .022 0 .043-.001.065v-.003c.004.043.007.094.007.145 0 .516-.25.974-.636 1.258l-.004.003-2.813 1.593-3.046-2.999 3.047-3.047zm-17.203 12.796 10.312-10.359 2.813 2.813z"/></svg>
							<span>
								<small><?php esc_html_e( 'GET IT ON', 'sniffspace' ); ?></small>
								<strong><?php esc_html_e( 'Google Play', 'sniffspace' ); ?></strong>
							</span>
						</a>
						<a class="ss-store-button ss-store-apple" href="https://apps.apple.com/app/sniffspace/id6467835662" aria-label="<?php esc_attr_e( 'Download on the App Store', 'sniffspace' ); ?>" title="<?php esc_attr_e( 'Download on the App Store', 'sniffspace' ); ?>">
							<svg fill="currentColor" width="32px" height="32px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.564 13.862c-.413.916-.612 1.325-1.144 2.135-.742 1.13-1.79 2.538-3.087 2.55-1.152.01-1.448-.75-3.013-.741-1.564.008-1.89.755-3.043.744-1.297-.012-2.29-1.283-3.033-2.414-2.077-3.16-2.294-6.87-1.013-8.843.91-1.401 2.347-2.221 3.697-2.221 1.375 0 2.24.754 3.376.754 1.103 0 1.775-.756 3.365-.756 1.2 0 2.474.655 3.381 1.785-2.972 1.629-2.49 5.873.514 7.007zM12.463 3.808c.577-.742 1.016-1.788.857-2.858-.944.065-2.047.665-2.692 1.448-.584.71-1.067 1.763-.88 2.787 1.03.031 2.096-.584 2.715-1.377z"/></svg>
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

<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sniffspace
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php
$sniffspace_home_url   = sniffspace_get_main_website_home_url();
$sniffspace_mobile_items = sniffspace_get_menu_items_by_location( 'mobile-side-menu' );
$sniffspace_mobile_parents = array();
$sniffspace_mobile_children = array();

foreach ( $sniffspace_mobile_items as $sniffspace_mobile_item ) {
	if ( 0 === (int) $sniffspace_mobile_item->menu_item_parent ) {
		$sniffspace_mobile_parents[] = $sniffspace_mobile_item;
		continue;
	}

	$sniffspace_mobile_children[ (int) $sniffspace_mobile_item->menu_item_parent ][] = $sniffspace_mobile_item;
}

$sniffspace_has_mobile_menu = ! empty( $sniffspace_mobile_parents );
?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'sniffspace' ); ?></a>

	<header id="masthead" class="ss-site-header">
		<?php if ( $sniffspace_has_mobile_menu ) : ?>
			<div class="ss-mobile-header" aria-label="<?php esc_attr_e( 'Mobile site header', 'sniffspace' ); ?>">
				<button class="ss-menu-trigger" type="button" aria-controls="ss-mobile-drawer" aria-expanded="false" title="<?php esc_attr_e( 'Open menu', 'sniffspace' ); ?>">
					<span class="screen-reader-text"><?php esc_html_e( 'Open menu', 'sniffspace' ); ?></span>
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
				</button>
				<?php if ( is_home() || is_archive() || is_search() || is_singular( 'post' ) ) : ?>
					<button class="ss-blog-sidebar-toggle" type="button" data-blog-sidebar-open aria-controls="ss-blog-sidebar" aria-expanded="false" title="<?php esc_attr_e( 'Open blog sidebar', 'sniffspace' ); ?>" aria-label="<?php esc_attr_e( 'Open blog sidebar', 'sniffspace' ); ?>">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" color="#070707" aria-hidden="true" focusable="false"><path fill="#363735" d="M6 9.844V3.75a.75.75 0 1 0-1.5 0v6.094a3 3 0 0 0 0 5.812v4.594a.75.75 0 1 0 1.5 0v-4.594a3 3 0 0 0 0-5.812m-.75 4.406a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m7.5-8.906V3.75a.75.75 0 1 0-1.5 0v1.594a3 3 0 0 0 0 5.812v9.094a.75.75 0 1 0 1.5 0v-9.094a3 3 0 0 0 0-5.812M12 9.75a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m9.75 6a3.005 3.005 0 0 0-2.25-2.906V3.75a.75.75 0 1 0-1.5 0v9.094a3 3 0 0 0 0 5.812v1.594a.75.75 0 1 0 1.5 0v-1.594a3.005 3.005 0 0 0 2.25-2.906m-3 1.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"></path></svg>
					</button>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="ss-header-frame">
			<div class="ss-header-pill">
				<a class="ss-brand" href="<?php echo esc_url( $sniffspace_home_url ); ?>" aria-label="<?php esc_attr_e( 'Sniffspace home', 'sniffspace' ); ?>" title="<?php esc_attr_e( 'Sniffspace home', 'sniffspace' ); ?>">
					<?php echo sniffspace_get_site_logo_image( 'ss-brand-logo', 92, 52 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</a>

				<?php
				if ( has_nav_menu( 'header-menu' ) ) :
					wp_nav_menu(
						array(
							'theme_location' => 'header-menu',
							'container'      => 'nav',
							'container_class'      => 'ss-desktop-nav',
							'container_aria_label' => esc_attr__( 'Primary navigation', 'sniffspace' ),
							'menu_class'     => 'ss-desktop-menu',
							'depth'          => 1,
							'fallback_cb'    => false,
						)
					);
				endif;
				?>

				<div class="ss-header-actions">
					<a class="ss-login-button" href="#" title="<?php esc_attr_e( 'Log In', 'sniffspace' ); ?>"><?php esc_html_e( 'Log In', 'sniffspace' ); ?></a>
					<a class="ss-signup-button" href="#" title="<?php esc_attr_e( 'Sign Up', 'sniffspace' ); ?>"><?php esc_html_e( 'Sign Up', 'sniffspace' ); ?></a>
				</div>
			</div>
		</div>
	</header>

	<?php if ( $sniffspace_has_mobile_menu ) : ?>
		<div class="ss-drawer-overlay" data-ss-drawer-close hidden></div>
		<aside id="ss-mobile-drawer" class="ss-mobile-drawer" aria-label="<?php esc_attr_e( 'Mobile navigation', 'sniffspace' ); ?>" aria-hidden="true">
		<div class="ss-drawer-header">
			<a href="<?php echo esc_url( $sniffspace_home_url ); ?>" aria-label="<?php esc_attr_e( 'Sniffspace home', 'sniffspace' ); ?>" title="<?php esc_attr_e( 'Sniffspace home', 'sniffspace' ); ?>">
				<?php echo sniffspace_get_site_logo_image( 'ss-mobile-brand-logo', 74, 40 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</a>
			<button class="ss-drawer-close" type="button" data-ss-drawer-close aria-label="<?php esc_attr_e( 'Close menu', 'sniffspace' ); ?>" title="<?php esc_attr_e( 'Close menu', 'sniffspace' ); ?>">&times;</button>
		</div>

		<div class="ss-drawer-auth">
			<a class="ss-drawer-login" href="#" title="<?php esc_attr_e( 'Log In', 'sniffspace' ); ?>"><?php esc_html_e( 'Log In', 'sniffspace' ); ?></a>
			<a class="ss-drawer-signup" href="#" title="<?php esc_attr_e( 'Sign Up', 'sniffspace' ); ?>"><?php esc_html_e( 'Sign Up', 'sniffspace' ); ?></a>
		</div>

		<nav class="ss-drawer-nav" aria-label="<?php esc_attr_e( 'Mobile menu links', 'sniffspace' ); ?>">
			<?php
			$sniffspace_first_panel_opened = false;
			foreach ( $sniffspace_mobile_parents as $sniffspace_mobile_parent ) :
				$sniffspace_parent_id = (int) $sniffspace_mobile_parent->ID;
				$sniffspace_children  = isset( $sniffspace_mobile_children[ $sniffspace_parent_id ] ) ? $sniffspace_mobile_children[ $sniffspace_parent_id ] : array();
				$sniffspace_is_open   = ! $sniffspace_first_panel_opened && ! empty( $sniffspace_children );

				if ( $sniffspace_is_open ) {
					$sniffspace_first_panel_opened = true;
				}

				if ( empty( $sniffspace_children ) ) :
					?>
					<a class="ss-drawer-home" href="<?php echo esc_url( $sniffspace_mobile_parent->url ); ?>" title="<?php echo esc_attr( $sniffspace_mobile_parent->title ); ?>"><?php echo esc_html( $sniffspace_mobile_parent->title ); ?></a>
					<?php
					continue;
				endif;
				?>
				<section class="ss-drawer-section">
					<button class="ss-drawer-section-toggle" type="button" aria-expanded="<?php echo $sniffspace_is_open ? 'true' : 'false'; ?>" aria-controls="ss-drawer-section-<?php echo esc_attr( (string) $sniffspace_parent_id ); ?>" title="<?php echo esc_attr( $sniffspace_mobile_parent->title ); ?>">
						<span><?php echo esc_html( $sniffspace_mobile_parent->title ); ?></span>
						<span class="ss-drawer-section-icon" aria-hidden="true"><?php echo $sniffspace_is_open ? '-' : '+'; ?></span>
					</button>
					<div id="ss-drawer-section-<?php echo esc_attr( (string) $sniffspace_parent_id ); ?>" class="ss-drawer-section-panel<?php echo $sniffspace_is_open ? ' is-open' : ''; ?>">
						<?php foreach ( $sniffspace_children as $sniffspace_child ) : ?>
							<a href="<?php echo esc_url( $sniffspace_child->url ); ?>" title="<?php echo esc_attr( $sniffspace_child->title ); ?>"><?php echo esc_html( $sniffspace_child->title ); ?></a>
						<?php endforeach; ?>
					</div>
				</section>
			<?php endforeach; ?>
		</nav>
		</aside>
	<?php endif; ?>

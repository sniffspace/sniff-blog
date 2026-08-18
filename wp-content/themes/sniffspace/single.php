<?php
/**
 * The template for displaying single blog posts.
 *
 * @package sniffspace
 */

get_header();

$sniffspace_blog_page_id    = (int) get_option( 'page_for_posts' );
$sniffspace_blog_title      = $sniffspace_blog_page_id ? get_the_title( $sniffspace_blog_page_id ) : __( 'Blog', 'sniffspace' );
$sniffspace_blog_url        = $sniffspace_blog_page_id ? get_permalink( $sniffspace_blog_page_id ) : home_url( '/blog/' );
$sniffspace_no_image_url    = get_template_directory_uri() . '/assets/images/no-image.png';
$sniffspace_post_categories = get_the_category();
$sniffspace_post_category   = ! empty( $sniffspace_post_categories ) ? $sniffspace_post_categories[0] : null;
?>

	<main id="primary" class="ss-blog-main ss-single-main">
		<?php
		while ( have_posts() ) :
			the_post();

			$sniffspace_thumb_id  = has_post_thumbnail() ? get_post_thumbnail_id() : 0;
			$sniffspace_thumb_alt = $sniffspace_thumb_id ? get_post_meta( $sniffspace_thumb_id, '_wp_attachment_image_alt', true ) : '';

			if ( ! $sniffspace_thumb_alt ) {
				$sniffspace_thumb_alt = get_the_title();
			}
			?>

			<section class="ss-blog-hero ss-single-hero" aria-labelledby="ss-single-title">
				<div class="ss-blog-container">
					<h1 id="ss-single-title"><?php the_title(); ?></h1>
					<nav class="ss-blog-breadcrumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'sniffspace' ); ?>">
						<a href="<?php echo esc_url( sniffspace_get_main_website_home_url() ); ?>" title="<?php esc_attr_e( 'Home', 'sniffspace' ); ?>">
							<?php esc_html_e( 'Home', 'sniffspace' ); ?>
						</a>
						<span aria-hidden="true">/</span>
						<a href="<?php echo esc_url( $sniffspace_blog_url ); ?>" title="<?php echo esc_attr( $sniffspace_blog_title ); ?>">
							<?php echo esc_html( $sniffspace_blog_title ); ?>
						</a>
						<span aria-hidden="true">/</span>
						<span aria-current="page"><?php the_title(); ?></span>
					</nav>
				</div>
			</section>

			<div class="ss-blog-container ss-blog-layout ss-single-layout">
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'ss-single-article' ); ?>>
					<figure class="ss-single-featured">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php
							echo wp_get_attachment_image(
								$sniffspace_thumb_id,
								'large',
								false,
								array(
									'class'   => 'ss-single-featured-image',
									'loading' => 'eager',
									'sizes'   => '(max-width: 767px) 100vw, (max-width: 1180px) 66vw, 920px',
									'alt'     => $sniffspace_thumb_alt,
									'title'   => get_the_title(),
								)
							);
							?>
						<?php else : ?>
							<img class="ss-single-featured-image ss-single-no-image" src="<?php echo esc_url( $sniffspace_no_image_url ); ?>" alt="<?php echo esc_attr( sprintf( __( 'No image available for %s', 'sniffspace' ), get_the_title() ) ); ?>" title="<?php the_title_attribute(); ?>" loading="eager">
						<?php endif; ?>
					</figure>
					
					<div class="ss-single-meta">
						<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
							<svg aria-hidden="true" viewBox="0 0 24 24" focusable="false"><path d="M7 2a1 1 0 0 1 1 1v1h8V3a1 1 0 1 1 2 0v1h1a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h1V3a1 1 0 0 1 1-1Zm13 8H4v9a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-9ZM5 6a1 1 0 0 0-1 1v1h16V7a1 1 0 0 0-1-1H5Z"/></svg>
							<?php echo esc_html( get_the_date() ); ?>
						</time>

						<?php if ( $sniffspace_post_category ) : ?>
							<a href="<?php echo esc_url( get_category_link( $sniffspace_post_category ) ); ?>" title="<?php echo esc_attr( $sniffspace_post_category->name ); ?>">
								<svg aria-hidden="true" viewBox="0 0 24 24" focusable="false"><path d="M20 10.5 13.5 4H5a1 1 0 0 0-1 1v8.5L10.5 20a2 2 0 0 0 2.8 0l6.7-6.7a2 2 0 0 0 0-2.8ZM8 9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Z"/></svg>
								<?php echo esc_html( $sniffspace_post_category->name ); ?>
							</a>
						<?php endif; ?>
					</div>

					<div class="ss-single-content">
						<?php
						the_content();

						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sniffspace' ),
								'after'  => '</div>',
							)
						);
						?>
					</div>

					<?php
					the_post_navigation(
						array(
							'class'     => 'ss-post-navigation',
							'prev_text' => '<span class="ss-post-navigation-icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="M10.7 5.3a1 1 0 0 1 0 1.4L6.4 11H20a1 1 0 1 1 0 2H6.4l4.3 4.3a1 1 0 0 1-1.4 1.4l-6-6a1 1 0 0 1 0-1.4l6-6a1 1 0 0 1 1.4 0Z"/></svg></span><span><small>' . esc_html__( 'Previous Post', 'sniffspace' ) . '</small><strong>%title</strong></span>',
							'next_text' => '<span><small>' . esc_html__( 'Next Post', 'sniffspace' ) . '</small><strong>%title</strong></span><span class="ss-post-navigation-icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="M13.3 5.3a1 1 0 0 1 1.4 0l6 6a1 1 0 0 1 0 1.4l-6 6a1 1 0 0 1-1.4-1.4l4.3-4.3H4a1 1 0 1 1 0-2h13.6l-4.3-4.3a1 1 0 0 1 0-1.4Z"/></svg></span>',
						)
					);
					?>
				</article>

				<?php get_template_part( 'template-parts/blog-sidebar' ); ?>
			</div>
			<div class="ss-blog-sidebar-overlay" data-blog-sidebar-close></div>
			<?php
		endwhile;
		?>
	</main>

<?php
get_footer();

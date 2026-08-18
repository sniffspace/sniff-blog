<?php
/**
 * The template for displaying search results pages.
 *
 * @package sniffspace
 */

get_header();

$sniffspace_blog_page_id = (int) get_option( 'page_for_posts' );
$sniffspace_blog_title   = $sniffspace_blog_page_id ? get_the_title( $sniffspace_blog_page_id ) : __( 'Blog', 'sniffspace' );
$sniffspace_blog_url     = $sniffspace_blog_page_id ? get_permalink( $sniffspace_blog_page_id ) : home_url( '/blog/' );
$sniffspace_search_query = get_search_query();
$sniffspace_search_title = sprintf(
	/* translators: %s: Search query. */
	__( 'Search Results for: %s', 'sniffspace' ),
	$sniffspace_search_query
);
?>

	<main id="primary" class="ss-blog-main">
		<section class="ss-blog-hero" aria-labelledby="ss-search-title">
			<div class="ss-blog-container">
				<h1 id="ss-search-title"><?php echo esc_html( $sniffspace_search_title ); ?></h1>
				<nav class="ss-blog-breadcrumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'sniffspace' ); ?>">
					<a href="<?php echo esc_url( sniffspace_get_main_website_home_url() ); ?>" title="<?php esc_attr_e( 'Home', 'sniffspace' ); ?>">
						<?php esc_html_e( 'Home', 'sniffspace' ); ?>
					</a>
					<span aria-hidden="true">/</span>
					<a href="<?php echo esc_url( $sniffspace_blog_url ); ?>" title="<?php echo esc_attr( $sniffspace_blog_title ); ?>">
						<?php echo esc_html( $sniffspace_blog_title ); ?>
					</a>
					<span aria-hidden="true">/</span>
					<span aria-current="page"><?php esc_html_e( 'Search', 'sniffspace' ); ?></span>
				</nav>
			</div>
		</section>

		<div class="ss-blog-container ss-blog-layout">
			<section class="ss-blog-posts-area" aria-label="<?php esc_attr_e( 'Search results', 'sniffspace' ); ?>">
				<div class="ss-blog-toolbar">
					<!-- <p><?php esc_html_e( 'Search Results', 'sniffspace' ); ?></p> -->
					<?php if ( have_posts() ) : ?>
						<div class="ss-blog-view-toggle" role="group" aria-label="<?php esc_attr_e( 'Choose blog view', 'sniffspace' ); ?>">
							<button class="ss-blog-view-button is-active" type="button" data-blog-view="grid" aria-pressed="true" title="<?php esc_attr_e( 'Grid view', 'sniffspace' ); ?>" aria-label="<?php esc_attr_e( 'Grid view', 'sniffspace' ); ?>">
								<svg aria-hidden="true" viewBox="0 0 24 24" focusable="false"><path d="M4 4h7v7H4V4Zm9 0h7v7h-7V4ZM4 13h7v7H4v-7Zm9 0h7v7h-7v-7Z"/></svg>
							</button>
							<button class="ss-blog-view-button" type="button" data-blog-view="list" aria-pressed="false" title="<?php esc_attr_e( 'List view', 'sniffspace' ); ?>" aria-label="<?php esc_attr_e( 'List view', 'sniffspace' ); ?>">
								<svg aria-hidden="true" viewBox="0 0 24 24" focusable="false"><path d="M4 6h4v4H4V6Zm6 .5h10v2H10v-2ZM4 14h4v4H4v-4Zm6 .5h10v2H10v-2Z"/></svg>
							</button>
						</div>
					<?php endif; ?>
				</div>

				<?php if ( have_posts() ) : ?>
					<div class="ss-blog-post-list is-grid" data-blog-post-list>
						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'card' );
						endwhile;
						?>
					</div>

					<?php
					the_posts_pagination(
						array(
							'mid_size'           => 1,
							'prev_text'          => '<svg aria-hidden="true" viewBox="0 0 24 24" focusable="false"><path d="M10.7 5.3a1 1 0 0 1 0 1.4L6.4 11H20a1 1 0 1 1 0 2H6.4l4.3 4.3a1 1 0 0 1-1.4 1.4l-6-6a1 1 0 0 1 0-1.4l6-6a1 1 0 0 1 1.4 0Z"/></svg><span class="screen-reader-text">' . esc_html__( 'Previous', 'sniffspace' ) . '</span>',
							'next_text'          => '<span class="screen-reader-text">' . esc_html__( 'Next', 'sniffspace' ) . '</span><svg aria-hidden="true" viewBox="0 0 24 24" focusable="false"><path d="M13.3 5.3a1 1 0 0 1 1.4 0l6 6a1 1 0 0 1 0 1.4l-6 6a1 1 0 0 1-1.4-1.4l4.3-4.3H4a1 1 0 1 1 0-2h13.6l-4.3-4.3a1 1 0 0 1 0-1.4Z"/></svg>',
							'screen_reader_text' => esc_html__( 'Search navigation', 'sniffspace' ),
						)
					);
					?>
				<?php else : ?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
				<?php endif; ?>
			</section>

			<?php get_template_part( 'template-parts/blog-sidebar' ); ?>
		</div>
		<div class="ss-blog-sidebar-overlay" data-blog-sidebar-close></div>
	</main>

<?php
get_footer();

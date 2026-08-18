<?php
/**
 * Blog sidebar with native WordPress search, categories, and recent posts.
 *
 * @package sniffspace
 */

$sniffspace_categories = get_categories(
	array(
		'hide_empty' => true,
		'orderby'    => 'name',
		'order'      => 'ASC',
	)
);

$sniffspace_recent_posts = get_posts(
	array(
		'numberposts'      => 5,
		'orderby'          => 'date',
		'order'            => 'DESC',
		'post_status'      => 'publish',
		'post_type'        => 'post',
		'suppress_filters' => false,
	)
);

$sniffspace_no_image_url = get_template_directory_uri() . '/assets/images/no-image.png';
$sniffspace_current_category_id = is_category() ? (int) get_queried_object_id() : 0;
?>

<aside id="ss-blog-sidebar" class="ss-blog-sidebar" aria-label="<?php esc_attr_e( 'Blog sidebar', 'sniffspace' ); ?>">
	<div class="ss-blog-sidebar-head">
		<?php /* <h2><?php esc_html_e( 'Blog Sidebar', 'sniffspace' ); ?></h2> */ ?>
		<button type="button" data-blog-sidebar-close title="<?php esc_attr_e( 'Close blog sidebar', 'sniffspace' ); ?>" aria-label="<?php esc_attr_e( 'Close blog sidebar', 'sniffspace' ); ?>">
			<svg aria-hidden="true" viewBox="0 0 24 24" focusable="false"><path d="M6.3 5.3a1 1 0 0 1 1.4 0l4.3 4.3 4.3-4.3a1 1 0 1 1 1.4 1.4L13.4 11l4.3 4.3a1 1 0 0 1-1.4 1.4L12 12.4l-4.3 4.3a1 1 0 0 1-1.4-1.4l4.3-4.3-4.3-4.3a1 1 0 0 1 0-1.4Z"/></svg>
		</button>
	</div>
	<section class="ss-sidebar-panel ss-sidebar-search">
		<h2><?php esc_html_e( 'Search Blogs', 'sniffspace' ); ?></h2>
		<form role="search" method="get" class="ss-blog-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<label class="screen-reader-text" for="ss-blog-search-field"><?php esc_html_e( 'Search blogs', 'sniffspace' ); ?></label>
			<input id="ss-blog-search-field" type="search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php esc_attr_e( 'Search articles...', 'sniffspace' ); ?>" title="<?php esc_attr_e( 'Search blogs', 'sniffspace' ); ?>">
			<button type="submit" title="<?php esc_attr_e( 'Search blogs', 'sniffspace' ); ?>">
				<span class="screen-reader-text"><?php esc_html_e( 'Search', 'sniffspace' ); ?></span>
				<svg aria-hidden="true" viewBox="0 0 24 24" focusable="false"><path d="m20.7 19.3-4.2-4.2a7.5 7.5 0 1 0-1.4 1.4l4.2 4.2a1 1 0 0 0 1.4-1.4ZM5 10.5a5.5 5.5 0 1 1 11 0 5.5 5.5 0 0 1-11 0Z"/></svg>
			</button>
		</form>
	</section>

	<?php if ( ! empty( $sniffspace_categories ) ) : ?>
		<section class="ss-sidebar-panel">
			<h2><?php esc_html_e( 'Categories', 'sniffspace' ); ?></h2>
			<ul class="ss-sidebar-list">
				<?php foreach ( $sniffspace_categories as $sniffspace_category ) : ?>
					<?php $sniffspace_is_current_category = $sniffspace_current_category_id === (int) $sniffspace_category->term_id; ?>
					<li>
						<a class="<?php echo $sniffspace_is_current_category ? 'is-active' : ''; ?>" href="<?php echo esc_url( get_category_link( $sniffspace_category ) ); ?>" title="<?php echo esc_attr( $sniffspace_category->name ); ?>"<?php echo $sniffspace_is_current_category ? ' aria-current="page"' : ''; ?>>
							<span class="ss-sidebar-category-name">
								<svg aria-hidden="true" viewBox="0 0 24 24" focusable="false"><path d="M9.3 5.3a1 1 0 0 1 1.4 0l6 6a1 1 0 0 1 0 1.4l-6 6a1 1 0 0 1-1.4-1.4l5.3-5.3-5.3-5.3a1 1 0 0 1 0-1.4Z"/></svg>
								<?php echo esc_html( $sniffspace_category->name ); ?>
							</span>
							<span><?php echo esc_html( (string) $sniffspace_category->count ); ?></span>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</section>
	<?php endif; ?>

	<?php if ( ! empty( $sniffspace_recent_posts ) ) : ?>
		<section class="ss-sidebar-panel">
			<h2><?php esc_html_e( 'Recent Posts', 'sniffspace' ); ?></h2>
			<ul class="ss-sidebar-recent">
				<?php foreach ( $sniffspace_recent_posts as $sniffspace_recent_post ) : ?>
					<?php
					global $post;

					$post = $sniffspace_recent_post; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
					setup_postdata( $post );

					$sniffspace_recent_thumb_id  = has_post_thumbnail() ? get_post_thumbnail_id() : 0;
					$sniffspace_recent_thumb_alt = $sniffspace_recent_thumb_id ? get_post_meta( $sniffspace_recent_thumb_id, '_wp_attachment_image_alt', true ) : '';

					if ( ! $sniffspace_recent_thumb_alt ) {
						$sniffspace_recent_thumb_alt = get_the_title();
					}
					?>
					<li>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php
								echo wp_get_attachment_image(
									$sniffspace_recent_thumb_id,
									'thumbnail',
									false,
									array(
										'class'   => 'ss-sidebar-recent-thumb',
										'loading' => 'lazy',
										'sizes'   => '64px',
										'alt'     => $sniffspace_recent_thumb_alt,
										'title'   => get_the_title(),
									)
								);
								?>
							<?php else : ?>
								<img class="ss-sidebar-recent-thumb ss-sidebar-recent-no-image" src="<?php echo esc_url( $sniffspace_no_image_url ); ?>" alt="<?php echo esc_attr( sprintf( __( 'No image available for %s', 'sniffspace' ), get_the_title() ) ); ?>" title="<?php the_title_attribute(); ?>" loading="lazy">
							<?php endif; ?>
							<span>
								<strong><?php the_title(); ?></strong>
								<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
									<svg aria-hidden="true" viewBox="0 0 24 24" focusable="false"><path d="M7 2a1 1 0 0 1 1 1v1h8V3a1 1 0 1 1 2 0v1h1a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h1V3a1 1 0 0 1 1-1Zm13 8H4v9a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-9ZM5 6a1 1 0 0 0-1 1v1h16V7a1 1 0 0 0-1-1H5Z"/></svg>
									<?php echo esc_html( get_the_date() ); ?>
								</time>
							</span>
						</a>
					</li>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>
			</ul>
		</section>
	<?php endif; ?>
</aside>

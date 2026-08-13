<?php
/**
 * Template part for displaying a post card in listing views.
 *
 * @package sniffspace
 */

$sniffspace_categories = get_the_category();
$sniffspace_category   = ! empty( $sniffspace_categories ) ? $sniffspace_categories[0] : null;
$sniffspace_thumb_id   = has_post_thumbnail() ? get_post_thumbnail_id() : 0;
$sniffspace_thumb_alt  = $sniffspace_thumb_id ? get_post_meta( $sniffspace_thumb_id, '_wp_attachment_image_alt', true ) : '';

if ( ! $sniffspace_thumb_alt ) {
	$sniffspace_thumb_alt = get_the_title();
}

$sniffspace_no_image_url = get_template_directory_uri() . '/assets/images/no-image.png';
$sniffspace_no_image_alt = sprintf(
	/* translators: %s: Post title. */
	__( 'No image available for %s', 'sniffspace' ),
	get_the_title()
);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'ss-post-card' ); ?>>
	<a class="ss-post-card-image" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>">
		<time class="ss-post-card-date-badge" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
			<svg aria-hidden="true" viewBox="0 0 24 24" focusable="false"><path d="M7 2a1 1 0 0 1 1 1v1h8V3a1 1 0 1 1 2 0v1h1a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h1V3a1 1 0 0 1 1-1Zm13 8H4v9a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-9ZM5 6a1 1 0 0 0-1 1v1h16V7a1 1 0 0 0-1-1H5Zm2 7h3v3H7v-3Zm5 0h3v3h-3v-3Z"/></svg>
			<?php echo esc_html( strtoupper( get_the_date( 'M d, Y' ) ) ); ?>
		</time>
		<?php if ( has_post_thumbnail() ) : ?>
			<?php
			echo wp_get_attachment_image(
				$sniffspace_thumb_id,
				'large',
				false,
				array(
					'class'   => 'ss-post-card-thumb',
					'loading' => 'lazy',
					'sizes'   => '(max-width: 767px) 100vw, (max-width: 1180px) 60vw, 760px',
					'alt'     => $sniffspace_thumb_alt,
					'title'   => get_the_title(),
				)
			);
			?>
		<?php else : ?>
			<img class="ss-post-card-thumb ss-post-card-no-image" src="<?php echo esc_url( $sniffspace_no_image_url ); ?>" alt="<?php echo esc_attr( $sniffspace_no_image_alt ); ?>" title="<?php the_title_attribute(); ?>" loading="lazy">
		<?php endif; ?>
	</a>

	<div class="ss-post-card-body">
		<h2 class="ss-post-card-title">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</h2>
		
		<div class="ss-post-card-meta">
			<?php if ( $sniffspace_category ) : ?>
				<a class="ss-post-card-category" href="<?php echo esc_url( get_category_link( $sniffspace_category ) ); ?>" title="<?php echo esc_attr( $sniffspace_category->name ); ?>">
					<svg aria-hidden="true" viewBox="0 0 24 24" focusable="false"><path d="M20 10.5 13.5 4H5a1 1 0 0 0-1 1v8.5L10.5 20a2 2 0 0 0 2.8 0l6.7-6.7a2 2 0 0 0 0-2.8ZM8 9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Z"/></svg>
					<?php echo esc_html( $sniffspace_category->name ); ?>
				</a>
			<?php endif; ?>
			<time class="ss-post-card-date-inline" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
				<svg aria-hidden="true" viewBox="0 0 24 24" focusable="false"><path d="M7 2a1 1 0 0 1 1 1v1h8V3a1 1 0 1 1 2 0v1h1a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h1V3a1 1 0 0 1 1-1Zm13 8H4v9a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-9ZM5 6a1 1 0 0 0-1 1v1h16V7a1 1 0 0 0-1-1H5Z"/></svg>
				<?php echo esc_html( get_the_date() ); ?>
			</time>
		</div>

		<div class="ss-post-card-excerpt">
			<?php the_excerpt(); ?>
		</div>

		<a class="ss-post-card-link" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Read more about %s', 'sniffspace' ), get_the_title() ) ); ?>">
			<?php esc_html_e( 'Read More', 'sniffspace' ); ?>
			<svg aria-hidden="true" viewBox="0 0 24 24" focusable="false"><path d="M13.3 5.3a1 1 0 0 1 1.4 0l6 6a1 1 0 0 1 0 1.4l-6 6a1 1 0 0 1-1.4-1.4l4.3-4.3H4a1 1 0 1 1 0-2h13.6l-4.3-4.3a1 1 0 0 1 0-1.4Z"/></svg>
		</a>
	</div>
</article>

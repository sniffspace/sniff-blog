<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		if ( is_sticky() && is_home() ) :
			echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
		endif;
	?>
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			} ?>
			<div class="likedisMain">
             <div class="like-dislike">
                    <?php
                    if (function_exists('like_counter_p')) {
                        like_counter_p('text for like');
                    }
                    ?>
                    <?php
                    if (function_exists('dislike_counter_p')) {
                        dislike_counter_p('text for un-like');
                    }
                    ?>
                </div>
                </div>
			<?php
                        if ( 'post' === get_post_type() ) :
				echo '<div class="entry-meta">';
					if ( is_single() ) :
						twentyseventeen_posted_on();
					else :
						echo twentyseventeen_time_link();
						twentyseventeen_edit_link();
					endif;
				echo '</div><!-- .entry-meta -->';
			endif;
		?>
</header><!-- .entry-header -->

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>
	<div class="entry-content">
             <?php if (is_search() || is_author() || is_tag() || is_archive() || is_home()) : // Only display Excerpts for Search   ?>
                      <?php // the_post_thumbnail('full'); ?>
                   <?php  the_excerpt(); ?>
<!--                    <p><a class="" href="<?php // the_permalink(); ?>">Read More</a></p>-->
                <!-- .entry-summary -->
            <?php else : ?>
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Read More', 'twentyseventeen' ),
				get_the_title()
			) );
			wp_link_pages( array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );

		?>

                 <?php endif; ?>
                <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
  <a class="addthis_button_preferred_1"></a>
  <a class="addthis_button_preferred_2"></a>
  <a class="addthis_button_preferred_3"></a>
  <a class="addthis_button_preferred_4"></a>
  <a class="addthis_button_compact"></a>
</div>
	</div><!-- .entry-content -->
	<?php if ( is_single() ) : ?>
		<?php twentyseventeen_entry_footer(); ?>
	<?php endif; ?>
</article><!-- #post-## -->




<!-- #post-<?php the_ID(); ?> -->


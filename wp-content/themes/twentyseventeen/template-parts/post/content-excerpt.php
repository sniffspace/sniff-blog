<?php
/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Recent Posts in Front Page panels.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="mainDiv">
	<div class="fullDiv">
		<header class="entry-header">
			<?php if ( is_front_page() && ! is_home() ) {
					// The excerpt is being displayed within a front page section, so it's a lower hierarchy than h2.
					the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
				} else {
					the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				} ?>
			</header><!-- .entry-header -->

		<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		     
				<div class="post-thumbnail">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
					</a>
				</div><!-- .post-thumbnail -->
		 
        <?php endif; ?>	

       
			
			

			<div class="catgoryDiv">
				<?php
					if ( 'post' === get_post_type() ) {
					echo '<div class="entry-meta">';
					if ( is_single() ) {
						twentyseventeen_posted_on();
					} else {
						echo twentyseventeen_time_link();
						//twentyseventeen_edit_link();
					}; ?>
	            	<?php echo get_the_category_list(); ?>
					<?php 
					if(get_the_tag_list()) {
					    echo get_the_tag_list('<ul class="post-tag"><li>','</li><li>','</li></ul>');
					}
					?>
	            <?php		
					echo '</div><!-- .entry-meta -->';
					};
				?>
			</div>

			<div class="entry-summary entry-content cmsPage">
				<?php the_excerpt(); ?>
				
				<?php
						/* translators: %s: Name of current post */
						/*the_content( sprintf(
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
							get_the_title()
						) );*/

						wp_link_pages( array(
							'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
							'after'       => '</div>',
							'link_before' => '<span class="page-number">',
							'link_after'  => '</span>',
						) );
					?>
			</div><!-- .entry-summary -->

		 
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

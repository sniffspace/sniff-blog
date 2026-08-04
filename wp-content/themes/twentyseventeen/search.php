<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<section class="innerMain BlogMain ">

	<article class="breadcrumbSection profile_start fina">
        <div class="container">
            <div class="row">

                <div class="col-12 breadCrumbLeftCol">
                	<div class="breadcrumbMainDiv">
                        
                        <div class="breadCrumbTitle d-flex align-items-center">
							 
								<?php if ( have_posts() ) : ?>
								<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
								<?php else : ?>
									<h1 class="page-title"><?php _e( 'Nothing Found', 'twentyseventeen' ); ?></h1>
								<?php endif; ?> 
                        </div>
                    </div>                    
                </div>                
            </div>
        </div>
    </article> 
<div class="container">
	<div class="row BlogMain">
		<div class="col-md-8 col-xl-9 col-lg-8 col-sm-12 col-xs-12 blogLeft">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
						<?php
						if ( have_posts() ) :
							/* Start the Loop */
							while ( have_posts() ) : the_post();
			/**
			 * Run the loop for the search to output the results.
			 * If you want to overload this in a child theme then include a file
			 * called content-search.php and that will be used instead.
			 */
			get_template_part( 'template-parts/post/content', 'excerpt' );
		endwhile; // End of the loop.
		the_posts_pagination( array(
			'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
		) );
		else : ?>
			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); ?></p>
			<?php
			get_search_form();
		endif;
		?>
	</main><!-- #main -->
</div><!-- #primary -->
</div>
<?php get_sidebar(); ?>
</div>
</div>
</section>
<?php
get_footer();

<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
							<div class="smallBackArrow">
				 				<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/mobile-back-arrow.png" alt="mobile-back-arrow"> Blog</a> 
							</div>
							<div class="breadCrumbTitle d-flex align-items-center">
				 				<a href="<?php echo home_url(); ?>" class="middiumDevice breadcrumBackArrow"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_black_backArrow.png"  alt="icon_black_backArrow"></a>
				 				<h1><?php single_post_title(); ?></h1>
				 			</div>	 
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
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/post/content', get_post_format() );
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					the_post_navigation( array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
					) );
				endwhile; // End of the loop.
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

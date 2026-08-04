<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
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
							<?php  if ( is_home() && ! is_front_page() ) : ?>
								<header class="page-header">
									<h1 class="page-title"><?php single_post_title(); ?></h1>
								</header>
							<?php  else : ?>
							<header class="page-header">
								<h2 class="page-title"><?php   _e( 'Blog', 'twentyseventeen' ); ?></h2>
							</header>
							<?php endif; ?>
                        </div>
                    </div>                    
                </div>                
            </div>
        </div>
    </article> 
<div class="container">
    <div class="row BlogMain">
<?php
			if ( have_posts() ) :
                            ?>
<div class="col-md-8 col-xl-9 col-lg-8 col-sm-12 col-xs-12 blogLeft">
 	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					/*

					 * Include the Post-Format-specific template for the content.

					 * If you want to override this in a child theme, then include a file

					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.

					 */

					get_template_part( 'template-parts/post/content', get_post_format() );
				endwhile;
				the_posts_pagination( array(

					'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',

					'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),

					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',

				) );
			else :
				get_template_part( 'template-parts/post/content', 'none' );
			endif;
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div>
	       <?php

        else:

            ?>

            <div class="comSpace">

            	<div class="sectionTitle">Coming Soon</div>

        	</div>

            <?php

        endif;

        ?>

	<?php 
 

        if ( have_posts() ) :

            get_sidebar(); 

        endif;?>
    </div>
</div>	

</section>


<?php
get_footer();

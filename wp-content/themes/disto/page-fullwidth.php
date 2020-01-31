<?php
/*
  Template Name: Page Fullwidth
 */
?>
<?php get_header(); ?>
<div class="main_title_wrapper category_title_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 main_title_col">
                <?php
              echo '<div class="jl_cat_mid_title">';
              echo '<h3 class="categories-title title">';
              echo get_the_title();
              echo '</h3>';      
              echo '</div>';        
   ?>
            </div>
        </div>
    </div>
</div>
<section id="content_main" class="clearfix">
    <div class="container">
        <div class="row main_content">
            <!-- begin content -->
            <div <?php post_class( 'page-full col-md-12'); ?> id="content">
                <div <?php post_class( 'content_single_page'); ?>>
                    <div class="content_page_padding">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                        <?php endwhile; // end of the loop.    ?>
                        <?php endif; ?>
                    </div>
                    <?php comments_template('', true); ?>
                    <div class="brack_space"></div>
                    <?php wp_link_pages( array( 'before' => '<ul class="page-links">', 'after' => '</ul>', 'link_before' => '<li class="page-link">', 'link_after' => '</li>' ) ); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
<?php
/*
  Template Name: Home grid 3 col
 */
?>
<?php get_header();
$pagination_options= get_post_custom_values('pagination_grid_layout_options', get_the_ID());
if($pagination_options[0]=='loadmore'){$pagination = "loadmore";}else{$pagination = "number";}
?>
<div class="jl_post_loop_wrapper jl_grid_4col_home">
    <div class="container" id="wrapper_masonry">
        <div class="row">
            <div class="col-md-12 grid-sidebar">
                <div class="jl_wrapper_cat">
                    <div id="content_masonry">
                        <?php 
                 if ( get_query_var('paged') ) {
                            $paged = get_query_var('paged');
                        } else if ( get_query_var('page') ) {
                            $paged = get_query_var('page');
                        } else {
                            $paged = 1;
                        }
                $disto_query = new WP_Query( array('paged' => $paged, 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 12));
                if ( $disto_query->have_posts() ) {
                while ( $disto_query->have_posts() ){  $disto_query->the_post();                    
                    get_template_part( 'inc/post-formats/grid-sidebar/content', get_post_format() );
                    }}else{                               
                        if (is_search()) {  esc_html_e('No result found', 'disto');}                                         
                    } ?>
                    </div>
                </div>

                <?php if($pagination == "loadmore"){?>
                <div class="pagination-more">
                    <div class="more-previous">
                        <?php next_posts_link(esc_html__('Load More', 'disto'), $disto_query->max_num_pages); ?>
                    </div>
                </div>
                <?php
}else{ disto_pagination($disto_query); }
wp_reset_postdata();
?>
            </div>
        </div>

    </div>
</div>
<!-- end content -->
<?php get_footer(); ?>
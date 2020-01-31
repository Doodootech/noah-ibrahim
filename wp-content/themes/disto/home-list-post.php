<?php
/*
  Template Name: Home list post
 */
?>
<?php get_header(); ?>
<div class="container" id="wrapper_masonry">
    <div class="row">
        <div class="col-md-8 loop-list-post-display home_with_list_post" id="content">
            <div class="blog-list-padding">
                <div id="content-loop-list-post">
                    <?php 
						if ( get_query_var('paged') ) {
							$paged = get_query_var('paged');
						} else if ( get_query_var('page') ) {
							$paged = get_query_var('page');
						} else {
							$paged = 1;
						}
					query_posts( array ( 'paged' => $paged, 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 9 ) );	
					if (have_posts()){
						while (have_posts()){ the_post();  
							get_template_part( 'inc/post-formats/list-post/content', get_post_format() );
					    }
					}else{       
                        
                        if (is_search()) {  esc_html_e('No result found', 'disto');}
                                         
                    }
                     disto_pagination();

                    ?>
                </div>
            </div>
            <?php 
 wp_reset_postdata();
 ?>
        </div>
        <div class="col-md-4" id="sidebar">
            <?php echo disto_page_sidebar();?>
        </div>
    </div>
</div>
<!-- end content -->
<?php get_footer(); ?>
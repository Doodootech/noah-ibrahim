<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'widgets_init', 'home_post_slider_tab_init' );

function home_post_slider_tab_init() {
    register_widget( 'home_post_slider_tab_widget' );
}

class home_post_slider_tab_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*  Widget Setup
/*-----------------------------------------------------------------------------------*/
            
    public function __construct() {
        $widget_ops = array(
            'classname'   => 'home_post_slider_tab_widget', 
            'description' => esc_html__('Display Home post slider', 'disto'),
            'panels_groups' => array('panels')
        );
        parent::__construct('home_post_slider_tab_widget', esc_html__('jellywp: Home post slider tab', 'disto'), $widget_ops);
    }

/*-----------------------------------------------------------------------------------*/
/*  Display Widget
/*-----------------------------------------------------------------------------------*/

    function widget($args, $instance) {
        extract($args);

         $titles = apply_filters('widget_title', empty($instance['titles']) ? ' ' : $instance['titles'], $instance, $this->id_base);
    
      if (!$number_show = absint( $instance['number_show'] )){$number_show = 5;}
      if (isset($instance['number_offset'])==''){$number_offset = 0;}else{$number_offset = absint($instance['number_offset']);}
      if (isset($instance['number_show'])==''){$number_show = 0;}else{$number_show = absint($instance['number_show']);}
      if (!$cats = $instance["cats"]){$cats = '';}
      
      $jellywp_args=array(               
        'showposts' => 4,
        'category__in'=> $cats,
        'ignore_sticky_posts' => 1,
        'offset' => $number_offset
        );
      $jellywp_widget = null;
      $jellywp_widget = new WP_Query($jellywp_args);


        // Post list in widget>?>
<div class="page_builder_slider jelly_homepage_builder">
    <?php if (!empty($instance['titles'])) {?>
    <div class="homepage_builder_title">
        <h2 class="builder_title_home_page">
            <?php echo esc_attr($instance["titles"]);?>
        </h2>
    </div>
    <?php }?>
    <div class="jl_slider_nav_tab large_center_slider_container">
    <div class="row header-main-slider-large">
        <div class="col-md-12">
            <div class="large_center_slider_wrapper">
                <div class="home_slider_header_tab jelly_loading_pro">
                    <?php
    $i=0;
        while ($jellywp_widget->have_posts()) {
      $i++;
      $post_id = get_the_ID();
      $jellywp_widget->the_post();
      $categories = get_the_category(get_the_ID());
        ?>
                    <div class="item">
                            <div class="banner-carousel-item">

                                <?php $slider_large_thumb_id = get_post_thumbnail_id();
                                $slider_large_image_header = wp_get_attachment_image_src( $slider_large_thumb_id, 'disto_large_slider_image', true ); ?>
                                <?php if($slider_large_thumb_id){?>
                                <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url($slider_large_image_header[0]); ?>')"></span>
                                <?php }else{?>
                                <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url(get_template_directory_uri().'/img/feature_img/header_carousel.jpg');?>')"></span>
                                <?php }?>
                                <a href="<?php the_permalink(); ?>" class="link_grid_header_absolute"></a>


                            <div class="banner-container">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="banner-inside-wrapper">
                                                    <?php if(get_theme_mod('disable_post_category') !=1){
          $categories = get_the_category(get_the_ID());          
          if ($categories) {
            echo '<span class="meta-category-small">';
            foreach( $categories as $tag) {
              $tag_link = get_category_link($tag->term_id);
              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
             echo '<a class="post-category-color-text '.$tag->name.'" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';
            }
            echo "</span>";
            }
            }
 ?>
                                                    <h5><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h5>
                                                    <?php echo disto_post_meta(get_the_ID()); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    <?php }?>
                </div>



                <div class="jlslide_tab_nav_container">
                        <div class="jlslide_tab_nav_row">
                            <div class="home_slider_header_tab_nav news_tiker_loading_pro">
                                <?php
      while ($jellywp_widget->have_posts()) {
      $jellywp_widget->the_post();
    ?>
                                <div class="item">
                                    <div class="banner-carousel-item">
                                        <?php $slider_large_thumb_id = get_post_thumbnail_id();
$slider_large_image_header = wp_get_attachment_image_src( $slider_large_thumb_id, 'disto_small_feature', true ); ?>
                                        <?php if($slider_large_thumb_id){?>
                                        <span class="image_small_nav" style="background-image: url('<?php echo esc_url($slider_large_image_header[0]); ?>')"></span>
                                        <?php }else{?>
                                        <span class="image_small_nav" style="background-image: url('<?php echo esc_url(get_template_directory_uri().'/img/feature_img/header_carousel.jpg');?>')"></span>
                                        <?php }?>
                                        <h5>
                                            <?php the_title()?>
                                        </h5>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>



            </div>
        </div>
    </div>
</div>
</div>

<?php
        wp_reset_postdata(); 
    }

/*-----------------------------------------------------------------------------------*/
/*  Update Widget
/*-----------------------------------------------------------------------------------*/
    
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['titles'] = strip_tags($new_instance['titles']);
        $instance['number_show'] = absint($new_instance['number_show']);  
        $instance['number_offset'] = absint($new_instance['number_offset']);  
        $instance['cats'] = $new_instance['cats'];
        return $instance;
    }

/*-----------------------------------------------------------------------------------*/
/*  Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
    
    function form( $instance ) {
        $titles = isset($instance['titles']) ? esc_attr($instance['titles']) : 'Home slider';
        $number_show = isset($instance['number_show']) ? absint($instance['number_show']) : 5;
        $number_offset = isset($instance['number_offset']) ? absint($instance['number_offset']) : 0;
        ?>
<p><label for="<?php echo esc_attr($this->get_field_id('titles')); ?>">
        <?php esc_attr_e('Title:', 'disto'); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('titles')); ?>" name="<?php echo esc_attr($this->get_field_name('titles')); ?>" type="text" value="<?php echo esc_attr($titles); ?>" /></p>

<p><label for="<?php echo esc_attr($this->get_field_id('number_show')); ?>">
        <?php esc_attr_e('Number of posts to show:', 'disto'); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number_show')); ?>" name="<?php echo esc_attr($this->get_field_name('number_show')); ?>" type="text" value="<?php echo esc_attr(esc_attr($number_show)); ?>" size="3" /></p>

<p><label for="<?php echo esc_attr($this->get_field_id('number_offset')); ?>">
        <?php esc_attr_e('Offset posts:', 'disto'); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number_offset')); ?>" name="<?php echo esc_attr($this->get_field_name('number_offset')); ?>" type="text" value="<?php echo esc_attr($number_offset); ?>" size="3" /></p>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('cats')); ?>">
        <?php esc_html_e('Choose your category:', 'disto');?>

        <?php
                   $categories=  get_categories();
                     echo "<br/>";
                     foreach ($categories as $cat) {
                    $option = '<input type="checkbox" id="' . $this->get_field_id('cats') . '[]" name="' . $this->get_field_name('cats') . '[]"';
              
              if (isset($instance['cats'])) {
                        foreach ($instance['cats'] as $cats) {
                            if ($cats == $cat->term_id) {
                                $option = $option . ' checked="checked"';
                            }
                        }
                    }
        
                    $option .= ' value="' . $cat->term_id . '" />';
                    $option .= '&nbsp;';
                    $option .= $cat->cat_name.' ('.esc_html( $cat->category_count ).')';
                    $option .= '<br />';
                    print '<span class="jl_none_space"></span>'.$option;
                }
                    
                    ?>
    </label>
</p>

<?php
    }
}
?>
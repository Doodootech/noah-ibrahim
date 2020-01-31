<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie ie9" <?php language_attributes(); ?>><![endif]-->
   <html <?php language_attributes(); ?>>
      <head>
         <meta charset="<?php bloginfo( 'charset' ); ?>">
         <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
         <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
         <?php wp_head(); ?>
         <!-- end head -->
      </head>
      <body <?php body_class();?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
         <div class="options_layout_wrapper <?php if(!get_theme_mod('disable_border_radius')==1){echo 'jl_radius';}?> <?php if(get_theme_mod('enable_dark_skin')){echo 'options_dark_skin';}?> jl_none_box_styles jl_border_radiuss">
         <div class="options_layout_container full_layout_enable_front">
         <?php get_template_part('header-layout'); ?>
         <div id="content_nav" class="jl_mobile_nav_wrapper">
            <div id="nav" class="jl_mobile_nav_inner">
               <div class="menu_mobile_icons mobile_close_icons closed_menu"><span class="jl_close_wapper"><span class="jl_close_1"></span><span class="jl_close_2"></span></span></div>
               <?php if ( has_nav_menu( 'Main_Menu' ) ){?>
               <?php $main_menu = array('theme_location' => 'Main_Menu', 'container' => '', 'menu_class' => 'menu_moble_slide', 'menu_id' => 'mobile_menu_slide', 'fallback_cb' => false, 'link_after'=>'<span class="border-menu"></span>'); wp_nav_menu($main_menu);?>
               <?php }else{ ?>
               <?php if ( current_user_can( 'manage_options' ) ){ ?>
               <ul id="mobile_menu_slide" class="menu_moble_slide">
                  <li><a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>">
                     <?php esc_html_e( 'Click here to add navigation menu', 'disto' ); ?></a>
                  </li>
               </ul>
               <?php }}?>
               <?php if (is_active_sidebar('mobile-menu-sidebar')) : dynamic_sidebar('mobile-menu-sidebar'); endif; ?>
            </div>
         </div>
         <div class="search_form_menu_personal">
            <div class="menu_mobile_large_close"><span class="jl_close_wapper search_form_menu_personal_click"><span class="jl_close_1"></span><span class="jl_close_2"></span></span></div>
            <?php get_search_form(); ?>
         </div>
         <div class="mobile_menu_overlay"></div>
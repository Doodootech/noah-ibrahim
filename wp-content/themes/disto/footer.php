<!-- Start footer -->
<footer id="footer-container" class="<?php if(get_theme_mod('footer_columns') == 'footer0col'){echo 'no_padding_footer';} ?> enable_footer_columns_dark">
    <?php if(get_theme_mod('footer_columns') == 'footer0col') {}else{?>
    <div class="footer-columns">
        <div class="container">
            <div class="row">
                <?php if(get_theme_mod('footer_columns') == 'footer1col' ){?>
                <div class="col-md-12">
                    <?php if (is_active_sidebar('footer1-sidebar')) : dynamic_sidebar('footer1-sidebar'); endif; ?>
                </div>
                <?php }elseif(get_theme_mod('footer_columns') == 'footer2col' ){?>
                <div class="col-md-6">
                    <?php if (is_active_sidebar('footer1-sidebar')) : dynamic_sidebar('footer1-sidebar'); endif; ?>
                </div>
                <div class="col-md-6">
                    <?php if (is_active_sidebar('footer2-sidebar')) : dynamic_sidebar('footer2-sidebar'); endif; ?>
                </div>
                <?php }elseif(get_theme_mod('footer_columns') == 'footer4col' ){?>
                <div class="col-md-3">
                    <?php if (is_active_sidebar('footer1-sidebar')) : dynamic_sidebar('footer1-sidebar'); endif; ?>
                </div>
                <div class="col-md-3">
                    <?php if (is_active_sidebar('footer2-sidebar')) : dynamic_sidebar('footer2-sidebar'); endif; ?>
                </div>
                <div class="col-md-3">
                    <?php if (is_active_sidebar('footer3-sidebar')) : dynamic_sidebar('footer3-sidebar'); endif; ?>
                </div>
                <div class="col-md-3">
                    <?php if (is_active_sidebar('footer4-sidebar')) : dynamic_sidebar('footer4-sidebar'); endif; ?>
                </div>
                <?php }else{?>
                <div class="col-md-4">
                    <?php if (is_active_sidebar('footer1-sidebar')) : dynamic_sidebar('footer1-sidebar'); endif; ?>
                </div>
                <div class="col-md-4">
                    <?php if (is_active_sidebar('footer2-sidebar')) : dynamic_sidebar('footer2-sidebar'); endif; ?>
                </div>
                <div class="col-md-4">
                    <?php if (is_active_sidebar('footer3-sidebar')) : dynamic_sidebar('footer3-sidebar'); endif; ?>
                </div>
                <?php }?>
            </div>
        </div>

    </div>
    <?php }?>

    <div class="footer-bottom enable_footer_copyright_dark">
        <div class="container">
            <div class="row bottom_footer_menu_text">
                <div class="col-md-6 footer-left-copyright">
                    <?php echo esc_attr(get_theme_mod('jl_copyright')); ?>
                </div>
                <div class="col-md-6 footer-menu-bottom">
                    <?php $footer_menu = array('theme_location' => 'Footer_Menu', 'depth' => 1, 'container' => false, 'menu_class' => 'menu-footer', 'menu_id' => 'menu-footer-menu', 'fallback_cb' => false ); ?>
                    <?php wp_nav_menu($footer_menu); ?>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End footer -->
</div>
</div>
<div id="go-top"><a href="#go-top"><i class="fa fa-angle-up"></i></a></div>
<?php wp_footer();?>
</body>

</html>
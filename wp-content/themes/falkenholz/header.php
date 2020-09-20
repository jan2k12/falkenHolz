<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">        
        <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/style.css" />
        <!--[if lt IE 9]>
        <script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/html5.js"></script>
        <![endif]-->
        <?php wp_head(); ?>
    </head>

    <body>
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 col-lg-2" style="text-align: center;">
                        <a href="/" ><img  class="img-responsive fhlogo" style="display:inline-block;" src="<?php header_image(); ?>" ></a>
                    </div>
                    <div class="col-md-10 col-lg-10 backgroundheadercolor">
                        <?php
                        if (has_post_thumbnail($post->ID)) {
                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post-thumbnail');
                        }
                        ?>
                        <img  class="img-responsive logo" src="<?php echo $image[0]; ?>" >
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-default backgroundheadercolor">
                <div class="container-fluid">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                            <?php
                            wp_nav_menu(array(
                                'menu' => 'mainmenue_deutsch',
                                'theme_location' => 'mainmenue',
                                'depth' => 2,
                                'container' => 'div',
                                'container_class' => 'collapse navbar-collapse',
                                'container_id' => 'navbar-collapse-1',
                                'menu_class' => 'nav nav-pills headermenue',
                                'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                                'walker' => new wp_bootstrap_navwalker())
                            );
                            ?>
          
                </div>
            </nav>
        </header>

        <div id="content" class=" container-fluid site-content">

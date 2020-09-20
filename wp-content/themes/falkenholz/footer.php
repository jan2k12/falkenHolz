<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>



<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/jquery.1.11.x.min.js"></script>
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/bootstrap.min.js"></script>

<?php wp_footer(); ?>



<div class="container-fluid footernav" >

    <?php
    wp_nav_menu(array('menu' => 'Fußleiste',
        'container' => 'nav'));
    ?>
    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('CounterArea')) : ?>
        [ do default stuff if no widgets ]
    <?php endif; ?>
</div>
</body>
</html>

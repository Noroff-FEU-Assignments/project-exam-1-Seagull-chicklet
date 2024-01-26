<?php


/**
 * Custom Theme functions.
 * This file contains hook functions attached to theme hooks.
 * 
 * @package Simu blog
 */

/**
 * Header hook function
 */

if (!function_exists('simublog_main_header')) :
    function simublog_main_header()
    { ?>

        <!--====== HEADER PART START ======-->

        <header class="header-area header_style_2">

            <div class="header-menu-area d-lg-block">

                <div class="header-main-menu" id="simublog-head">
                    <div class="container">
                        <div class="row align-items-lg-center">
                            <div class="col-lg-2  mobile-view ">
                                <div class="menu-logo">
                                    <?php simublog_site_logo(); ?>

                                </div>
                                <!-- Mobile Toggle -->
                                <button type="button" class="menu-toggle">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <!-- Mobile Toggle -->
                            </div>
                            <div class="col-lg-10 ">



                                <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php echo esc_attr__('Primary Menu', 'simu-blog'); ?>">


                                    <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'primary',
                                        'menu_id'        => 'primary-menu',
                                        'menu_class'     => 'nav-menu',
                                        'fallback_cb'    => 'simublog_primary_navigation_fallback',
                                    ));
                                    ?>
                                </nav><!-- #site-navigation -->
                            </div>

                        </div> <!-- row -->
                    </div> <!-- container -->

                </div>
            </div> <!-- header menu area -->





        </header>

        <!--====== HEADER PART ENDS ======-->

    <?php
    }
endif;
add_action('simublog_action_header', 'simublog_main_header', 10);


/**
Footer hook function
 **/

if (!function_exists('simublog_main_footer')) :
    function simublog_main_footer()
    { ?>

        <!--====== FOOTER PART START ======-->

        <footer class="footer-area footer_style2">
            <div class="footer-widget pt-60 pb-60">

                <div class="container">
                    <div class="row">
                        <?php
                        if (is_active_sidebar('footer_menu')) {
                            dynamic_sidebar('footer_menu');
                        }
                        ?>


                    </div> <!-- row -->
                </div> <!-- container -->
            </div> <!-- footer widget -->
            <?php
            $simublog_footer_bottom_display = get_theme_mod('simublog_footer_bottom_display');
            if ('1' == $simublog_footer_bottom_display) : ?>
                <div class="footer-copyright pt-10 pb-20">
                    <div class="container">
                        <div class="copyright-section">
                            <div class="copyright text-center pt-10">

                                <?php
                                $simublog_copyright_text = get_theme_mod('simublog_copyright_text');

                                ?>

                                <p class="pt-2 text">
                                    <?php if ($simublog_copyright_text) :
                                        echo esc_html($simublog_copyright_text); ?>
                                    <?php else : ?>
                                        &copy;
                                    <?php endif; ?>



                                    <?php
                                    echo date_i18n(
                                        /* translators: Copyright date format, see https://secure.php.net/date */
                                        _x('Y', 'copyright date format', 'simu-blog')
                                    );
                                    ?>
                                    <a href="<?php echo esc_url(__('https://wordpress.org/', 'simu-blog')); ?>">
                                        <?php
                                        /* translators: %s: CMS name, i.e. WordPress. */
                                        printf(esc_html__('Proudly powered by %s', 'simu-blog'), 'WordPress');
                                        ?>
                                    </a>
                                    <span class="sep"> | </span>
                                    <?php
                                    /* translators: 1: Theme name, 2: Theme author. */
                                    printf(esc_html__('Theme: %1$s by %2$s.', 'simu-blog'), 'Simu blog', '<a href="https://profiles.wordpress.org/nababurbd/">Nababur Rahaman</a>');
                                    ?>
                                </p>
                            </div> <!-- copyright -->

                        </div> <!-- copyright payment -->
                    </div> <!-- container -->
                </div> <!-- footer copyright -->

            <?php endif; ?>
        </footer>

        <!--====== FOOTER PART ENDS ======-->





    <?php
    }
endif;
add_action('simublog_action_footer', 'simublog_main_footer', 10);





/**
 * Single page or post banner with title 
 * 
 * 
 */

if (!function_exists('simublog_blog_banner_header')) :
    /**
     * Page Header
     */
    function simublog_blog_banner_header()
    {
        if (is_front_page() && !is_home())
            return;
        $header_image = get_header_image();
        // if (is_singular()) :
        //     $header_image = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_id(), 'full') : $header_image;
        // endif;
    ?>
        <!-- #page-site-header -->
        <section class="breadcrumbs_section" style="background-image: url('<?php echo esc_url($header_image); ?>');"></section>

        <!-- #page-site-header -->
        <?php
    }
endif;
add_action('simublog_blog_banner_header', 'simublog_blog_banner_header', 10);

if (!function_exists('simublog_blog_banner_title')) :
    /**
     * Page Header
     */
    function simublog_blog_banner_title()
    {
        if ((is_front_page() && is_home()) || is_home()) {
            // $your_latest_posts_title = simublog_blog_get_option('your_latest_posts_title'); 
        ?>
            <?php

            $simublog_blog_title = get_theme_mod('simublog_blog_title');

            ?>
            <?php if ($simublog_blog_title) : ?>
                <h1 class="page-title"><?php echo esc_html($simublog_blog_title); ?></h1>
            <?php else : ?>
                <h1 class="page-title"><?php echo esc_html__('Blog', 'simu-blog')  ?></h1>
            <?php endif; ?>

        <?php
        }

        if (is_singular()) {
            the_title('<h1 class="page-title">', '</h1>');
        }

        if (is_archive()) {
            the_archive_title('<h1 class="page-title mb-2">', '</h1>');
            the_archive_description('<div class="archive-description">', '</div>');
        }

        if (is_search()) { ?>
            <h1 class="page-title"><?php printf(esc_html__('Search Results for: %s', 'simu-blog'), '<span>' . get_search_query() . '</span>'); ?></h1>
        <?php }

        if (is_404()) {
            echo '<h1 class="page-title">' . esc_html__('Error 404', 'simu-blog') . '</h1>';
        }
    }
endif;





// Author Box.
if (!function_exists('simublog_author')) :
    function simublog_author($id)
    {
        $id = $id ? $id : get_the_author_meta('ID');
        ?>
        <div class="row author-content">
            <div class="col-md-3">
                <?php echo get_avatar($id, '155', '', '', array('class' => 'lazy-load')); ?>
            </div>
            <div class="col-md-9">
                <h4 class="mb-2">
                    <a href="<?php echo esc_url(get_author_posts_url($id)); ?>"><?php echo esc_html(get_the_author_meta('display_name', $id)); ?></a>

                </h4>
                <p>
                    <?php the_author_meta('description', $id); ?>
                </p>
                <?php if (get_the_author_meta('url', $id) !== '') { ?>
                    <a href="<?php echo esc_url(get_the_author_meta('url', $id)); ?>" target="_blank"><i class="fa fa-link"></i></a>

                <?php } ?>
            </div>
        </div>
        <?php if (is_author()) : ?>
            <div class="clearfix"></div>
            <h5 class="mt-4">
                <?php esc_html__('Posts by', 'simu-blog') . esc_html(the_author_meta('display_name', $id)); ?>:

            </h5>
            <hr>
<?php
        endif;
    }
endif;
add_action('simublog_author', 'simublog_author', 3);

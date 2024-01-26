<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Simu blog
 */

?>

<?php
/**
 * Hook - simublog_action_footer
 * @hooked simublog_main_footer - 10
 */
do_action('simublog_action_footer');
?>
<!--====== BACK TOP TOP PART START ======-->

<a href="#" class="back-to-top back-blue"><i class="fal fa-angle-double-up"></i></a>

<!--====== BACK TOP TOP PART ENDS ======-->
<?php wp_footer(); ?>

</body>

</html>
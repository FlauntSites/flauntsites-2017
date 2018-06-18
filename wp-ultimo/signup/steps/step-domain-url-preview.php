<?php
/**
 * This is the template used to display the URL preview field on the domain step
 *
 * This template can be overridden by copying it to yourtheme/wp-ultimo/signup/steps/step-domain-url-preview.php.
 *
 * HOWEVER, on occasion WP Ultimo will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @author      NextPress
 * @package     WP_Ultimo/Views
 * @version     1.0.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}
?>
<p id="wu-your-site-block">
  <small><?php _e('Don\'t worry, you\'ll be able to use your domain name.', 'wp-ultimo'); ?></small></br>
  <small><?php _e('But for now, your temporary URL will:', 'wp-ultimo'); ?></small>

  <?php
  /**
   * Change the base, if sub-domain or subdirectory
   */
  $dynamic_part  = '<strong id="wu-your-site">';
  // This is used on the yoursite.network.com during sign-up
  $dynamic_part .= isset($signup->results['blogname']) ? $signup->results['blogname'] : __('yoursite', 'wp-ultimo');
  $dynamic_part .= '</strong>';
  
  $site_url      = preg_replace('#^https?://#', '', site_url());
  $site_url      = str_replace('www.', '', $site_url);

  $template      = is_subdomain_install() ? $dynamic_part . '.' . $site_url : $site_url . "/" . $dynamic_part;

  echo $template;

  ?>

</p>
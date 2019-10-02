<?php
Use Roots\Sage\Extras;

$locations = get_nav_menu_locations();
$menuID = $locations['social_navigation'];
$socialNav = wp_get_nav_menu_items($menuID);

 ?>
 <div class="social-sticky-footer">
   <ul>
     <li> <a href="https://www.instagram.com/zissoumagazine/" class="instagram"><?php get_template_part('components/facebook-icon'); ?></a> </li>
    <li> <a href="https://twitter.com/zissoumag?lang=en" class="twitter"><?php get_template_part('components/twitter-icon'); ?></a> </li>
    <li> <a href="https://www.facebook.com/zissoumagazine" class="facebook"><?php get_template_part('components/instagram-icon'); ?></a> </li>
   </ul>
 </div>

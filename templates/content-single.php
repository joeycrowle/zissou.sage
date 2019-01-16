<?php
Use Roots\Sage\Extras;

the_content();
include('row-builder.php');
get_template_part('templates/article-nav');

?>

<h1 class="font-primary"><?php echo the_title(); ?></h1>

<?php
Use Roots\Sage\Extras;

$args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'tax_query' => array(
    array(
      'taxonomy' => 'issue',
      'field' => 'slug',
      'terms' => mag_current_issue(),
      'operator' => 'IN',
      'include_children' => false
    )
  )
);
$query = new WP_Query($args);
$posts = get_posts($query); ?>

<div class="articles">
<?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post();
  get_template_part('templates/article-cover');
endwhile;
endif;
?>
</div>

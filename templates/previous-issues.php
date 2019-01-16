<?php
  $issues = get_terms('issue');

  foreach($issues as $issue):
    $link = get_term_link($issue->slug, 'issue');
    $name = $issue->name;
?>
      <a class="font-colour-primary" href="<?= esc_url($link); ?>"><?php echo $name ?></a>
<?php
  endforeach;
?>

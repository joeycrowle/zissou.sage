<form role="search" method="get" id="search-form" action="<?= get_home_url() ?>">

<div class="input-container">
<input type="text" value="" placeholder="" name="s" id="s" />

<label>
  <input type="submit" id="search-submit" value="Search" />
  <?php get_template_part('templates/mag-glass') ?>
</label>

</div>

</form>

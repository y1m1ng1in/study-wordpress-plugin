<div class="wrap">
  <h1>Custom Post Type Manager</h1>
  <?php settings_errors(); ?> 
  <form method="post" action="options.php">
    <?php 
      settings_fields('yiming1_plugin_cpt_settings');  # option_group
      do_settings_sections('yiming1_plugin_cpt'); # slug of the page
      submit_button();
    ?>
  </form>
</div>

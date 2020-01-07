<div class="wrap">
  <h1>Yiming1 Plugin</h1>
  <?php settings_errors(); ?> 

  <ul class="nav nav-tab">
    <li class="active"><a href="#tab-1">Manage Settings</a></li>
    <li><a href="#tab-2">Updates</a></li>
    <li><a href="#tab-3">About</a></li>
  </ul>

  <div class="tab-content">
    <div id="tab-1" class="tab-pane active">
      <form method="post" action="options.php">
        <?php 
          settings_fields('yiming1_option_group');  # option_group
          do_settings_sections('yiming1_plugin'); # slug of the page
          submit_button();
        ?>
      </form>
    </div>

    <div id="tab-2" class="tab-pane">
      <h3>Updates</h3>
    </div>

    <div id="tab-3" class="tab-pane">
      <h3>About</h3>
    </div>
  </div>
</div>

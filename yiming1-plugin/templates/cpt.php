<div class="wrap">
  <h1>Custom Post Type Manager</h1>
  <?php settings_errors(); ?> 

  <ul class="nav nav-tab">
    <li class="active"><a href="#tab-1">Your Custom Post Types</a></li>
    <li><a href="#tab-2">Add Custom Post Type</a></li>
    <li><a href="#tab-3">Export</a></li>
  </ul>

  <div class="tab-content">
    <div id="tab-1" class="tab-pane active">
      <h3>Manage custom post type</h3>
      <?php 
        $options = get_option('yiming1_plugin_cpt') ?: array();

        echo '<table class="cpt-table"><tr><th>ID</th><th>Singular Name</th><th>
              Plural Name</th><th>Public</th><th>Archive</th><th>Action</th></tr>';
        foreach($options as $option){
          $is_public = isset($option['public']) ? "TRUE" : "FALSE";
          $has_archive = isset($option['has_archive']) ? "TRUE" : "FALSE";

          echo "<tr>
                <td>{$option['post_type']}</td>
                <td>{$option['singular_name']}</td>
                <td>{$option['plural_name']}</td>
                <td>{$is_public}</td>
                <td>{$has_archive}</td>
                <td><a href=\"#\">Edit</a> ";

          echo '<form method="post" action="options.php" class="inline-block">';

          settings_fields('yiming1_plugin_cpt_settings');  # option_group

          // store the "post_type" in the hidden form field with name "remove",
          // so then it can be used in cpt_sanitize to get the post_type to remove
          // by using $_POST
          echo '<input type="hidden" name="remove" value="'. $option['post_type'] .'">';

          submit_button('Delete', 'delete small', 'submit', false, 
            array('onclick' => 'return confirm("Are your sure you want to delete the custom post type?");'));

          echo '</form></td></tr>';
        }
        echo '</table>';
      ?>
    </div>

    <div id="tab-2" class="tab-pane">
      <form method="post" action="options.php">
        <?php 
          settings_fields('yiming1_plugin_cpt_settings');  # option_group
          do_settings_sections('yiming1_plugin_cpt'); # slug of the page
          submit_button();
        ?>
      </form>
    </div>

    <div id="tab-3" class="tab-pane">
      <h3>Export custom post type</h3>
    </div>
  </div>  
</div>

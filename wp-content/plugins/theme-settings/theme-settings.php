<?php

/**
 * Plugin Name: Website Defalt Settings
 * Plugin URI: 
 * Description: This plugin adds some Defalt Settings to Your Website.
 * Version: 1.0.0
 * Author: 
 * Author URI: 
 * License: GPL2
 */
function theme_settings_page() {
  ?>
  <div class="wrap">
    <h1>Theme Panel</h1>
    <form method="post" action="options.php" enctype="multipart/form-data">
      <h2>Contact Details</h2>
      <table class="form-table">
        <tbody>
          <tr class="user-user-login-wrap">
            <th><label for="user_login">Street Address</label></th>
            <td><input type="text" class="regular-text" name="street-address" value="<?php echo get_option('street-address'); ?>" /></td>
          </tr>
          <tr class="user-user-login-wrap">
            <th><label for="user_login">Address Locality</label></th>
            <td><input type="text" class="regular-text" name="address-locality" value="<?php echo get_option('address-locality'); ?>" /></td>
          </tr>
          <tr class="user-user-login-wrap">
            <th><label for="user_login">Address Region</label></th>
            <td><input type="text" class="regular-text" name="address-region" value="<?php echo get_option('address-region'); ?>" /></td>
          </tr>
          <tr class="user-user-login-wrap">
            <th><label for="user_login">Address Country</label></th>
            <td><input type="text" class="regular-text" name="address-country" value="<?php echo get_option('address-country'); ?>" /></td>
          </tr>
          <tr class="user-user-login-wrap">
            <th><label for="user_login">Address Postcode</label></th>
            <td><input type="text" class="regular-text" name="address-postcode" value="<?php echo get_option('address-postcode'); ?>" /></td>
          </tr>
          <tr class="user-user-login-wrap">
            <th><label for="user_login">Address Link</label></th>
            <td><textarea name="address-link"  class="regular-text"><?php echo get_option('address-link'); ?></textarea></td>
          </tr>

          <tr class="user-user-login-wrap">
            <th><label for="user_login">Phone No.</label></th>
            <td><input type="tel" name="phone" class="regular-text" min="10" max="10" value="<?php echo get_option('phone'); ?>" /></td>
          </tr>
          <tr class="user-user-login-wrap">
            <th><label for="user_login">Mobile No.</label></th>
            <td><input type="tel" name="mobile" class="regular-text" min="10" max="10" value="<?php echo get_option('mobile'); ?>" /></td>
          </tr>                      
          <tr class="user-user-login-wrap">
            <th><label for="user_login">Email</label></th>
            <td><input type="email" class="regular-text" name="email" value="<?php echo get_option('email'); ?>" /></td>
          </tr>
          <tr class="user-user-login-wrap">
            <th><label for="user_login">Map Link</label></th>
            <td><input type="text" class="regular-text" name="embedded_map" value="<?php echo get_option('embedded_map'); ?>" /></td>
          </tr>
        </tbody>
      </table>


      <hr>
      <h2>Social Media</h2>
      <table class="form-table">
        <tbody>		         
          <tr class="user-user-login-wrap">
            <th><label for="user_login">Facebook</label></th>
            <td><input class="regular-text"  name="facebook" value="<?php echo get_option('facebook'); ?>" /></td>
          </tr>                    
          <tr class="user-user-login-wrap">
            <th><label for="user_login">Twitter</label></th>
            <td><input class="regular-text"  name="twitter" value="<?php echo get_option('twitter'); ?>" /></td>
          </tr>
          <tr class="user-user-login-wrap">
            <th><label for="user_login">Pinterest</label></th>
            <td><input class="regular-text"  name="pinterest" value="<?php echo get_option('pinterest'); ?>" /></td>
          </tr>
         <?php /* <tr class="user-user-login-wrap">
            <th><label for="user_login">YouTube</label></th>
            <td><input class="regular-text"  name="youtube" value="<?php echo get_option('youtube'); ?>" /></td>
          </tr>
          <tr class="user-user-login-wrap">
            <th><label for="user_login">Linkedin</label></th>
            <td><input class="regular-text"  name="linkedin" value="<?php echo get_option('linkedin'); ?>" /></td>
          </tr>
          <tr class="user-user-login-wrap">
            <th><label for="user_login">Instagram</label></th>
            <td><input class="regular-text" name="instagram" value="<?php echo get_option('instagram'); ?>" /></td>
          </tr>
          <tr class="user-user-login-wrap">
            <th><label for="user_login">Skype</label></th>
            <td><input class="regular-text"  name="skype" value="<?php echo get_option('skype'); ?>" /></td>
          </tr> */ ?>
        </tbody>
      </table>

       <hr>
      <h2>Google Rating API Details</h2>
      <table class="form-table">
        <tbody>            
          <tr class="user-user-login-wrap">
            <th><label for="user_login">Place Id</label></th>
            <td><input class="regular-text"  name="google_rating_place_id" value="<?php echo get_option('google_rating_place_id'); ?>" /></td>
          </tr>                    
          <tr class="user-user-login-wrap">
            <th><label for="user_login">Api Key</label></th>
            <td><input class="regular-text"  name="google_rating_api_key" value="<?php echo get_option('google_rating_api_key'); ?>" /></td>
          </tr>
          </tbody>
      </table>
 <?php /*
      <hr>
      <h2>Copyright Details</h2>
      <table class="form-table">
        <tbody>     
          <tr class="user-user-login-wrap">
            <th><label for="user_login">Copyright Name:</label></th>
            <td><input class="regular-text"  name="copyright-name" value="<?php echo get_option('copyright-name'); ?>" /></td>
          </tr>                    
        </tbody>
      </table> 
*/ ?>
           <?php /*  <h2>Mailchimp Details:</h2>
            <table class="form-table">
                <tbody>	

                    <tr>
                        <th scope="row"><label>API Key</label></th>
                        <td><input class="regular-text" type="text" name="apikey" size="45" value="<?php echo get_option('apikey'); ?>" /></td>
                    </tr>

                    <tr>
                        <th scope="row"><label>List Id</label></th>
                        <td><input class="regular-text" type="text" name="listId" size="45" value="<?php echo get_option('listId'); ?>" /></td>
                    </tr>
                </tbody>
                </table>*/ ?>


                <hr>
                <h2>Css & Js Version:</h2>
                <table class="form-table">
                  <tbody>	

                    <tr>
                      <th scope="row"><label>Css & Js Version</label></th>
                      <td><input class="regular-text allow_numeric" type="text" name="version" size="45" value="<?php echo get_option('version'); ?>" /></td>
                    </tr>


                  </tbody>
                </table>



                <?php
                settings_fields("section");
                do_settings_sections("theme-options");
                submit_button();
                ?>          
              </form>
            </div>
            <?php
          }

          function add_theme_menu_item() {
            add_menu_page(
              'Theme Setting', 'Theme Setting', 'manage_options', 'theme-setting', 'theme_settings_page', 'dashicons-edit', 15
            );
          }

          add_action("admin_menu", "add_theme_menu_item");

          function display_theme_panel_fields() {
            register_setting("section", "street-address");
            register_setting("section", "address-locality");
            register_setting("section", "address-region");
            register_setting("section", "address-country");
            register_setting("section", "address-postcode");
            register_setting("section", "address-link");
            register_setting("section", "phone");
            register_setting("section", "mobile");
            register_setting("section", "email");
            register_setting("section", "embedded_map");
            register_setting("section", "facebook");
            register_setting("section", "twitter");
            register_setting("section", "linkedin");
            register_setting("section", "instagram");
            register_setting("section", "pinterest");
            register_setting("section", "version");
            register_setting("section", "google_rating_api_key");
            register_setting("section", "google_rating_place_id");
          }

          add_action("admin_init", "display_theme_panel_fields");

          function theme_settings() {
            wp_enqueue_script('jquery');
            $src = plugins_url('includes/theme-settings.js', __FILE__);
            wp_register_script('jquerytest', $src);
            wp_enqueue_script('jquerytest');
          }

          add_action('admin_init', 'theme_settings');


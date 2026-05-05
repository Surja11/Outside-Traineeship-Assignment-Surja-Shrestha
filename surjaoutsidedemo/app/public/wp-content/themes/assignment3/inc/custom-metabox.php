<?php 
function team_metabox() {
   add_meta_box(
       'team_metabox',
       'Member details',
       'team_metabox_callback',
       'team',
       'advanced',
       'default'
   ); }
add_action('add_meta_boxes', 'team_metabox');

function team_metabox_callback($post) {
   wp_nonce_field('mytheme_save_team_meta', 'team_nonce');
   $member_position = get_post_meta($post->ID, 'member_position', true);
   $member_yoe      = get_post_meta($post->ID, 'member_yoe', true);
   $member_address = get_post_meta($post->ID, 'member_address', true);
   $member_contact = get_post_meta($post->ID, 'member_contact', true);


   ?>


   <p><label for="member_position" class="member-row-title"><?php _e('Position', 'team'); ?></label><br>
       <input type="text" name="member_position" id="member_position" value="<?php echo esc_attr($member_position); ?>" /></p>
   <p><label for="member_yoe" class="member-row-title"><?php _e('Years of Experience', 'team'); ?></label>
   <br>
       <input type="text" name="member_yoe" id="member_yoe" value="<?php echo esc_attr($member_yoe); ?>" /></p>
    <p><label for="member_address" class="member-row-title"><?php _e(' Address', 'team'); ?></label>
    <br>
       <input type="text" name="member_address" id="member_address" value="<?php echo esc_attr($member_address); ?>" /></p>
    <p><label for="member_contact" class="member-row-title"><?php _e('Contact Number', 'team'); ?></label>
    <br>
       <input type="text" name="member_contact" id="member_contact" value="<?php echo esc_attr($member_contact); ?>" /></p>
   <?php
}




function mytheme_save_team_metabox($post_id) {


   // Security check
   if (!isset($_POST['team_nonce'])) return;

   if (!wp_verify_nonce($_POST['team_nonce'], 'mytheme_save_team_meta')) return;


   if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;


   if (!current_user_can('edit_post', $post_id)) return;


   // Save Position
   if (isset($_POST['member_position'])) {
       update_post_meta($post_id, 'member_position', sanitize_text_field($_POST['member_position']));
   }


   // Save Years of Experience
   if (isset($_POST['member_yoe'])) {
       update_post_meta($post_id, 'member_yoe', sanitize_textarea_field($_POST['member_yoe']));
   }

     // Save Address
   if (isset($_POST['member_address'])) {
       update_post_meta($post_id, 'member_address', sanitize_textarea_field($_POST['member_address']));
   }

     // Save Contact
   if (isset($_POST['member_contact'])) {
       update_post_meta($post_id, 'member_contact', sanitize_textarea_field($_POST['member_contact']));
   }

}


add_action('save_post', 'mytheme_save_team_metabox');


?>


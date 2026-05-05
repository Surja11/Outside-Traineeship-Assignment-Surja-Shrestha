<?php 
function team_metabox() {
   add_meta_box(
       'team_metabox',
       'Member details',
       'team_metabox_callback',
       'team',
       'side',
       'default'
   ); }
add_action('add_meta_boxes', 'team_metabox');
function team_metabox_callback($post) {
   wp_nonce_field('mytheme_save_team_meta', 'team_nonce');
   $member_position = get_post_meta($post->ID, 'member_position', true);
   $member_yoe          = get_post_meta($post->ID, 'member_yoe', true);
   ?>


   <p><label for="member_position" class="book-row-title"><?php _e('Member Position', 'team'); ?></label>
       <input type="text" name="member_position" id="member_position" value="<?php echo esc_attr($member_position); ?>" /></p>
   <p><label for="member_yoe" class="book-row-title"><?php _e('Members Years of Experience', 'team'); ?></label>
       <input type="text" name="member_yoe" id="member_yoe" value="<?php echo esc_attr($member_yoe); ?>" /></p>
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


   // Save Address
   if (isset($_POST['member_yoe'])) {
       update_post_meta($post_id, 'member_yoe', sanitize_textarea_field($_POST['member_yoe']));
   }

}


add_action('save_post', 'mytheme_save_team_metabox');


?>


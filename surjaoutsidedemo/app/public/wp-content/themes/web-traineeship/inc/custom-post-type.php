<?php 
function create_team_post_type() {
   $labels = array(
       'name'          => 'Teams',
       'singular_name' => 'Team',
       'menu_name'     => 'Teams',
   );
   $args = array(
       'labels'   => $labels,
       'public'   => true,
       'rewrite'  => array(
           'slug' => 'team',
       ),
       'supports' => array( 'title','editor','author','thumbnail','Excerpt', 'comments'),
   );
   register_post_type( 'team', $args );
}
add_action( 'init', 'create_team_post_type' );
?>
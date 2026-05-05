<?php function create_team_taxonomies() {
   $labels = array(
       'name'          => 'Team Location',
       'singular_name' => 'Location',
       'menu_name'     => 'Locations',
   );
   register_taxonomy(
       'team_department',
       array( 'team' ),
       array(
           'hierarchical' => true,
           'labels'       => $labels,
           'rewrite'      => array(
           'slug' 	  => 'team-location',
           ),
       )
   );
}
add_action( 'init', 'create_team_taxonomies', 0 );

?>
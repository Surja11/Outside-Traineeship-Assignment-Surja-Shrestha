<?php function create_team_taxonomies() {
   $labels = array(
       'name'          => 'Departments',
       'singular_name' => 'Department',
       'menu_name'     => 'Departements',
       'all_items'     => 'All Departments',    
       'edit_item'     => 'Edit Department',      
       'view_item'     => 'View Department',      
       'update_item'   => 'Update Department',     
       'add_new_item'  => 'Add New Department',  
       'search_items'  => 'Search Departments',
   );
   register_taxonomy(
       'department',
       array( 'team' ),
       array(
           'hierarchical' => true,
           'labels'       => $labels,
           'rewrite'      => array(
           'slug' 	  => 'department',
           ),
           'sort'              => true, 
       )
   );
}
add_action( 'init', 'create_team_taxonomies', 0 );

?>
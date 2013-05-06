<?php 
/*	= FreshDoor =
 * Custom Post Types
 */
class FreshDoorPostTypes extends FreshDoor
{
	
	function __construct()
	{
		add_action('init', array(&$this, 'add_item_post_type'));
		add_action('init', array(&$this, 'add_task_post_type'));
		//add_action('init', array(&$this, 'add_client_post_type'));
		//add_action('init', array(&$this, 'add_staff_post_type'));
		//add_action('init', array(&$this, 'add_invoice_post_type'));
		//add_action('init', array(&$this, 'add_estimate_post_type'));
		//add_action('init', array(&$this, 'add_expense_post_type'));
		//add_action('init', array(&$this, 'add_expense_category_taxonomy'));
		//add_action('init', array(&$this, 'add_project_post_type'));
		//add_action('init', array(&$this, 'add_payment_post_type'));
		//add_action('init', array(&$this, 'add_time_entry_post_type'));
		//add_action('init', array(&$this, 'add_payment_gateway_post_type'));
		//add_action('init', array(&$this, 'add_payment_tax_post_type'));
	}

	function add_item_post_type() {
		$singular_name = 'FreshBooks Item';
		$name = 'FreshBooks Items';
		$slug = 'freshbooks-item';
		  $labels = array(
		    'name' => $name,
		    'singular_name' => $singular_name,
		    'add_new' => 'Add New',
		    'add_new_item' => "Add New $singular_name",
		    'edit_item' => "Edit $singular_name",
		    'new_item' => "New $singular_name",
		    'all_items' => "All $name",
		    'view_item' => "View $singular_name",
		    'search_items' => "Search $name",
		    'not_found' =>  'No books found',
		    'not_found_in_trash' => 'No freshbooks items found in Trash', 
		    'parent_item_colon' => '',
		    'menu_name' => $name
		  );

		  $args = array(
		    'labels' => $labels,
		    'public' => false,
		    'publicly_queryable' => false,
		    'show_ui' => true, 
		    'show_in_menu' => true, 
		    'query_var' => false,
		    'rewrite' => array( 'slug' => $slug ),
		    'capability_type' => 'post',
		    'has_archive' => true, 
		    'hierarchical' => false,
		    'menu_position' => 7001,
		    'supports' => array( 'title' )
		  ); 

		  register_post_type( 'freshbooks-item', $args );
	}
	function add_task_post_type() {
		$singular_name = 'FreshBooks Task';
		$name = 'FreshBooks Tasks';
		$slug = 'freshbooks-task';
		  $labels = array(
		    'name' => $name,
		    'singular_name' => $singular_name,
		    'add_new' => 'Add New',
		    'add_new_item' => "Add New $singular_name",
		    'edit_item' => "Edit $singular_name",
		    'new_item' => "New $singular_name",
		    'all_items' => "All $name",
		    'view_item' => "View $singular_name",
		    'search_items' => "Search $name",
		    'not_found' =>  'No books found',
		    'not_found_in_trash' => 'No freshbooks items found in Trash', 
		    'parent_item_colon' => '',
		    'menu_name' => "$name"
		  );

		  $args = array(
		    'labels' => $labels,
		    'public' => false,
		    'publicly_queryable' => false,
		    'show_ui' => true, 
		    'show_in_menu' => true, 
		    'query_var' => false,
		    'rewrite' => array( 'slug' => $slug ),
		    'capability_type' => 'post',
		    'has_archive' => true, 
		    'hierarchical' => false,
		    'menu_position' => 7011,
		    'supports' => array( 'title' )
		  ); 

		  register_post_type( 'freshbooks-task', $args );
	}
}

<?php 
/*	= FreshDoor =
 * - Settings Page
 */
class FreshDoorSettings extends FreshDoor
{
	public $settingsPages, $settingsSubpages, $settingsSections, $settingsFields;

	function __construct()
	{

		// Set up data for two settings fields in one section on one subpage...
		//   =  Settings > FreshDoor
		//		- FreshBooks User (frdo_freshbooks_settings_user)
		//		- FreshBooks API Key (frdo_freshbooks_settings_api_key)
		$this->settingsSubpages = array(
			parent::pfix.'settings' => array(
				'parent_slug' => 'options-general.php',
				'menu_title' => 'FreshDoor',
				'page_title' => 'FreshDoor Settings',
				'capability' => 'activate_plugins',
				'function' => array(&$this, 'settings_subpage_callback')));
		$this->settingsSections = array(
			parent::pfix.'freshbooks_settings_section' => array(
				'title' => 'FreshBooks Settings',
				'callback' => array(&$this, 'freshbooks_settings_section_callback'),
				'page' => parent::pfix.'settings'));
		$this->settingsFields = array(
			parent::pfix.'freshbooks_settings_user' => array(
				'title' => 'FreshBooks User',
				'callback' => array(&$this, 'freshbooks_settings_user_callback'),
				'sanitize_callback' => array(&$this, 'freshbooks_settings_user_sanitize'),
				'page' => parent::pfix.'settings',
				'section' => parent::pfix.'freshbooks_settings_section'),
			parent::pfix.'freshbooks_settings_user_api_key' => array(
				'title' => 'FreshBooks API Key',
				'callback' => array(&$this, 'freshbooks_settings_api_key_callback'),
				'sanitize_callback' => array(&$this, 'freshbooks_settings_api_key_sanitize'),
				'page' => parent::pfix.'settings',
				'section' => parent::pfix.'freshbooks_settings_section'));

		add_action( 'admin_menu', array(&$this, 'do_settings_menus') );
		add_action( 'admin_init', array(&$this, 'do_settings'));
	}

	public function frdo_settings_page() {

	}

	public function do_settings() {
		foreach ($this->settingsSections as $id=>$val) {
			add_settings_section( $id, $val['title'], $val['callback'], $val['page'] );
		}
		foreach ($this->settingsFields as $id=>$val) {
			$val['args'] = !empty($val['args']) ? $val['args'] : array();
			register_setting( $val['section'], $id, $val['sanitize_callback'] );
			add_settings_field( $id, $val['title'], $val['callback'], $val['page'], $val['section'], $val['args'] );
		}
	}
	public function do_settings_menus() {
		foreach ($this->settingsSubpages as $id=>$val) {
			add_submenu_page( $val['parent_slug'], $val['page_title'], $val['menu_title'], $val['capability'], $id, $val['function'] );
		}
		//add_submenu_page( 'options-general.php', 'test', 'test', 'activate_plugins', 'slugaroo', array(&$this, 'settings_sections_callback') );
		//add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function = '', $icon_url = '', $position = null )
		//trigger_error('Message', E_NOTICE);
	}

	public function settings_subpage_callback() {
		$page_title = $this->settingsSubpages[parent::pfix.'settings']['page_title'];
		?>
		<div class="wrap">
		    <?php screen_icon(); ?>
		    <h2><?php _e($page_title) ?></h2>			
		    <form method="post" action="options.php">
		        <?php
                    // This prints out all hidden setting fields
				    settings_fields( parent::pfix.'freshbooks_settings_section' );	
				    do_settings_sections( parent::pfix.'settings' );
				?>
		        <?php submit_button(); ?>
		    </form>
		</div>
		<?php
	}
	public function freshbooks_settings_section_callback() {
		// Generic, use default output...
	}
	public function freshbooks_settings_user_callback() {
		$name = parent::pfix.'freshbooks_settings_user';
		$value = get_option( $name );
		echo '<input name="'.$name.'" type="text" value="'.$value.'" /><em class="gray">.freshbooks.com</span>';
	}
	public function freshbooks_settings_api_key_callback() {
		$name = parent::pfix.'freshbooks_settings_api_key';
		$value = get_option( $name );
		echo '<input name="'.$name.'" type="text"  value="'.$value.'" />';
	}
	public function freshbooks_settings_user_sanitize($val) {
		return $val; // Not validating
	}
	public function freshbooks_settings_api_key_sanitize($val) {
		return $val; // Not validating
	}
}
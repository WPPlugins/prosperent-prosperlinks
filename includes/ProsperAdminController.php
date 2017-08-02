<?php
/**
 * ProsperAdmin Controller
 *
 * @package 
 * @subpackage 
 */
class ProsperLinksAdminController
{
    /**
     * the class constructor
     *
     * @package 
     * @subpackage 
     *
     */
    public function __construct()
    {
		add_action('admin_menu', array($this, 'registerSettingsPage' ), 5);
		add_action( 'network_admin_menu', array( $this, 'registerNetworkSettingsPage' ) );
		
		require_once(PROSPERLINKS_MODEL . '/Admin.php');
		$prosperAdmin = new Model_Links_Admin();
		
		add_action( 'admin_init', array( $prosperAdmin, 'optionsInit' ) );
		add_action( 'admin_enqueue_scripts', array( $prosperAdmin, 'prosperAdminCss' ));	
		add_action( 'init', array( $prosperAdmin, 'init' ), 20 );
		add_filter( 'plugin_action_links', array( $prosperAdmin, 'addActionLink' ), 10, 2 );
	}
		
	/**
	 * Register the menu item and its sub menu's.
	 *
	 * @global array $submenu used to change the label on the first item.
	 */
	public function registerSettingsPage() 
	{
		add_menu_page(__('ProsperLinks Settings', 'prosperent-suite'), __( 'ProsperLinks', 'prosperent-suite' ), 'manage_options', 'prosperlinks_general', array( $this, 'generalPage' ), PROSPERLINKS_IMG . '/prosperentWhite.png' );
		add_submenu_page('prosperlinks_general', __( 'AutoLinker', 'prosperent-suite' ), __( 'Auto-Linker', 'prosperent-suite' ), 'manage_options', 'prosperlinks_autoLinker', array( $this, 'linkerPage' ) );
		add_submenu_page('prosperlinks_general', __( 'ProsperLinks', 'prosperent-suite' ), __( 'Link Settings', 'prosperent-suite' ), 'manage_options', 'prosper_prosperLinks', array( $this, 'linksPage' ) );
		add_submenu_page('prosperlinks_general', __( 'Advanced Options', 'prosperent-suite' ), __( 'Advanced', 'prosperent-suite' ), 'manage_options', 'prosperlinks_advanced', array( $this, 'advancedPage' ));
		
		global $submenu;
		if (isset($submenu['prosperlinks_general']))
			$submenu['prosperlinks_general'][0][0] = __('General Settings', 'prosperent-suite' );
		
	}	
		
	/**
	 * Register the settings page for the Network settings.
	 */
	function registerNetworkSettingsPage() 
	{
		add_menu_page( __('ProsperLinks Settings', 'prosperent-suite'), __( 'Prosperent', 'prosperent-suite' ), 'delete_users', 'prosperlinks_general', array( $this, 'networkConfigPage' ), PROSPERLINKS_IMG . '/prosperentWhite.png' );
	}
		
	/**
	 * Loads the form for the network configuration page.
	 */
	function networkConfigPage() 
	{
		require_once(PROSPERLINKS_VIEW . '/prosperadmin/network-phtml.php' );
	}
		
	/**
	 * Loads the form for the general settings page.
	 */
	public function generalPage() 
	{
		if ( isset( $_GET['page'] ) && 'prosperlinks_general' == $_GET['page'] )
			require_once( PROSPERLINKS_VIEW . '/prosperadmin/general-phtml.php' );
	}
		
	/**
	 * Loads the form for the auto-linker page.
	 */
	public function linkerPage() 
	{
		if ( isset( $_GET['page'] ) && 'prosperlinks_autoLinker' == $_GET['page'] )
			require_once( PROSPERLINKS_VIEW . '/prosperadmin/linker-phtml.php' );
	}			
		
	/**
	 * Loads the form for the prosperLinks page.
	 */
	public function linksPage() 
	{
		if ( isset( $_GET['page'] ) && 'prosper_prosperLinks' == $_GET['page'] )
			require_once( PROSPERLINKS_VIEW . '/prosperadmin/prosperLinks-phtml.php' );
	}	
	
	/**
	 * Loads the form for the product search page.
	 */
	public function advancedPage() 
	{	
		if ( isset( $_GET['page'] ) && 'prosperlinks_advanced' == $_GET['page'] )
			require_once( PROSPERLINKS_VIEW . '/prosperadmin/advanced-phtml.php' );
	}		
}
 
$prosperLinksAdmin = new ProsperLinksAdminController;
<?php
/**
 * ProsperIndex Controller
 *
 * @package 
 * @subpackage 
 */
class ProsperLinksIndexController
{	
    public function __construct()
    {		
		require_once(PROSPERLINKS_MODEL . '/Activate.php');
		$prosperActivate = new Model_Links_Activate();
		
		add_action('widgets_init', array($prosperActivate, 'createWidget'), 4);	
		
		register_activation_hook(PROSPERLINKS_PATH . PROSPERLINKS_FILE, array($prosperActivate, 'prosperActivate'));
		register_deactivation_hook(PROSPERLINKS_PATH . PROSPERLINKS_FILE, array($prosperActivate, 'prosperDeactivate'));

		add_action('admin_init', array($prosperActivate, 'prosperActivateRedirect'));
		add_action('admin_init', array($prosperActivate, 'prosperCustomAdd'));
		add_action('init', array($prosperActivate, 'doOutputBuffer'));	
		add_action('init', array($prosperActivate, 'init'));
	}
}
 
$prosperLinksIndex = new ProsperLinksIndexController;
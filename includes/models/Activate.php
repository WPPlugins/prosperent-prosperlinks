<?php
require_once(PROSPERLINKS_MODEL . '/Base.php');
/**
 * Base Abstract Model
 *
 * @package Model
 */
class Model_Links_Activate extends Model_Links_Base
{
	protected $_options;
	
	public function prosperActivate()
	{
		$this->_options = $this->getOptions();	
	}
	
	public function prosperDeactivate()
	{		

	}
	
	public function prosperOptionActivateAdd() 
	{
		add_option('prosperLinksActivationRedirect', true);
	}

	public function prosperActivateRedirect() 
	{
		if (get_option('prosperLinksActivationRedirect', false)) 
		{
			delete_option('prosperLinksActivationRedirect');
			if(!isset($_GET['activate-multi']))
			{
				wp_redirect( admin_url( 'admin.php?page=prosperlinks_general' ) );
			}
		}
	}
	
	public function prosperDefaultOptions()
	{
		if (!is_array(get_option('prosperSuite')))
		{
			$opt = array(
				'Target' => 1
			);	
			update_option('prosperSuite', $opt);
		}

		if (!is_array(get_option('prosper_autoLinker')))
		{
			$opt = array(
				'Enable_AL' 		 => 1,
				'Auto_Link_Comments' => 0
			);			
			update_option( 'prosper_autoLinker', $opt );
		}
		
		if (!is_array(get_option('prosper_prosperLinks')))
		{
			$opt = array(
				'PL_LinkOpt' => 1,
				'PL_LinkAff' => 1
			);			
			update_option( 'prosper_prosperLinks', $opt );
		}		
	}	
}

<?php
require_once(PROSPERLINKS_MODEL . '/Admin.php');
/**
 * ProsperLinker Controller
 *
 * @package 
 * @subpackage 
 */
class ProsperLinksLinkerController extends Model_Links_Admin
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
		require_once(PROSPERLINKS_MODEL . '/Linker.php');
		
		$prosperLinker = new Model_Links_Linker();
	
		if(is_admin())
		{
			add_action('admin_print_footer_scripts', array($prosperLinker, 'qTagsLinker'));
		}
		else
		{
			add_shortcode('linker', array($prosperLinker, 'linkerShortcode'));
		}
    }		
}
 
$prosperLinksLinker = new ProsperLinksLinkerController;
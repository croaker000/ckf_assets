<?php
require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');
/**
 * FUEL CMS
 * http://www.getfuelcms.com
 *
 * An open source Content Management System based on the
 * Codeigniter framework (http://codeigniter.com)
 *
 * @package		FUEL CMS
 * @author		David McReynolds @ Daylight Studio
 * @copyright	Copyright (c) 2013, Run for Daylight LLC.
 * @license		http://docs.getfuelcms.com/general/license
 * @link		http://www.getfuelcms.com
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * ckf_assets Controller
 *
 * @package		FUEL CMS
 * @subpackage	Controller
 * @category	Controller
 * @author		Martin Gautier, Fear of Mice
 * @link		https://github.com/croaker000/ckf_assets
 */

// --------------------------------------------------------------------
require_once CKF_ASSETS_PATH.'assets/js/core/ckfinder_php5.php' ;

class Ckf_assets extends Fuel_base_controller {

	public $nav_selected = 'site/ckf_assets'; // which navigation item should be selected

	function __construct()
	{
		parent::__construct();
	}

	// --------------------------------------------------------------------

	/**
	 *
	 * located at fuel/ckf_assets/
	 *
	 * @access	public
	 * @return	void
	 */
	function index()
	{
		$this->_validate_user('site/ckf_assets');

		setcookie('ckf_assets_isauthorized',true,time()+(7200),'/');  //If we get this far then we're in Fuel and are authorised to access Assets

		$finder = new CKFinder();                       //put it all together and configure it. Create() in view.
		$finder->BasePath = site_url('fuel/modules/ckf_assets/assets/js/');
		$finder->SelectFunction = 'ShowFileInfo';
		$finder->Width = '100%';
		$finder->Height = '100%';

		$vars['finder'] = $finder;

		$crumbs = array(lang('module_ckf_assets'));
		$this->fuel->admin->set_titlebar($crumbs, 'ico_tools_ckf_assets');
		$this->fuel->admin->render('_admin/ckf_assets_view', $vars, Fuel_admin::DISPLAY_NO_ACTION);
	}
}
/* End of file ckf_assets.php */
/* Location: ./fuel/modules/ckf_assets/controllers/backup.php */

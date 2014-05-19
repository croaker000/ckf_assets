<?php
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
 * Backup Dashboard Controller
 *
 * @package		FUEL CMS
 * @subpackage	Controller
 * @category	Controller
 * @author		David McReynolds @ Daylight Studio
 * @link		http://docs.getfuelcms.com/modules/backup
 */

// ------------------------------------------------------------------------

require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class Dashboard extends Fuel_base_controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->config('ckf_assets');

		$assets_dir = $this->fuel->ckf_assets->config('ckf_assets_path');

		$vars = array();

		$this->load->view('_admin/dashboard', $vars);
	}

}

/* End of file dashboard.php */
/* Location: ./fuel/modules/ckf_assets/controllers/dashboard.php */

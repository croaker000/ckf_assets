<?php
/*
|--------------------------------------------------------------------------
| FUEL NAVIGATION: An array of navigation items for the left menu
|--------------------------------------------------------------------------
*/
if (isset($config)) unset($config['nav']['site']['assets']);  //hide the old assets tool
$config['nav']['site']['site/ckf_assets'] = lang('module_ckf_assets');

/*
|--------------------------------------------------------------------------
| TOOL SETTING: CKF Assets
|--------------------------------------------------------------------------
*/

$config['ckf_assets'] = array();

/* End of file ckf_assets.php */
/* Location: ./modules/ckf_assets/config/ckf_assets.php */

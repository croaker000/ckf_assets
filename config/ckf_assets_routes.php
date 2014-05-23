<?php
$route[FUEL_ROUTE.'site/ckf_assets'] = 'ckf_assets';
$route[FUEL_ROUTE.'ckf_assets/dashboard'] = 'ckf_assets/dashboard';

//selector
// This route overrides the default selector dialog
$route[FUEL_ROUTE.'assets/select/(:any)'] = 'ckf_assets/ckf_selector/select/$1';

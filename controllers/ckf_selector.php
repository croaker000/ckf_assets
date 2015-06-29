<?php
require_once(FUEL_PATH.'libraries/Fuel_base_controller.php');
class Ckf_selector extends Fuel_base_controller {

   function __construct() {
		parent::__construct();
	}

	public function select($dir = NULL) {
	   $std_js = file_get_contents(FUEL_PATH.'../ckf_assets/assets/js/ckf_assets.js');

	   setcookie('ckf_assets_isauthorized',true,time()+(7200),'/');  //If we get this far then we're in Fuel and are authorised to access Assets

		$value = '';
		if ($this->session->flashdata('uploaded_post')) {
			$uploaded_post = $this->session->flashdata('uploaded_post');
			if (isset($uploaded_post)) {
				$subfolder = trim(preg_replace('#^'.preg_quote($dir).'(.*)#', '$1', $uploaded_post['asset_folder']), '/');
				if (!empty($subfolder)) {
					$subfolder = $subfolder.'/';
				}
				$value = $subfolder.$uploaded_post['uploaded_file_name'];
			}
		} else {
			$value = $this->input->get_post('selected', TRUE);
			$value = str_replace('{img_path(','',str_replace(')}','',$value));  //preg_replace would be better to cope with option "'" single quotes in value
		}

		$this->load->helper('array');
		$this->load->library('form_builder');

		$order = $this->input->get_post('order', TRUE);
		if ($order == 'last_updated') {
			$by = 'desc';
		} else {
			$order = 'name';
			$by = 'asc';
		}

		$redirect_to = uri_safe_encode(fuel_uri(fuel_uri_string(), TRUE)); // added back to make it refresh

      $preview = ' <a href="#" onclick="ckf_browseserver();" class="btn_field">Browse</a>';
      if ($value <> '') {
         $preview.= '<div id="asset_preview"><img src="'.img_path($value).'" id="asset_inline" class="" /></div>';
      } else {
		   $preview.= '<div id="asset_preview"></div>';
      }
		$field_values['asset_folder']['value'] = $dir;
		$fields['asset_select'] = array('id' => 'asset_select','value' => $value, 'label' => lang('assets_select_action'), 'after_html' => $preview);

		if (isset($_GET['width'])) {
			$fields['width'] = array('value' => $this->input->get_post('width', TRUE), 'label' => lang('form_label_width'), 'size' => 5, 'row_class' => 'img_only');
		}

		if (isset($_GET['height'])) {
			$fields['height'] = array('value' => $this->input->get_post('height', TRUE), 'label' => lang('form_label_height'), 'size' => 5, 'row_class' => 'img_only');
		}

		if (isset($_GET['alt'])) {
			$fields['alt'] = array('value' => $this->input->get_post('alt', TRUE), 'label' => lang('form_label_alt'), 'row_class' => 'img_only');
		}

		if (isset($_GET['align'])) {
			$alignment_options = array('' => '', 'left' => 'left', 'right' => 'right', 'middle' => 'middle', 'top' => 'top', 'bottom' => 'bottom');
			$fields['align'] = array('value' => $this->input->get_post('align', TRUE), 'label' => lang('form_label_align'), 'type' => 'select', 'options' => $alignment_options, 'row_class' => 'img_only');
		}

		if (isset($_GET['class'])) {
			$fields['class'] = array('value' => $this->input->get_post('class', TRUE), 'label' => lang('form_label_class'), 'size' => 6, 'row_class' => 'img_only');
		}

		$this->form_builder->css_class = 'asset_select';

		$this->form_builder->add_js("\n<script type=\"text/javascript\">{$std_js}</script>\n\n");
		$this->form_builder->submit_value = NULL;
		$this->form_builder->use_form_tag = FALSE;
		$this->form_builder->set_fields($fields);
		$this->form_builder->display_errors = FALSE;
		$this->form_builder->set_field_values($field_values);
		$vars['form'] = $this->form_builder->render_divs();
		$this->fuel->admin->set_inline(TRUE);

		$crumbs = array('' => 'Assets', lang('assets_select_action'));
		$this->fuel->admin->set_titlebar($crumbs,'ico_site_ckf_assets');
		$this->fuel->admin->render('ckf_modal_select', $vars);
	}

	function index() {
	   //nothing to see here, move along please
	}
}
?>

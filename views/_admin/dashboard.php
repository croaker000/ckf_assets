<script type="text/javascript">
//<![CDATA[
	var html = '';
	<?php if ($this->fuel->auth->has_permission('site/ckf_assets') AND $this->fuel->auth->accessible_module('ckf_assets')) : ?>
	html = '<p class="blue ico ico_info"><?=lang('data_ckf_assets_dashboard')?>.</p>';
	<?php endif; ?>

	// put it in the notification bar
	$('#fuel_notification').html(html);
//]]>
</script>
function ckf_browseserver() {
	var finder = new CKFinder();
	finder.basePath = '../';	// The path for the installation of CKFinder (default = "/ckfinder/").
	finder.selectActionFunction = SetFileField;
	finder.popup();

	// It can also be done in a single line, calling the "static"
	// popup( basePath, width, height, selectFunction ) function:
	// CKFinder.popup( '../', null, null, SetFileField ) ;
	//
	// The "popup" function can also accept an object as the only argument.
	// CKFinder.popup( { basePath : '../', selectActionFunction : SetFileField } ) ;
}

// This is a sample function which is called when a file is selected in CKFinder.
function SetFileField( fileUrl ) {
	var toRemove = jqx.config.assetsImgPath;

	document.getElementById('asset_select').value = fileUrl.replace(toRemove,'');

	var winHeight = 450;
	var html = '<img src="' + fileUrl +'" id="asset_inline" class="" />';
	$('#asset_preview').html(html);
	
	return true; //close finder
}
ccmValidateBlockForm = function() {

	if ($('select[name=field_1_select_value]').val() == '' || $('select[name=field_1_select_value]').val() == 0) {
		ccm_addError('Missing required selection: Choose a File Set');
	}


	return false;
}

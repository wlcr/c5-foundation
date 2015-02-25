<?php  defined('C5_EXECUTE') or die("Access Denied.");
?>

<style type="text/css" media="screen">
	.ccm-block-field-group h2 { margin-bottom: 5px; }
	.ccm-block-field-group td { vertical-align: middle; }
</style>

<div class="ccm-block-field-group">
	<h2>Choose a File Set</h2>
	<?php

	$sets = FileSet::getMySets();
	$options = array();

	foreach($sets as $set) {
		$options[$set->fsID] = $set->fsName;
	}

	echo $form->select('field_1_select_value', $options, $field_1_select_value);
	?>
</div>



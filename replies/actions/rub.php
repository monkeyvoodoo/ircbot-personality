<?php
$action = array(
	'type'      => 'action',
	'name'      => 'rub',
	'synonyms'  => array(
		'rubs',
		'rub'
	),
	'replies'   => 'include:modules/personality/replies/actions/rub_include.php',
	'declines'  => array("Don't rub me!"),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>

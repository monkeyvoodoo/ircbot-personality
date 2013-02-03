<?php
$action = array(
	'type'      => 'action',
	'name'      => 'flip',
	'synonyms'  => array(
		'flips',
		'flips a'
	),
	'replies'   => 'include:modules/personality/replies/actions/flips_include.php',
	'declines'  => array(''),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>

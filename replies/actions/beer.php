<?php
$action = array(
	'type'      => 'action',
	'name'      => 'beer',
	'synonyms'  => array(
		'gives  a beer',
		'hands  a beer',
		'offers  a beer',
		'gives a beer to',
		'hands a beer to',
		'offers a beer to'
	),
	'replies'   => 'include:modules/personality/replies/actions/beer_include.php',
	'declines'  => array(''),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>

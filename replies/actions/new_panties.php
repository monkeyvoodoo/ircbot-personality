<?php
$action = array(
	'type'      => 'action',
	'name'      => 'new-panties',
	'synonyms'  => array(
		'gives new panties',
		'gives a new pair of panties',
		'gives  some new panties',
		'gives some new panties to',
		'gives new panties to',
		'gives a new pair of panties to'
	),
	'replies'   => array(
		"ACTION:puts her new panties on.\nThanks, <nick>!",
		"ACTION:puts her new panties away.\nIt feels better without them!",
		"Oh, these are cute! Thanks, <nick>!\nACTION:trips and falls flat on her face while trying to put her new panties on\nEheheh~ Oops!",
		"Than-\nWait a minute...\n<nick>, these won't cover my butt at all!\nACTION:looks confused"
	),
	'declines'  => array('Daddy says not to take panties from strangers!'),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>

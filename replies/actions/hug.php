<?php
$action = array(
	'type'      => 'action',
	'name'      => 'hug',
	'synonyms'  => array(
		'hugs',
		'hug'
	),
	'replies'   => array(
		"ACTION:blushes",
		"ACTION:hugs <nick> enthusiastically",
		"ACTION:blushes and promptly takes a seat next to <nick>",
		"Oniichan suki! ♡",
		"Iyaa~! ♡"
	),
	'declines'  => array('Who are you?', 'Why are you poking me?'),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>
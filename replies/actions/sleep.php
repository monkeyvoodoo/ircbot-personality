<?php
$action = array(
	'type'      => 'action',
	'name'      => 'sleep',
	'synonyms'  => array(
		'naps on',
		'naps with',
		'sleeps on',
		'sleeps with'
	),
	'replies'   => array(
		"ACTION:pats <nick> gently\nPoor <nick>! You were that tired?",
		"ACTION:looks worried\nWhat?!",
		"ACTION:quietly undresses <nick>\nJust wait until they wake up!\nACTION:sneaks off"
	),
	'declines'  => array("Don't sleep me!"),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>

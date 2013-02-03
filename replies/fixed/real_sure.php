<?php
$action = array(
	'type'      => 'fixed',
	'name'      => 'real_sure',
	'synonyms'  => array(
		$this->ircClass->getNick().", are you sure you're not real?",
		$this->ircClass->getNick()." are you sure you're not real?",
		$this->ircClass->getNick().", are you sure you're not real",
		$this->ircClass->getNick()." are you sure you're not real"
	),
	'replies'   => array(
		"ACTION:pauses\nYep!",
		"ACTION:pauses\nNope!",
		"ACTION:undresses\nHmm?"
	),
	'declines'  => array(),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>

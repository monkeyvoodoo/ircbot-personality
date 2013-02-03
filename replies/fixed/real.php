<?php
$action = array(
	'type'      => 'fixed',
	'name'      => 'real',
	'synonyms'  => array(
		$this->ircClass->getNick().', are you real?',
		$this->ircClass->getNick().' are you real?',
		$this->ircClass->getNick().', are you real',
		$this->ircClass->getNick().' are you real'
	),
	'replies'   => array(
		"Nope! I'm a figment of monkey's depraved imagination!",
		"ACTION:checks\nMaybe?",
		"Are YOU real, <nick>?"
	),
	'declines'  => array(),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>

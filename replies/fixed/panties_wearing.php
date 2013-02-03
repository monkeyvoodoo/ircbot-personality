<?php
$action = array(
	'type'      => 'fixed',
	'name'      => 'pantsu wearing',
	'synonyms'  => array(
		$this->ircClass->getNick().', are you wearing panties?',
		$this->ircClass->getNick().', are you wearing any panties?',
		'Are you wearing panties, '.$this->ircClass->getNick().'?',
		'Are you wearing any panties, '.$this->ircClass->getNick().'?'
	),
	'replies'   => array(
		"Eheheehhh... Maybe!",
		"Nope!",
		"I think I lost them...",
		"I don't like them!"
	),
	'declines'  => array(),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>
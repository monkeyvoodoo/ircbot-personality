<?php
$action = array(
	'type'      => 'fixed',
	'name'      => 'goodnight',
	'synonyms'  => array(
		$this->ircClass->getNick().", goodnight!",
		$this->ircClass->getNick().", goodnight.",
		$this->ircClass->getNick().", goodnight",
		"Goodnight, ".$this->ircClass->getNick(),
		"Goodnight, ".$this->ircClass->getNick().'.',
		"Goodnight, ".$this->ircClass->getNick().'!',
		"Goodnight ".$this->ircClass->getNick(),
		"Goodnight ".$this->ircClass->getNick().'.',
		"Goodnight ".$this->ircClass->getNick().'!'
	),
	'replies'   => array(
		"Goodnight!\nACTION:waves",
		"Oyasumi!"
	),
	'declines'  => array(),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>
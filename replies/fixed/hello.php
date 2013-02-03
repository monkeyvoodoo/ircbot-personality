<?php
$action = array(
	'type'      => 'fixed',
	'name'      => 'hello',
	'synonyms'  => array(
		$this->ircClass->getNick().', hello',
		$this->ircClass->getNick().', hello.',
		$this->ircClass->getNick().', hello!',
		"Hi, ".$this->ircClass->getNick(),
		"Hi, ".$this->ircClass->getNick().'.',
		"Hi, ".$this->ircClass->getNick().'!',
		"Hi ".$this->ircClass->getNick(),
		"Hi ".$this->ircClass->getNick().'.',
		"Hi ".$this->ircClass->getNick().'!'
	),
	'replies'   => array(
		"Hi <nick>!",
		"Hello, <nick>",
		'Hiiii~!'
	),
	'declines'  => array(),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>
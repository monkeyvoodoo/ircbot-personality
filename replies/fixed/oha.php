<?php
$action = array(
	'type'      => 'fixed',
	'name'      => 'oha',
	'synonyms'  => array(
		$this->ircClass->getNick().', oha!',
		$this->ircClass->getNick().', oha',
		$this->ircClass->getNick().' oha!',
		$this->ircClass->getNick().' oha',
		'Ohayou, '.$this->ircClass->getNick().'!',
		'Ohayou '.$this->ircClass->getNick().'!',
		'Oha, '.$this->ircClass->getNick().'!',
		'Oha '.$this->ircClass->getNick().'!',
		'Good morning, '.$this->ircClass->getNick().'!',
		'Good morning, '.$this->ircClass->getNick().'.',
		'Good morning, '.$this->ircClass->getNick(),
		'Good morning '.$this->ircClass->getNick(),
		'Good morning '.$this->ircClass->getNick().'.',
		'Good morning '.$this->ircClass->getNick().'!',
		'Morning '.$this->ircClass->getNick(),
		'Morning, '.$this->ircClass->getNick(),
		$this->ircClass->getNick().', good morning',
		$this->ircClass->getNick().', good morning.',
		$this->ircClass->getNick().', good morning!'
	),
	'replies'   => array('Ohayou, <nick>!', "That's so lame, <nick>."),
	'declines'  => array(),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>
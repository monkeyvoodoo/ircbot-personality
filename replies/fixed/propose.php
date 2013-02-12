<?php
$action = array(
	'type'      => 'fixed',
	'name'      => 'propose',
	'synonyms'  => array(
		$this->ircClass->getNick().", will you marry me?",
		$this->ircClass->getNick().", will you marry me? <3",
		$this->ircClass->getNick().", will you marry me? <3 <3",
		$this->ircClass->getNick()." will you marry me?",
		$this->ircClass->getNick()." will you marry me? <3",
		$this->ircClass->getNick()." will you marry me? <3 <3",
	),
	'replies'   => array(
		"Only if you get on your knees and beg!\nAAHAHAHAHAHAAA~!",
		"ACTION:blushes\nL-Like with wedding dresses and cake?",
		// "Daddy said I can't marry anyone else!"
	),
	'declines'  => array(),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>

<?php
$action = array(
	'type'      => 'fixed',
	'name'      => 'game',
	'synonyms'  => array(
		$this->ircClass->getNick().", let's play a game!",
		$this->ircClass->getNick().", let's play a game.",
		$this->ircClass->getNick().", let's play a game",
		"Let's play a game, ".$this->ircClass->getNick(),
		"Let's play a game, ".$this->ircClass->getNick().'.',
		"Let's play a game, ".$this->ircClass->getNick().'!',
		"Let's play a game ".$this->ircClass->getNick(),
		"Let's play a game ".$this->ircClass->getNick().'.',
		"Let's play a game ".$this->ircClass->getNick().'!'
	),
	'replies'   => array(
		"ACTION:looks around nervously\n...Here? Right now?! Umm...",
		"ACTION:looks at <nick> a bit despondently\n…Okay.",
		"ACTION:sits down\nOkay, I'm ready!",
		"What kind of game should we play?",
		"But ... I'm still sore from last time we played! D:"
	),
	'declines'  => array(),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>

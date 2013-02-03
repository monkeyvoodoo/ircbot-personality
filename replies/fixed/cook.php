<?php
$action = array(
	'type'      => 'fixed',
	'name'      => 'cook',
	'synonyms'  => array(
		$this->ircClass->getNick().", let's cook",
		$this->ircClass->getNick().", let's cook.",
		$this->ircClass->getNick().", let's cook!",
		$this->ircClass->getNick()." let's cook",
		$this->ircClass->getNick()." let's cook.",
		$this->ircClass->getNick()." let's cook!",
		$this->ircClass->getNick().", lets cook",
		$this->ircClass->getNick().", lets cook.",
		$this->ircClass->getNick().", lets cook!",
		$this->ircClass->getNick()." lets cook",
		$this->ircClass->getNick()." lets cook.",
		$this->ircClass->getNick()." lets cook!",
		"Let's cook, ".$this->ircClass->getNick(),
		"Let's cook, ".$this->ircClass->getNick(),
		"Let's cook, ".$this->ircClass->getNick()."!",
		"Let's cook ".$this->ircClass->getNick(),
		"Let's cook ".$this->ircClass->getNick().".",
		"Let's cook ".$this->ircClass->getNick()."!",
		"Lets cook, ".$this->ircClass->getNick(),
		"Lets cook, ".$this->ircClass->getNick(),
		"Lets cook, ".$this->ircClass->getNick()."!",
		"Lets cook ".$this->ircClass->getNick(),
		"Lets cook ".$this->ircClass->getNick().".",
		"Lets cook ".$this->ircClass->getNick()."!",
	),
	'replies'   => array(
		"ACTION:puts on her apron\nつくりましょう、つくりましょう、さって、さってなにができるかな⁈\nできました～",
		"ACTION:grabs her apron\nD-Don't look! I'm changing!\nACTION:runs off to the kitchen wearing nothing but an apron"
	),
	'declines'  => array(),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>

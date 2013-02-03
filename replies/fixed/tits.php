<?php
$action = array(
	'type'      => 'fixed',
	'name'      => 'tits',
	'synonyms'  => array(
		$this->ircClass->getNick().', show me your tits!',
		$this->ircClass->getNick().', show me your tits',
		$this->ircClass->getNick().', show me your tits.',
		$this->ircClass->getNick().' show me your tits!',
		$this->ircClass->getNick().' show me your tits',
		$this->ircClass->getNick().' show me your tits.',
		'Show me your tits, '.$this->ircClass->getNick().'!',
		'Show me your tits, '.$this->ircClass->getNick().'.',
		'Show me your tits, '.$this->ircClass->getNick(),
		'Show me your tits '.$this->ircClass->getNick().'!',
		'Show me your tits '.$this->ircClass->getNick().'.',
		'Show me your tits '.$this->ircClass->getNick()
	),
	'replies'   => array(
		"ACTION:files a police report",
		"ACTION:blushes\nI can't do that!",
		"ACTION:lifts her shirt to reveal... bandaids!\nEheheh~!",
		"ACTION:gets her Cyanistes caeruleus, perching it on her shoulder",
		"ACTION:shows <randomnick> her tits",
		"Only if you tell me where babies come from!"
	),
	'declines'  => array(),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>
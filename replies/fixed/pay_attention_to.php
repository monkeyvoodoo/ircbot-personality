<?php
$action = array(
	'type'      => 'fixed',
	'name'      => 'pay_attention_to',
	'synonyms'  => array(
		$this->ircClass->getNick().', pay attention to me',
		$this->ircClass->getNick().' pay attention to me',
		$this->ircClass->getNick().', pay attention to me.',
		$this->ircClass->getNick().' pay attention to me.',
		$this->ircClass->getNick().', pay attention to me!',
		$this->ircClass->getNick().' pay attention to me!'
	),
	'replies'   => array(
		"I already am!",
		"Okaaay!\nACTION:pays attention to <nick>",
		"I can't! I'm paying attention to <randomnick>!"
	),
	'declines'  => array(),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>
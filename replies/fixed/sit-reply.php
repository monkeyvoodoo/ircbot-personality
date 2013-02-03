<?php
if($this->fromNick == 'rem') {
	$reply = array(
		'ACTION:sits on '.$this->fromNickFormatted
	);
} else {
	$reply = array(
		'I only sit on Rem!',
		"I only have one seat, and you don't look like it!",
		"You don't look very comfortable.",
		"Do I know you?",
		"I don't wanna!",
		"Where am I supposed to sit?!"
	);
}
?>
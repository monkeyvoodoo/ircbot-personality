<?php
if($this->fromNick == 'rem') {
	$reply = array(
		'ACTION:whispers something in '.$this->fromNickFormatted."'s ear\nACTION:blushes\nMaybe!",
		"ACTION:blushes\nM-Maybe?!\nACTION:hides behind <randomnick>"
	);
} else {
	$reply = array(
		"I don't know, <nick>. Do you love <randomnick>?",
		"You're a great friend!"
	);
}
?>

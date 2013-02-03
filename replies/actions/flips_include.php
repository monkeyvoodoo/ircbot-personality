<?php
$reply = array(
	"ACTION:rolls around\nAgain!",
	"WHEE! \o/"
);
switch(strtolower($nick)) {
	case 's0lid':
	case 's0liddi':
		array_push($reply, "Eheheh… Again!!");
	break;
	case 'monkey': $reply = array("ACTION:covers her butt"); break;
}
?>
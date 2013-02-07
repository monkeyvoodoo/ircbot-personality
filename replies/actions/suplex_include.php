<?php
$reply = array(
	"ACTION:suplexes <randomnick>",
	"ACTION:looks a bit disoriented\nW- What."
);
switch(strtolower($nick)) {
	case 'monkey': $reply = array("<nick>, don't be dumb."); break;
}
?>
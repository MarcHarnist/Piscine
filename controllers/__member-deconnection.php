
<?php

if (isset($_SESSION['member'])){ // If session member exists, restore object
	unset($member);
	unset($_SESSION['member']);
	session_destroy(); // The session is closed
}
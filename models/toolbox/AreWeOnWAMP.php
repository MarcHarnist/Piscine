<?php
$text = "We are online !";
if($_SERVER['HTTP_HOST'] == 'localhost')
{
  $text = 'We are on WAMP !';
}
echo $text;
?>
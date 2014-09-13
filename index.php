<?php
include "/controller/user.php";

$rout = $_GET['rout'];
$action = $_GET['action'];

if(isset($rout))
{
$object = new $rout;
$object->{$action}();
}

else include '/template/1.html';
?>
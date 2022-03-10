<?php

session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('id', '', time()-3600);

setcookie('kunci', '', time()-3600);

header("Location: path_admin.php");

?>
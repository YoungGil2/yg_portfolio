<?php
setcookie('login_id','',time()-86400,'/');
session_start();
session_destroy();
?>
<meta http-equiv="refresh" content="0;url=./number_list.php">

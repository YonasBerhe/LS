<?php
require_once('include/config.inc.php');
session_start();
session_destroy();
header( 'Location: /' ) ;
?>
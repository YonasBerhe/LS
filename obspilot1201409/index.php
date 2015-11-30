<?php
if(isset($_REQUEST['key']) && isset($_REQUEST['survey'])){
	header('Location: http://test.litesprite.com/survey/index.php?key='.$_REQUEST['key'].'&survey='.$_REQUEST['survey']);
} else {
	header('Location: http://test.litesprite.com/index.php');
}

?>
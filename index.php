<?php
//require_once('include/ga.php');
//set up the domain stuff

if( isset($_SERVER['HTTPS'] ) ) {
    $web_secure = "https";
} else {
    $web_secure = "http";
}


$domain = str_ireplace('www.', '', $_SERVER['HTTP_HOST']);
// Capture the request URI
$uri = strtolower(urldecode(trim($_SERVER['REQUEST_URI'], '/')));
$uri = preg_replace('/\?.*/', '', $uri);
// Capture the request args into an array
$args = $uri ? explode('/', $uri) : false;

if (0==1) {
    header( 'Location: /maintenance.php' ) ;
} else {

    if (strlen($args[0]) > 0) {
        if ($args[0] == 'logout') {
            session_start();
            session_destroy();
            header( 'Location: /' ) ;
        } else {

            if (file_exists('pages/'.$args[0].'.php')) {
                //get the page if it exists
                require_once('pages/'.$args[0].'.php');
            } else {
                //No Page Found
                require_once('pages/home.php');

                //require_once('pages/404.php');
            }
        }
    } else {
        //default catch all - home page.
        require_once('pages/home.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Litesprite</title>
    <meta name="description" content="Litesprite.com">
    <meta name="author" content="Litesprite.com">
    <?= $additionalCSS; ?>
	<link rel="shortcut icon" href="/favicon.ico">
    <script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <?= $additionalJS; ?>
    <link href="/css/litesprite.css" rel="stylesheet" media="screen"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <style type="text/css">
    <?= $auxcss; ?>
    </style>
</head>
<body>

<?php
echo $body;
?>

</body>




<?= $ga; ?>

</html>

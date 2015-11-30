<?php

require_once('include/header.php');
require_once('include/footer.php');

$additionalCSS .= <<<EOD

EOD;

$additionalJS.= <<<EOD

EOD;



$body .= <<<EOD

	{$header}
    <div class="colmask fullpage">
        <div class="col1 center">
            <!-- Column 1 start -->
				<h1>File Not Found</h1>
			 	<p>OH NO!!! <br/>
			 	This page is lost, or you went looking where you shouldn't have!</p>
			 	<p>If you think this is in error - please email <a href="mailto:socks@litesprite.com">socks@litesprite.com</a></p>
            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;

?>
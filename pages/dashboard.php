<?php 
require_once("include/config.inc.php");
require_once('include/mysqli.inc.php');
require_once("include/utils.inc.php");
require_once('include/header.php');
require_once('include/footer.php');

if ((isset($_SESSION['user_key']) == false) || (strlen($_SESSION['user_key']) < 1)) {
	header('Location: /login');	
}

if (strlen($args[1]) < 1) {
    $survey_id = 1;
} else {
    $survey_id = $args[1];
}

    //Validate the user
    $sql = "CALL rptSurveySummary(".sql_escape_string($survey_id, 0).");";
    //echo $sql.'<br/>';
     
    $Result = execute_query($mysqli, $sql);     
    if ($Result) {
        while ($row = $Result[0]->fetch_assoc()) {
            $countm = $row['countm'];
            $countf = $row['countf'];
            $countm10 = $row['countm10'];
            $countm20 = $row['countm20'];
            $countm30 = $row['countm30'];
            $countm40 = $row['countm40'];
            $countm50 = $row['countm50'];
            $countm60 = $row['countm60'];
            $countm70 = $row['countm70'];
            $countm80 = $row['countm80'];
            $countm90 = $row['countm90'];
            $countm100 = $row['countm100'];
            $countf10 = $row['countf10'];
            $countf20 = $row['countf20'];
            $countf30 = $row['countf30'];
            $countf40 = $row['countf40'];
            $countf50 = $row['countf50'];
            $countf60 = $row['countf60'];
            $countf70 = $row['countf70'];
            $countf80 = $row['countf80'];
            $countf90 = $row['countf90'];
            $countf100 = $row['countf100'];
// $report_data .= <<<EOD
//     <tr>
//         <td class="left">{$client_key}</td>
//         <td class="center">{$client_gender}</td>
//         <td class="center">{$client_age}</td>
//     </tr>
// EOD;
        }
    }




$additionalCSS .= <<<EOD
    <link href=  <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen"/>   
    <link href="../css/litesprite.css" rel="stylesheet" media="screen"/> 
EOD;


$additionalJS.= <<<EOD

EOD;


$body .= <<<EOD
	{$header}
    <div class="colmask fullpage">
        <div class="col1 center">
            <!-- Column 1 start -->
            <div class="backlink">
                <a href="/reports">[ View all Reports ]</a>
            </div>
            <div class="pagetitle">
                <h1>Welcome to the Survey Dashboard.</h1>
            </div>
            <div class="reporting"> 
                <table width="800">
                    <tr>
                        <td colspan="12" class="titlerow">Survey Summary</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <th>0-10</th>
                        <th>11-20</th>
                        <th>21-30</th>
                        <th>31-40</th>
                        <th>41-50</th>
                        <th>51-60</th> 
                        <th>61-70</th> 
                        <th>71-80</th> 
                        <th>81-90</th> 
                        <th>91-100</th> 
                        <th>Total</th>
                    </tr>
                    <tr>
                        <td>Female</td>
                        <td>{$countf10}</td>
                        <td>{$countf20}</td>
                        <td>{$countf30}</td>
                        <td>{$countf40}</td>
                        <td>{$countf50}</td>
                        <td>{$countf60}</td>
                        <td>{$countf70}</td>
                        <td>{$countf80}</td>
                        <td>{$countf90}</td>
                        <td>{$countf100}</td>
                        <td>$countf</td>
                    </tr>
                    <tr>
                        <td>Male</td>
                        <td>{$countm10}</td>
                        <td>{$countm20}</td>
                        <td>{$countm30}</td>
                        <td>{$countm40}</td>
                        <td>{$countm50}</td>
                        <td>{$countm60}</td>
                        <td>{$countm70}</td>
                        <td>{$countm80}</td>
                        <td>{$countm90}</td>
                        <td>{$countm100}</td>
                        <td>$countm</td>
                    </tr>
                
                </table>
            </div>
            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;

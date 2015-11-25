<?php 
require_once("include/config.inc.php");
require_once('include/mysqli.inc.php');
require_once("include/utils.inc.php");
require_once('include/header.php');
require_once('include/footer.php');

if ((isset($_SESSION['user_key']) == false) || (strlen($_SESSION['user_key']) < 1)) {
	header('Location: /login');	
}



    //Validate the user
    $sql = "CALL rptSinaspriteSummary();";
    //echo $sql.'<br/>';
     
    $Result = execute_query($mysqli, $sql);     
    if ($Result) {
        $med_usercount = 0;
        while ($row0 = $Result[0]->fetch_assoc()) {
            $client_key = $row0['client_key'];
            $count = $row0['count'];
            $count_sum += $count; 
            $avg = number_format($row0['avg'] / 60, 2 );
            $med_usercount++;
            $avg_sum += $avg; 
           
$data0 .= <<<EOD
    <tr>
        <td class="left">{$client_key}</td>
        <td class="right">{$count}</td>
        <td class="right">{$avg}</td>
    </tr>
EOD;
        }

        $jrnl_usercount = 0;
        while ($row1 = $Result[4]->fetch_assoc()) {
            $client_key = $row1['client_key'];
            $jrnl_count = $row1['count'];
            $jrnl_total += $jrnl_count;
            $jrnl_usercount++;
            $career = $row1['career'];
            $finances = $row1['finances'];
            $health = $row1['health'];
            $relationships = $row1['relationships'];
            $other = $row1['other'];
            $deleted = $row1['deleted'];
$data1 .= <<<EOD
    <tr>
        <td class="left">{$client_key}</td>
        <td class="right">{$career}</td>
        <td class="right">{$finances}</td>
        <td class="right">{$health}</td>
        <td class="right">{$relationships}</td>
        <td class="right">{$other}</td>
        
        <td class="right">{$jrnl_count}</td>
        <td class="right">{$deleted}</td>
    </tr>
EOD;
        }

/**
    LS meditation
*/
        $med_usercount_ls = 0;
        while ($row0 = $Result[1]->fetch_assoc()) {
            $client_key = $row0['client_key'];
            $count = $row0['count'];
            $count_sum_ls += $count; 
            $avg = number_format($row0['avg'] / 60, 2 );
            $med_usercount_ls++;
            $avg_sum_ls += $avg; 
           
$data0_ls .= <<<EOD
    <tr>
        <td class="left">{$client_key}</td>
        <td class="right">{$count}</td>
        <td class="right">{$avg}</td>
    </tr>
EOD;
        }

        $jrnl_usercount_ls = 0;
        while ($row1 = $Result[5]->fetch_assoc()) {
            $client_key = $row1['client_key'];
            $jrnl_count_ls = $row1['count'];
            $jrnl_total_ls += $jrnl_count_ls;
            $jrnl_usercount_ls++;
            $career = $row1['career'];
            $finances = $row1['finances'];
            $health = $row1['health'];
            $relationships = $row1['relationships'];
            $other = $row1['other'];
            $deleted = $row1['deleted'];
$data1_ls .= <<<EOD
    <tr>
        <td class="left">{$client_key}</td>
        <td class="right">{$career}</td>
        <td class="right">{$finances}</td>
        <td class="right">{$health}</td>
        <td class="right">{$relationships}</td>
        <td class="right">{$other}</td>
        
        <td class="right">{$jrnl_count_ls}</td>
        <td class="right">{$deleted}</td>
    </tr>
EOD;
        }

/**
    AS Meditation
*/
        $med_usercount_as = 0;
        while ($row0 = $Result[2]->fetch_assoc()) {
            $client_key = $row0['client_key'];
            $count = $row0['count'];
            $count_sum_as += $count; 
            $avg = number_format($row0['avg'] / 60, 2 );
            $med_usercount_as++;
            $avg_sum_as += $avg; 
           
$data0_as .= <<<EOD
    <tr>
        <td class="left">{$client_key}</td>
        <td class="right">{$count}</td>
        <td class="right">{$avg}</td>
    </tr>
EOD;
        }

        $jrnl_usercount_as= 0;
        while ($row1 = $Result[6]->fetch_assoc()) {
            $client_key = $row1['client_key'];
            $jrnl_count_as = $row1['count'];
            $jrnl_total_as += $jrnl_count_as;
            $jrnl_usercount_as++;
            $career = $row1['career'];
            $finances = $row1['finances'];
            $health = $row1['health'];
            $relationships = $row1['relationships'];
            $other = $row1['other'];
            $deleted = $row1['deleted'];
$data1_as .= <<<EOD
    <tr>
        <td class="left">{$client_key}</td>
        <td class="right">{$career}</td>
        <td class="right">{$finances}</td>
        <td class="right">{$health}</td>
        <td class="right">{$relationships}</td>
        <td class="right">{$other}</td>
        
        <td class="right">{$jrnl_count_as}</td>
        <td class="right">{$deleted}</td>
    </tr>
EOD;
        }

/**
    Madigan
*/
        $med_usercount_md = 0;
        while ($row0 = $Result[3]->fetch_assoc()) {
            $client_key = $row0['client_key'];
            $count = $row0['count'];
            $count_sum_md += $count; 
            $avg = number_format($row0['avg'] / 60, 2 );
            $med_usercount_md++;
            $avg_sum_md += $avg; 
           
$data0_md .= <<<EOD
    <tr>
        <td class="left">{$client_key}</td>
        <td class="right">{$count}</td>
        <td class="right">{$avg}</td>
    </tr>
EOD;
        }

        $jrnl_usercount_md= 0;
        while ($row1 = $Result[7]->fetch_assoc()) {
            $client_key = $row1['client_key'];
            $jrnl_count_md = $row1['count'];
            $jrnl_total_md += $jrnl_count_md;
            $jrnl_usercount_md++;
            $career = $row1['career'];
            $finances = $row1['finances'];
            $health = $row1['health'];
            $relationships = $row1['relationships'];
            $other = $row1['other'];
            $deleted = $row1['deleted'];
$data1_md .= <<<EOD
    <tr>
        <td class="left">{$client_key}</td>
        <td class="right">{$career}</td>
        <td class="right">{$finances}</td>
        <td class="right">{$health}</td>
        <td class="right">{$relationships}</td>
        <td class="right">{$other}</td>
        
        <td class="right">{$jrnl_count_md}</td>
        <td class="right">{$deleted}</td>
    </tr>
EOD;
        }
/**

*/

        while ($row2 = $Result[8]->fetch_assoc()) {
            $survey_count = $row2["survey_count"];
            $survey_count_f = $row2["survey_count_f"];
            $survey_count_m = $row2["survey_count_m"];
            $active_count = $row2["active_count"];
            $average_age = round($row2["average_age"], 2);
            $min_age = $row2["min_age"];
            $max_age = $row2["max_age"];
            $count_f = $row2["count_f"];
            $min_age_f = $row2["min_age_f"];
            $max_age_f = $row2["max_age_f"];
            $average_age_f = round($row2["average_age_f"], 2);
            $count_m = $row2["count_m"];
            $min_age_m = $row2["min_age_m"];
            $max_age_m = $row2["max_age_m"];
            $average_age_m = round($row2["average_age_m"], 2);

            $six_week = $row2['six_week'];
            $got_help = $row2['got_help'];
            $getting_help = $row2['geting_help'];
            $career = $row2['career'];
            $health = $row2['health'];
            $finances = $row2['finances'];
            $relate = $row2['relationships'];
            $other = $row2['other'];
            $med_avg_time = round($row2['med_avg_time'] / 60.0 ,2);
            $med_count = $row2['med_count'];
            $med_avg_count = round($row2['med_avg_count'],2);

            $six_week_m = $row2['six_week_m'];   
            $got_help_m = $row2['got_help_m'];
            $getting_help_m = $row2['geting_help_m'];
            $career_m = $row2['career_m'];
            $health_m = $row2['health_m'];
            $finances_m = $row2['finances_m'];
            $relate_m = $row2['relationships_m'];
            $other_m = $row2['other_m'];
            $med_avg_time_m = round($row2['med_avg_time_m'] / 60.0,2);
            $med_count_m = $row2['med_count_m'];
            $med_avg_count_m = round($row2['med_avg_count_m'],2);

            $six_week_f = $row2['six_week_f'];   
            $got_help_f = $row2['got_help_f'];
            $getting_help_f = $row2['geting_help_f'];
            $career_f = $row2['career_f'];
            $health_f = $row2['health_f'];
            $finances_f = $row2['finances_f'];
            $relate_f = $row2['relationships_f'];
            $other_f = $row2['other_f'];
            $med_avg_time_f = round($row2['med_avg_time_f'] / 60.0,2);
            $med_count_f = $row2['med_count_f'];
            $med_avg_count_f = round($row2['med_avg_count_f'],2);
        }
           
$demoAll .= <<<EOD
    <tr>
        <td class="left">Female</td>
        <td class="center">{$count_f}</td>
        <td class="center">{$min_age_f}</td>
        <td class="center">{$max_age_f}</td>
        <td class="center">{$average_age_f}</td>
        <td class="center">{$got_help_f}</td>
        <td class="center">{$getting_help_f}</td>
        <td class="center">{$six_week_f}</td>
        <td class="center">{$med_avg_count_f}</td>
        <td class="center">{$med_count_f}</td>
        <td class="center">{$med_avg_time_f}</td>
        <td class="center">{$career_f}</td>
        <td class="center">{$finances_f}</td>
        <td class="center">{$health_f}</td>
        <td class="center">{$relate_f}</td>
        <td class="center">{$other_f}</td>

    </tr>
    <tr>
        <td class="left">Male</td>
        <td class="center">{$count_m}</td>
        <td class="center">{$min_age_m}</td>
        <td class="center">{$max_age_m}</td>
        <td class="center">{$average_age_m}</td>
        <td class="center">{$got_help_m}</td>
        <td class="center">{$getting_help_m}</td>
        <td class="center">{$six_week_m}</td>
        <td class="center">{$med_avg_count_m}</td>
        <td class="center">{$med_count_m}</td>
        <td class="center">{$med_avg_time_m}</td>
        <td class="center">{$career_m}</td>
        <td class="center">{$finances_m}</td>
        <td class="center">{$health_m}</td>
        <td class="center">{$relate_m}</td>
        <td class="center">{$other_m}</td>
    </tr>
    <tr>
        <td class="left">All</td>
        <td class="center">{$active_count}</td>
        <td class="center">{$min_age}</td>
        <td class="center">{$max_age}</td>
        <td class="center">{$average_age}</td>
        <td class="center">{$got_help}</td>
        <td class="center">{$getting_help}</td>
        <td class="center">{$six_week}</td>
        <td class="center">{$med_avg_count}</td>
        <td class="center">{$med_count}</td>
        <td class="center">{$med_avg_time}</td>
        <td class="center">{$career}</td>
        <td class="center">{$finances}</td>
        <td class="center">{$health}</td>
        <td class="center">{$relate}</td>
        <td class="center">{$other}</td>
    </tr>
EOD;
        



        /**
           LS DEMOGRAPHICS 
        */
        while ($row2 = $Result[9]->fetch_assoc()) {
            $survey_count = $row2["survey_count"];
            $survey_count_f = $row2["survey_count_f"];
            $survey_count_m = $row2["survey_count_m"];
            $active_count = $row2["active_count"];
            $average_age = round($row2["average_age"], 2);
            $min_age = $row2["min_age"];
            $max_age = $row2["max_age"];
            $count_f = $row2["count_f"];
            $min_age_f = $row2["min_age_f"];
            $max_age_f = $row2["max_age_f"];
            $average_age_f = round($row2["average_age_f"], 2);
            $count_m = $row2["count_m"];
            $min_age_m = $row2["min_age_m"];
            $max_age_m = $row2["max_age_m"];
            $average_age_m = round($row2["average_age_m"], 2);

            $six_week = $row2['six_week'];
            $got_help = $row2['got_help'];
            $getting_help = $row2['geting_help'];
            $career = $row2['career'];
            $health = $row2['health'];
            $finances = $row2['finances'];
            $relate = $row2['relationships'];
            $other = $row2['other'];
            $med_avg_time = round($row2['med_avg_time'] / 60.0 ,2);
            $med_count = $row2['med_count'];
            $med_avg_count = round($row2['med_avg_count'],2);

            $six_week_m = $row2['six_week_m'];   
            $got_help_m = $row2['got_help_m'];
            $getting_help_m = $row2['geting_help_m'];
            $career_m = $row2['career_m'];
            $health_m = $row2['health_m'];
            $finances_m = $row2['finances_m'];
            $relate_m = $row2['relationships_m'];
            $other_m = $row2['other_m'];
            $med_avg_time_m = round($row2['med_avg_time_m'] / 60.0,2);
            $med_count_m = $row2['med_count_m'];
            $med_avg_count_m = round($row2['med_avg_count_m'],2);

            $six_week_f = $row2['six_week_f'];   
            $got_help_f = $row2['got_help_f'];
            $getting_help_f = $row2['geting_help_f'];
            $career_f = $row2['career_f'];
            $health_f = $row2['health_f'];
            $finances_f = $row2['finances_f'];
            $relate_f = $row2['relationships_f'];
            $other_f = $row2['other_f'];
            $med_avg_time_f = round($row2['med_avg_time_f'] / 60.0,2);
            $med_count_f = $row2['med_count_f'];
            $med_avg_count_f = round($row2['med_avg_count_f'],2);
        }
           
$demoLs .= <<<EOD
    <tr>
        <td class="left">Female</td>
        <td class="center">{$count_f}</td>
        <td class="center">{$min_age_f}</td>
        <td class="center">{$max_age_f}</td>
        <td class="center">{$average_age_f}</td>
        <td class="center">{$got_help_f}</td>
        <td class="center">{$getting_help_f}</td>
        <td class="center">{$six_week_f}</td>
        <td class="center">{$med_avg_count_f}</td>
        <td class="center">{$med_count_f}</td>
        <td class="center">{$med_avg_time_f}</td>
        <td class="center">{$career_f}</td>
        <td class="center">{$finances_f}</td>
        <td class="center">{$health_f}</td>
        <td class="center">{$relate_f}</td>
        <td class="center">{$other_f}</td>

    </tr>
    <tr>
        <td class="left">Male</td>
        <td class="center">{$count_m}</td>
        <td class="center">{$min_age_m}</td>
        <td class="center">{$max_age_m}</td>
        <td class="center">{$average_age_m}</td>
        <td class="center">{$got_help_m}</td>
        <td class="center">{$getting_help_m}</td>
        <td class="center">{$six_week_m}</td>
        <td class="center">{$med_avg_count_m}</td>
        <td class="center">{$med_count_m}</td>
        <td class="center">{$med_avg_time_m}</td>
        <td class="center">{$career_m}</td>
        <td class="center">{$finances_m}</td>
        <td class="center">{$health_m}</td>
        <td class="center">{$relate_m}</td>
        <td class="center">{$other_m}</td>
    </tr>
    <tr>
        <td class="left">All</td>
        <td class="center">{$active_count}</td>
        <td class="center">{$min_age}</td>
        <td class="center">{$max_age}</td>
        <td class="center">{$average_age}</td>
        <td class="center">{$got_help}</td>
        <td class="center">{$getting_help}</td>
        <td class="center">{$six_week}</td>
        <td class="center">{$med_avg_count}</td>
        <td class="center">{$med_count}</td>
        <td class="center">{$med_avg_time}</td>
        <td class="center">{$career}</td>
        <td class="center">{$finances}</td>
        <td class="center">{$health}</td>
        <td class="center">{$relate}</td>
        <td class="center">{$other}</td>
    </tr>
EOD;
        

        /**
            Assurance averages
        */

                    while ($row2 = $Result[10]->fetch_assoc()) {
            $survey_count = $row2["survey_count"];
            $survey_count_f = $row2["survey_count_f"];
            $survey_count_m = $row2["survey_count_m"];
            $active_count = $row2["active_count"];
            $average_age = round($row2["average_age"], 2);
            $min_age = $row2["min_age"];
            $max_age = $row2["max_age"];
            $count_f = $row2["count_f"];
            $min_age_f = $row2["min_age_f"];
            $max_age_f = $row2["max_age_f"];
            $average_age_f = round($row2["average_age_f"], 2);
            $count_m = $row2["count_m"];
            $min_age_m = $row2["min_age_m"];
            $max_age_m = $row2["max_age_m"];
            $average_age_m = round($row2["average_age_m"], 2);

            $six_week = $row2['six_week'];
            $got_help = $row2['got_help'];
            $getting_help = $row2['geting_help'];
            $career = $row2['career'];
            $health = $row2['health'];
            $finances = $row2['finances'];
            $relate = $row2['relationships'];
            $other = $row2['other'];
            $med_avg_time = round($row2['med_avg_time'] / 60.0 ,2);
            $med_count = $row2['med_count'];
            $med_avg_count = round($row2['med_avg_count'],2);

            $six_week_m = $row2['six_week_m'];   
            $got_help_m = $row2['got_help_m'];
            $getting_help_m = $row2['geting_help_m'];
            $career_m = $row2['career_m'];
            $health_m = $row2['health_m'];
            $finances_m = $row2['finances_m'];
            $relate_m = $row2['relationships_m'];
            $other_m = $row2['other_m'];
            $med_avg_time_m = round($row2['med_avg_time_m'] / 60.0,2);
            $med_count_m = $row2['med_count_m'];
            $med_avg_count_m = round($row2['med_avg_count_m'],2);

            $six_week_f = $row2['six_week_f'];   
            $got_help_f = $row2['got_help_f'];
            $getting_help_f = $row2['geting_help_f'];
            $career_f = $row2['career_f'];
            $health_f = $row2['health_f'];
            $finances_f = $row2['finances_f'];
            $relate_f = $row2['relationships_f'];
            $other_f = $row2['other_f'];
            $med_avg_time_f = round($row2['med_avg_time_f'] / 60.0,2);
            $med_count_f = $row2['med_count_f'];
            $med_avg_count_f = round($row2['med_avg_count_f'],2);
        }
           
$demoAs .= <<<EOD
    <tr>
        <td class="left">Female</td>
        <td class="center">{$count_f}</td>
        <td class="center">{$min_age_f}</td>
        <td class="center">{$max_age_f}</td>
        <td class="center">{$average_age_f}</td>
        <td class="center">{$got_help_f}</td>
        <td class="center">{$getting_help_f}</td>
        <td class="center">{$six_week_f}</td>
        <td class="center">{$med_avg_count_f}</td>
        <td class="center">{$med_count_f}</td>
        <td class="center">{$med_avg_time_f}</td>
        <td class="center">{$career_f}</td>
        <td class="center">{$finances_f}</td>
        <td class="center">{$health_f}</td>
        <td class="center">{$relate_f}</td>
        <td class="center">{$other_f}</td>

    </tr>
    <tr>
        <td class="left">Male</td>
        <td class="center">{$count_m}</td>
        <td class="center">{$min_age_m}</td>
        <td class="center">{$max_age_m}</td>
        <td class="center">{$average_age_m}</td>
        <td class="center">{$got_help_m}</td>
        <td class="center">{$getting_help_m}</td>
        <td class="center">{$six_week_m}</td>
        <td class="center">{$med_avg_count_m}</td>
        <td class="center">{$med_count_m}</td>
        <td class="center">{$med_avg_time_m}</td>
        <td class="center">{$career_m}</td>
        <td class="center">{$finances_m}</td>
        <td class="center">{$health_m}</td>
        <td class="center">{$relate_m}</td>
        <td class="center">{$other_m}</td>
    </tr>
    <tr>
        <td class="left">All</td>
        <td class="center">{$active_count}</td>
        <td class="center">{$min_age}</td>
        <td class="center">{$max_age}</td>
        <td class="center">{$average_age}</td>
        <td class="center">{$got_help}</td>
        <td class="center">{$getting_help}</td>
        <td class="center">{$six_week}</td>
        <td class="center">{$med_avg_count}</td>
        <td class="center">{$med_count}</td>
        <td class="center">{$med_avg_time}</td>
        <td class="center">{$career}</td>
        <td class="center">{$finances}</td>
        <td class="center">{$health}</td>
        <td class="center">{$relate}</td>
        <td class="center">{$other}</td>
    </tr>
EOD;
        

    


      /**
           Madigan averages
        */

                while ($row2 = $Result[11]->fetch_assoc()) {
            $survey_count = $row2["survey_count"];
            $survey_count_f = $row2["survey_count_f"];
            $survey_count_m = $row2["survey_count_m"];
            $active_count = $row2["active_count"];
            $average_age = round($row2["average_age"], 2);
            $min_age = $row2["min_age"];
            $max_age = $row2["max_age"];
            $count_f = $row2["count_f"];
            $min_age_f = $row2["min_age_f"];
            $max_age_f = $row2["max_age_f"];
            $average_age_f = round($row2["average_age_f"], 2);
            $count_m = $row2["count_m"];
            $min_age_m = $row2["min_age_m"];
            $max_age_m = $row2["max_age_m"];
            $average_age_m = round($row2["average_age_m"], 2);

            $six_week = $row2['six_week'];
            $got_help = $row2['got_help'];
            $getting_help = $row2['geting_help'];
            $career = $row2['career'];
            $health = $row2['health'];
            $finances = $row2['finances'];
            $relate = $row2['relationships'];
            $other = $row2['other'];
            $med_avg_time = round($row2['med_avg_time'] / 60.0 ,2);
            $med_count = $row2['med_count'];
            $med_avg_count = round($row2['med_avg_count'],2);

            $six_week_m = $row2['six_week_m'];   
            $got_help_m = $row2['got_help_m'];
            $getting_help_m = $row2['geting_help_m'];
            $career_m = $row2['career_m'];
            $health_m = $row2['health_m'];
            $finances_m = $row2['finances_m'];
            $relate_m = $row2['relationships_m'];
            $other_m = $row2['other_m'];
            $med_avg_time_m = round($row2['med_avg_time_m'] / 60.0,2);
            $med_count_m = $row2['med_count_m'];
            $med_avg_count_m = round($row2['med_avg_count_m'],2);

            $six_week_f = $row2['six_week_f'];   
            $got_help_f = $row2['got_help_f'];
            $getting_help_f = $row2['geting_help_f'];
            $career_f = $row2['career_f'];
            $health_f = $row2['health_f'];
            $finances_f = $row2['finances_f'];
            $relate_f = $row2['relationships_f'];
            $other_f = $row2['other_f'];
            $med_avg_time_f = round($row2['med_avg_time_f'] / 60.0,2);
            $med_count_f = $row2['med_count_f'];
            $med_avg_count_f = round($row2['med_avg_count_f'],2);
        }
           
$demomd .= <<<EOD
    <tr>
        <td class="left">Female</td>
        <td class="center">{$count_f}</td>
        <td class="center">{$min_age_f}</td>
        <td class="center">{$max_age_f}</td>
        <td class="center">{$average_age_f}</td>
        <td class="center">{$got_help_f}</td>
        <td class="center">{$getting_help_f}</td>
        <td class="center">{$six_week_f}</td>
        <td class="center">{$med_avg_count_f}</td>
        <td class="center">{$med_count_f}</td>
        <td class="center">{$med_avg_time_f}</td>
        <td class="center">{$career_f}</td>
        <td class="center">{$finances_f}</td>
        <td class="center">{$health_f}</td>
        <td class="center">{$relate_f}</td>
        <td class="center">{$other_f}</td>

    </tr>
    <tr>
        <td class="left">Male</td>
        <td class="center">{$count_m}</td>
        <td class="center">{$min_age_m}</td>
        <td class="center">{$max_age_m}</td>
        <td class="center">{$average_age_m}</td>
        <td class="center">{$got_help_m}</td>
        <td class="center">{$getting_help_m}</td>
        <td class="center">{$six_week_m}</td>
        <td class="center">{$med_avg_count_m}</td>
        <td class="center">{$med_count_m}</td>
        <td class="center">{$med_avg_time_m}</td>
        <td class="center">{$career_m}</td>
        <td class="center">{$finances_m}</td>
        <td class="center">{$health_m}</td>
        <td class="center">{$relate_m}</td>
        <td class="center">{$other_m}</td>
    </tr>
    <tr>
        <td class="left">All</td>
        <td class="center">{$active_count}</td>
        <td class="center">{$min_age}</td>
        <td class="center">{$max_age}</td>
        <td class="center">{$average_age}</td>
        <td class="center">{$got_help}</td>
        <td class="center">{$getting_help}</td>
        <td class="center">{$six_week}</td>
        <td class="center">{$med_avg_count}</td>
        <td class="center">{$med_count}</td>
        <td class="center">{$med_avg_time}</td>
        <td class="center">{$career}</td>
        <td class="center">{$finances}</td>
        <td class="center">{$health}</td>
        <td class="center">{$relate}</td>
        <td class="center">{$other}</td>
    </tr>
EOD;

        $avg_med_total = round($avg_sum / $med_usercount, 2);
        $avg_jrnl_total = round($jrnl_total / $jrnl_usercount, 2);

        $avg_med_total_ls = round($avg_sum_ls / $med_usercount_ls, 2);
        $avg_jrnl_total_ls = round($jrnl_total_ls / $jrnl_usercount_ls, 2);

        $avg_med_total_as = round($avg_sum_as / $med_usercount_as, 2);
        $avg_jrnl_total_as = round($jrnl_total_as / $jrnl_usercount_as, 2);

        $avg_med_total_md = round($avg_sum_md / $med_usercount_md, 2);
        $avg_jrnl_total_md = round($jrnl_total_md / $jrnl_usercount_md, 2);
    }


    





$additionalCSS .= <<<EOD
    
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
                <h1>Welcome to the Sinaprite Dashboard.</h1>
            </div>
             <div class="reporting"> 
                <table width="600">
                    <tr>
                        <td colspan="18" class="titlerow">Active Demographics All</td>    
                    </tr>
                    <tr>
                        <th></th>
                        <th>Active<br/>Users<br/>Count</th>
                        <th>Min<br/>(active)<br/>Age</th>
                        <th>Max<br/>(active)<br/>Age</th>
                        <th>Average<br/>(active)<br/>Age</th>
                        <th>Received<br/>Help<br/>Before</th>
                        <th>Receiving<br/>Help<br/>Now</th>
                        <th># of Days<br/>Post<br/>6 Weeks</th>
                        <th>Average<br/># of Meditation Sessions</th>
                        <th># of Meditation<br/>Sessions</th>
                        <th>Average<br/>Meditation Time <br> in minutes</th>
                        <th>Total<br/>Career</th>
                        <th>Total<br/>Finances</th>
                        <th>Total<br/>Health</th>
                        <th>Total<br/>Relationships</th>
                        <th>Total<br/>Other</th>
                    </tr>
                    {$demoAll}
                </table>
            </div>
            <div class="reporting"> 
                <table width="600">
                    <tr>
                        <td colspan="8" class="titlerow">Active Demographics Litesprite</td>    
                    </tr>
                    <tr>
                        <th></th>
                        <th>Active<br/>Users<br/>Count</th>
                        <th>Min<br/>(active)<br/>Age</th>
                        <th>Max<br/>(active)<br/>Age</th>
                        <th>Average<br/>(active)<br/>Age</th>
                        <th>Received<br/>Help<br/>Before</th>
                        <th>Receiving<br/>Help<br/>Now</th>
                        <th># of Days<br/>Post<br/>6 Weeks</th>
                        <th>Average # of<br/>Meditation Sessions</th>
                        <th># of Meditation<br/>Sessions</th>
                        <th>Average<br/>Meditation Time <br> in minutes</th>
                        <th>Total<br/>Career</th>
                        <th>Total<br/>Finances</th>
                        <th>Total<br/>Health</th>
                        <th>Total<br/>Relationships</th>
                        <th>Total<br/>Other</th>
                    </tr>
                    {$demoLs}
                </table>
            </div>
            <div class="reporting"> 
                <table width="600">
                    <tr>
                        <td colspan="8" class="titlerow">Active Demographics Assurance</td>    
                    </tr>
                    <tr>
                        <th></th>
                        <th>Active<br/>Users<br/>Count</th>
                        <th>Min<br/>(active)<br/>Age</th>
                        <th>Max<br/>(active)<br/>Age</th>
                        <th>Average<br/>(active)<br/>Age</th>
                        <th>Received<br/>Help<br/>Before</th>
                        <th>Receiving<br/>Help<br/>Now</th>
                        <th># of Days<br/>Post<br/>6 Weeks</th>
                        <th>Average<br/># of Meditation Sessions</th>
                        <th># of Meditation<br/>Sessions</th>
                        <th>Average<br/>Meditation Time <br> in minutes</th>
                        <th>Total<br/>Career</th>
                        <th>Total<br/>Finances</th>
                        <th>Total<br/>Health</th>
                        <th>Total<br/>Relationships</th>
                        <th>Total<br/>Other</th>
                    </tr>
                    {$demoAs}
                </table>
            </div>

            <div class="reporting"> 
                <table width="600">
                    <tr>
                        <td colspan="8" class="titlerow">Active Demographics Madigan</td>    
                    </tr>
                    <tr>
                        <th></th>
                        <th>Active<br/>Users<br/>Count</th>
                        <th>Min<br/>(active)<br/>Age</th>
                        <th>Max<br/>(active)<br/>Age</th>
                        <th>Average<br/>(active)<br/>Age</th>
                        <th>Received<br/>Help<br/>Before</th>
                        <th>Receiving<br/>Help<br/>Now</th>
                        <th># of Days<br/>Post<br/>6 Weeks</th>
                        <th>Average<br/># of Meditation Sessions</th>
                        <th># of Meditation<br/>Sessions</th>
                        <th>Average<br/>Meditation Time <br> in minutes</th>
                        <th>Total<br/>Career</th>
                        <th>Total<br/>Finances</th>
                        <th>Total<br/>Health</th>
                        <th>Total<br/>Relationships</th>
                        <th>Total<br/>Other</th>
                    </tr>
                    {$demomd}
                </table>
            </div>

            <div class="reportlegend"> 
                <table width="600px">
                    <tr>
                        <th colspan="2">NOTE: 'Active' is defined as "having used the Sinasprite App."  </th>
                    </tr>
                </table>
            </div>

            <div class="reporting"> 
                <table width="600">
                    <tr>
                        <td colspan="3" class="titlerow">Meditation Summary by Player </td>
                    </tr>
                    <tr>
                        <th>Client Key</th>
                        <th>Session Count</th>
                        <th>Avg. Time (minutes)</th>
                    </tr>
                    {$data0}
                    <tr>
                        <th colspan="3">Player Count: {$med_usercount}</th>
                    </tr>
                    <tr>
                        <th colspan="3">Total Sessions: {$count_sum}</th>
                    </tr>
                    <tr>
                        <th colspan="3">Avg. Session : {$avg_med_total}</th>
                    </tr>
                    
                </table>
            </div>

            <div class="reporting"> 
                <table width="600">
                    <tr>
                        <td colspan="3" class="titlerow">Meditation - Litesprite</td>
                    </tr>
                    <tr>
                        <th>Client Key</th>
                        <th>Session Count</th>
                        <th>Avg. Time (minutes)</th>
                    </tr>
                    {$data0_ls}
                    <tr>
                        <th colspan="3">Player Count: {$med_usercount_ls}</th>
                    </tr>
                    <tr>
                        <th colspan="3">Total Sessions: {$count_sum_ls}</th>
                    </tr>
                    <tr>
                        <th colspan="3">Avg. Session : {$avg_med_total_ls}</th>
                    </tr>
                    
                </table>
            </div>

            <div class="reporting"> 
                <table width="600">
                    <tr>
                        <td colspan="3" class="titlerow">Meditation - Assurance</td>
                    </tr>
                    <tr>
                        <th>Client Key</th>
                        <th>Session Count</th>
                        <th>Avg. Time (minutes)</th>
                    </tr>
                    {$data0_as}
                    <tr>
                        <th colspan="3">Player Count: {$med_usercount_as}</th>
                    </tr>
                    <tr>
                        <th colspan="3">Total Sessions: {$count_sum_as}</th>
                    </tr>
                    <tr>
                        <th colspan="3">Avg. Session : {$avg_med_total_as}</th>
                    </tr>
                    
                </table>
            </div>


            <div class="reporting"> 
                <table width="600">
                    <tr>
                        <td colspan="3" class="titlerow">Meditation - Madigan</td>
                    </tr>
                    <tr>
                        <th>Client Key</th>
                        <th>Session Count</th>
                        <th>Avg. Time (minutes)</th>
                    </tr>
                    {$data0_md}
                    <tr>
                        <th colspan="3">Player Count: {$med_usercount_md}</th>
                    </tr>
                    <tr>
                        <th colspan="3">Total Sessions: {$count_sum_md}</th>
                    </tr>
                    <tr>
                        <th colspan="3">Avg. Session : {$avg_med_total_md}</th>
                    </tr>
                    
                </table>
            </div>

            <div class="reporting"> 
                <table width="600">
                    <tr>
                        <td colspan="8" class="titlerow">Journal Summary by Player - All</td>    
                    </tr>
                    <tr>
                        <th>Client Key</th>
                        <th>Career</th>
                        <th>Finances</th>
                        <th>Health</th>
                        <th>Relationships</th>
                        <th>Other</th>
                        <th>Count</th>
                        <th>Deleted</th>
                    </tr>
                    {$data1}
                    <tr>
                        <th colspan="8">Player Count: {$jrnl_usercount}</th>
                    </tr>
                    <tr>
                        <th colspan="8">Total Journals: {$jrnl_total}</th>
                    </tr>
                    <tr>
                        <th colspan="8">Avg. Journals / Player : {$avg_jrnl_total}</th>
                    </tr>

                </table>
            </div>

            <div class="reporting"> 
                <table width="600">
                    <tr>
                        <td colspan="8" class="titlerow">Journal Summary by Player - Litesprite</td>    
                    </tr>
                    <tr>
                        <th>Client Key</th>
                        <th>Career</th>
                        <th>Finances</th>
                        <th>Health</th>
                        <th>Relationships</th>
                        <th>Other</th>
                        <th>Count</th>
                        <th>Deleted</th>
                    </tr>
                    {$data1_ls}
                    <tr>
                        <th colspan="8">Player Count: {$jrnl_usercount_ls}</th>
                    </tr>
                    <tr>
                        <th colspan="8">Total Journals: {$jrnl_total_ls}</th>
                    </tr>
                    <tr>
                        <th colspan="8">Avg. Journals / Player : {$avg_jrnl_total_ls}</th>
                    </tr>

                </table>
            </div>

            <div class="reporting"> 
                <table width="600">
                    <tr>
                        <td colspan="8" class="titlerow">Journal Summary by Player - Assurance</td>    
                    </tr>
                    <tr>
                        <th>Client Key</th>
                        <th>Career</th>
                        <th>Finances</th>
                        <th>Health</th>
                        <th>Relationships</th>
                        <th>Other</th>
                        <th>Count</th>
                        <th>Deleted</th>
                    </tr>
                    {$data1_as}
                    <tr>
                        <th colspan="8">Player Count: {$jrnl_usercount_as}</th>
                    </tr>
                    <tr>
                        <th colspan="8">Total Journals: {$jrnl_total_as}</th>
                    </tr>
                    <tr>
                        <th colspan="8">Avg. Journals / Player : {$avg_jrnl_total_as}</th>
                    </tr>

                </table>
            </div>
            <div class="reporting"> 
                <table width="600">
                    <tr>
                        <td colspan="8" class="titlerow">Journal Summary by Player - Madigan</td>    
                    </tr>
                    <tr>
                        <th>Client Key</th>
                        <th>Career</th>
                        <th>Finances</th>
                        <th>Health</th>
                        <th>Relationships</th>
                        <th>Other</th>
                        <th>Count</th>
                        <th>Deleted</th>
                    </tr>
                    {$data1_md}
                    <tr>
                        <th colspan="8">Player Count: {$jrnl_usercount_md}</th>
                    </tr>
                    <tr>
                        <th colspan="8">Total Journals: {$jrnl_total_md}</th>
                    </tr>
                    <tr>
                        <th colspan="8">Avg. Journals / Player : {$avg_jrnl_total_md}</th>
                    </tr>

                </table>
            </div>

            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;
?>

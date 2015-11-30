<?php 
require_once("./include/config.inc.php");
require_once('./include/mysqli.inc.php');
require_once("./include/utils.inc.php");
require_once('./include/header.php');
require_once('./include/footer.php');

if ((isset($_SESSION['user_key']) == false) || (strlen($_SESSION['user_key']) < 1)) {
	header('Location: /login');	
}

$additionalCSS .= <<<EOD
    
EOD;


$additionalJS.= <<<EOD

EOD;
$createuser = "";
if ((isset($_SESSION['company_id']) == true) && ($_SESSION['company_id']) == 1) {
    if(isset($_SESSION['user_role_id']) && ($_SESSION['user_role_id'] == '0' || ($_SESSION['user_role_id'] == '1'))) {
        $createuser .= '<p><a href="/manageusers">Manage Report Users</a> - View and manage user who can view reports</p>';
    }

$tabledumps .= <<<EOD
            <div class="pagetitle">
                <h1>Sinasprite Table Dump (raw)</h1>
            </div> 
            <div class="reportlist">            
                <p>Pilot Activity Log raw data [<a href="/rawdata/activity_log/200">Limit 200</a>] [<a href="/rawdata/activity_log/all">All rows</a>]</p>
                <p>Pilot Journal raw data [<a href="/rawdata/anxieties/200">Limit 200</a>] [<a href="/rawdata/anxieties/all">All rows</a>]</p>
                <p>Pilot Meditation raw data [<a href="/rawdata/meditation/200">Limit 200</a>] [<a href="/rawdata/meditation/all">All rows</a>]</p>
                <p>Pilot Meditation Painting raw data [<a href="/rawdata/paintings/200">Limit 200</a>] [<a href="/rawdata/paintings/all">All rows</a>]</p>
                <p>Pilot Oracle raw data [<a href="/rawdata/questions/200">Limit 200</a>] [<a href="/rawdata/questions/all">All rows</a>]</p>            
                <p>User Graph Totals by User: <input id="client_key" name="client_key" value=""/><a class="actionbutton" onClick="window.location.href='/usersurveydata/'+document.getElementById('client_key').value;">GO</a></p>
            </div>
            <div class="pagetitle">
                <h1>Sinasprite Table Data (Filtered / Client Key)</h1>
            </div> 
            <div class="reportlist">
                <p>Litesprite Pilot Activity Log raw data 
                <input id="actlog_client_key" name="actlog_client_key" value=""/>
                <a class="actionbutton" onClick="window.location.href='/sinasprite_activity_org/2/'+document.getElementById('actlog_client_key').value;">By Player</a>
                [<a href="/sinasprite_activity_org/2">All Litesprite Pilot Players</a>]
                </p>
                <p>Madigan Pilot Activity Log raw data 
                <input id="madactlog_client_key" name="madactlog_client_key" value=""/>
                <a class="actionbutton" onClick="window.location.href='/sinasprite_activity_org/5/'+document.getElementById('madactlog_client_key').value;">By Player</a>
                [<a href="/sinasprite_activity_org/5">All Madigan Pilot Players</a>]
                </p>
                <p>Journal Table Dump By Org [<a href="/td_journal/2">Litesprite</a>] [<a href="/td_journal/5">Madigan</a>]</p>            
                <p>Oracle Questions Table Dump By Org [<a href="/td_questions/2">Litesprite</a>] [<a href="/td_questions/5">Madigan</a>]</p>            
                <p>Meditation Table Dump By Org [<a href="/td_meditation/2">Litesprite</a>] [<a href="/td_meditation/5">Madigan</a>]</p>            
            </div>
EOD;



$body .= <<<EOD
	{$header}
    <div class="colmask fullpage">
        <div class="col1 center">

            <div class="pagetitle">
                <h1>Litesprite General Reports</h1>
            </div>
            <div class="reportlist">
                <p><a href="/rpt_email_join">Website Email Sign-up</a></p>
                <p><a href="/rpt_signup_status">User Onboarding Dates</a></p>
                <p><a href="/rpt_device_info">User Device Information</a></p>
                {$createuser}
            </div>

            <div class="pagetitle">
                <h1>Litesprite Survey Reports</h1>
            </div>
            <div class="reportlist">
                <p>Survey Dashboard : Summary of survey participants by gender/age.<a href="/dashboard/1">[Baseline]</a><a href="/dashboard/2>[6-Week]</a><a href="/dashboard/3">[12-Week]</a></p>
                <p>Pilot 1 Demographic results <a href="/rpt_base_sum/1">[Baseline]</a> <a href="/rpt_base_sum/2">[6-Week]</a> <a href="/rpt_base_sum/3">[12-Week]</a></p>
                <p>Pilot 1 Medical &amp; Psychiatric History results <a href="/rpt_pmph_sum/1">[Baseline]</a> <a href="/rpt_pmph_sum/2">[6-Week]</a> <a href="/rpt_pmph_sum/3">[12-Week]</a></p>
                <p>Pilot 1 Survey Results (CSE) <a href="/rpt_cse_sum/1">[Baseline]</a> <a href="/rpt_cse_sum/2">[6-Week]</a> <a href="/rpt_cse_sum/3">[12-Week]</a></p>
                <p>Pilot 1 Survey Results (GAD) <a href="/rpt_gad_sum/1">[Baseline]</a> <a href="/rpt_gad_sum/2">[6-Week]</a> <a href="/rpt_gad_sum/3">[12-Week]</a></p>
                <p>Pilot 1 Survey Results (LSQ) <a href="/rpt_lsq_sum/1">[Baseline]</a> <a href="/rpt_lsq_sum/2">[6-Week]</a> <a href="/rpt_lsq_sum/3">[12-Week]</a></p>
                <p>Pilot 1 Survey Results (PHQ) <a href="/rpt_phq_sum/1">[Baseline]</a> <a href="/rpt_phq_sum/2">[6-Week]</a> <a href="/rpt_phq_sum/3">[12-Week]</a></p>
                <p>Pilot 1 Survey Results (PSS) <a href="/rpt_pss_sum/1">[Baseline]</a> <a href="/rpt_pss_sum/2">[6-Week]</a> <a href="/rpt_pss_sum/3">[12-Week]</a></p>
            </div>
            <div class="pagetitle">
                <h1>Sinasprite Reports</h1>
            </div>
            <div class="reportlist">
                <p><a href="/sinasprite_dashboard">Sinasprite Dashboard</a> Metrics and Summary for Sinasprite App .</p>
                <p><a href='/userGraphTotals'>Summary Player Assessment Results</a></p>
                <p><a href="/rptmeditationbyday">Sinasprite Meditation Time By Day</a> : Summary of meditation time use by day.</p>
                <p><a href="/rptjournaloverview">Sinasprite Journal Overview</a> : Summary of Journal use active/closed.</p>
                <p><a href="/rptpaintingoverview">Sinasprite Painting Overview</a> : Summary of Painting results.</p>
                <p><a href="/sinasprite_activity_log">Sinasprite Activity Log by Date</a> Sinasprite Activity by Activity Date.</p>
                <p><a href="/sinasprite_activity_user">Sinasprite Activity Log by User</a> Sinasprite Activity by Client Key.</p>
                <p><a href="/rptUsageTimeline">Sinasprite Pilot Usage Timeline</a> Sinasprite Activity Log Timeline.</p>

            </div>
{$tabledumps}
            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;
}

else if  ((isset($_SESSION['organization_id']) == true)) {
$body .= "Organization: {$_SESSION['organization_id']}";
}

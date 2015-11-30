<?php 
require_once("include/config.inc.php");
require_once('include/mysqli.inc.php');
require_once("include/utils.inc.php");
require_once('include/header.php');
require_once('include/footer.php');


// echo isset($_SESSION['user_key'])."<br/>";
// echo strlen($_SESSION['user_key'])."<br/>";

if ((isset($_SESSION['user_key']) == false) || (strlen($_SESSION['user_key']) < 1)) {
	header('Location: /login');
}

if (strlen($args[1]) < 1) {
    $client_key = 'null';
} else {
    $client_key = $args[1];
}

	//Validate the user
	$sql = "CALL rptPMPHbyUser(".sql_escape_string($client_key, 1).");";
	//echo $sql.'<br/>';
	 
	$Result = execute_query($mysqli, $sql);	
	$i=1;
	if ($Result) {
		while ($row = $Result[0]->fetch_assoc()) {
			$pmph1 = evalYN($row['pmph1']);
			
			for ($i=97; $i < 116; $i++) { 
				switch ($row['pmph2'.chr($i)]) {
					case NULL:
						$pmph2[$i-96] = "";
						break;
					case 0:
						$pmph2[$i-96] = "No";
						break;
					case 1:
						$pmph2[$i-96] = "Yes";
						break;
					case 99:
						$pmph2[$i-96] = "Don't Know";
						break;
				}
			}
			
			$pmph2ayear = $row['pmph2ayear'];
			$pmph2apast = $row['pmph2apast'];
			$pmph2b = $row['pmph2b'];
			$pmph2byear = $row['pmph2byear'];
			$pmph2bpast = $row['pmph2bpast'];
			$pmph2c = $row['pmph2c'];
			$pmph2cyear = $row['pmph2cyear'];
			$pmph2cpast = $row['pmph2cpast'];
			$pmph2d = $row['pmph2d'];
			$pmph2dyear = $row['pmph2dyear'];
			$pmph2dpast = $row['pmph2dpast'];
			$pmph2e = $row['pmph2e'];
			$pmph2eyear = $row['pmph2eyear'];
			$pmph2epast = $row['pmph2epast'];
			$pmph2f = $row['pmph2f'];
			$pmph2fyear = $row['pmph2fyear'];
			$pmph2fpast = $row['pmph2fpast'];
			$pmph2g = $row['pmph2g'];
			$pmph2gyear = $row['pmph2gyear'];
			$pmph2gpast = $row['pmph2gpast'];
			$pmph2h = $row['pmph2h'];
			$pmph2hyear = $row['pmph2hyear'];
			$pmph2hpast = $row['pmph2hpast'];
			$pmph2i = $row['pmph2i'];
			$pmph2iyear = $row['pmph2iyear'];
			$pmph2ipast = $row['pmph2ipast'];
			$pmph2j = $row['pmph2j'];
			$pmph2jyear = $row['pmph2jyear'];
			$pmph2jpast = $row['pmph2jpast'];
			$pmph2k = $row['pmph2k'];
			$pmph2kyear = $row['pmph2kyear'];
			$pmph2kpast = $row['pmph2kpast'];
			$pmph2l = $row['pmph2l'];
			$pmph2lyear = $row['pmph2lyear'];
			$pmph2lpast = $row['pmph2lpast'];
			$pmph2m = $row['pmph2m'];
			$pmph2myear = $row['pmph2myear'];
			$pmph2mpast = $row['pmph2mpast'];
			$pmph2n = $row['pmph2n'];
			$pmph2nyear = $row['pmph2nyear'];
			$pmph2npast = $row['pmph2npast'];
			$pmph2o = $row['pmph2o'];
			$pmph2oyear = $row['pmph2oyear'];
			$pmph2opast = $row['pmph2opast'];
			$pmph2p = $row['pmph2p'];
			$pmph2pyear = $row['pmph2pyear'];
			$pmph2ppast = $row['pmph2ppast'];
			$pmph2q = $row['pmph2q'];
			$pmph2qyear = $row['pmph2qyear'];
			$pmph2qpast = $row['pmph2qpast'];
			$pmph2r = $row['pmph2r'];
			$pmph2ryear = $row['pmph2ryear'];
			$pmph2rpast = $row['pmph2rpast'];
			$pmph2s = $row['pmph2s'];
			$pmph2syear = $row['pmph2syear'];
			$pmph2spast = $row['pmph2spast'];

			$pmph3 = evalYN($row['pmph3']);
			$pmph3a = $row['pmph3a'];

			$pmph4 = evalYN($row['pmph4']);
			$pmph4ayear = $row['pmph4ayear'];
			$pmph4atreatment = $row['pmph4atreatment'];
			$pmph4byear = $row['pmph4byear'];
			$pmph4btreatment = $row['pmph4btreatment'];
			$pmph4cyear = $row['pmph4cyear'];
			$pmph4ctreatment = $row['pmph4ctreatment'];

			$pmph5a = evalYN($row['pmph5a']);	
			$pmph5atime = $row['pmph5atime'];
			$pmph5b = evalYN($row['pmph5b']);
			$pmph5btime = $row['pmph5btime'];
			$pmph5c = evalYN($row['pmph5c']);
			$pmph5ctime = $row['pmph5ctime'];
			$pmph5d = evalYN($row['pmph5d']);
			$pmph5dtime = $row['pmph5dtime'];
			$pmph5e = evalYN($row['pmph5e']);
			$pmph5etime = $row['pmph5etime'];

			$pmph5f = eval5($row['pmph5f']);
			$pmph5g = eval5($row['pmph5g']);
			$pmph5h = eval5($row['pmph5h']);
			$pmph5i = eval5($row['pmph5i']);
			$pmph6aname = $row['pmph6aname'];
			$pmph6apurpose = $row['pmph6apurpose'];
			$pmph6adosage = $row['pmph6adosage'];
			$pmph6bname = $row['pmph6bname'];
			$pmph6bpurpose = $row['pmph6bpurpose'];
			$pmph6bdosage = $row['pmph6bdosage'];
			$pmph6cname = $row['pmph6cname'];
			$pmph6cpurpose = $row['pmph6cpurpose'];
			$pmph6cdosage = $row['pmph6cdosage'];
			$pmph6dname = $row['pmph6dname'];
			$pmph6dpurpose = $row['pmph6dpurpose'];
			$pmph6ddosage = $row['pmph6ddosage'];
			$pmph6ename = $row['pmph6ename'];
			$pmph6epurpose = $row['pmph6epurpose'];
			$pmph6edosage = $row['pmph6edosage'];
			$pmph6fname = $row['pmph6fname'];
			$pmph6fpurpose = $row['pmph6fpurpose'];
			$pmph6fdosage = $row['pmph6fdosage'];
			$pmph6gname = $row['pmph6gname'];
			$pmph6gpurpose = $row['pmph6gpurpose'];
			$pmph6gdosage = $row['pmph6gdosage'];
			$pmph6hname = $row['pmph6hname'];
			$pmph6hpurpose = $row['pmph6hpurpose'];
			$pmph6hdosage = $row['pmph6hdosage'];
			$pmph6iname = $row['pmph6iname'];
			$pmph6ipurpose = $row['pmph6ipurpose'];
			$pmph6idosage = $row['pmph6idosage'];
			$pmph6jname = $row['pmph6jname'];
			$pmph6jpurpose = $row['pmph6jpurpose'];
			$pmph6jdosage = $row['pmph6jdosage'];
		}
	}
	
$report_data .= <<<EOD
<table  width="800px">
	<tr>
		<td class="titlerow left" colspan="2">PMPH By User: {$client_key}  <span class="titlenote"><a href="/rpt_pmph_sum/{$survey_id}">(View Summary Report)</a></span></td>
	</tr>
	<tr>
		<td class="left">Do you receive regular medical care from a physician or clinic?</td><td style="width: 80px;">{$pmph1}</td>
	</tr>
</table>
<p>&nbsp;<p/>
<table  width="800px">
	<tr>
		<th class="left">Have you ever been told you had or currently have any of the following medical conditions</th><th style="width: 80px;"></th><th style="width: 80px;">Year</th><th style="width: 80px;">Treatment</th>
	</tr>
	<tr>
		<td class="left">a. Heart Disease</td><td style="width: 80px;">{$pmph2[1]}</td><td style="width: 80px;">{$pmph2ayear}</td><td style="width: 80px;">{$pmph2apast}</td>
	</tr>
	<tr>
		<td class="left">b. High Blood Pressure</td><td style="width: 80px;">{$pmph2[2]}</td><td style="width: 80px;">{$pmph2byear}</td><td style="width: 80px;">{$pmph2bpast}</td>
	</tr>
	<tr>
		<td class="left">c. Diabetes or High Blood Sugar</td><td style="width: 80px;">{$pmph2[3]}</td><td style="width: 80px;">{$pmph2cyear}</td><td style="width: 80px;">{$pmph2cpast}</td>
	</tr>
	<tr>
		<td class="left">d. Cancer</td><td style="width: 80px;">{$pmph2[4]}</td><td style="width: 80px;">{$pmph2dyear}</td><td style="width: 80px;">{$pmph2dpast}</td>
	</tr>
	<tr>
		<td class="left">e. Thyroid Disease</td><td style="width: 80px;">{$pmph2[5]}</td><td style="width: 80px;">{$pmph2eyear}</td><td style="width: 80px;">{$pmph2epast}</td>
	</tr>
	<tr>
		<td class="left">f. Stroke</td><td style="width: 80px;">{$pmph2[6]}</td><td style="width: 80px;">{$pmph2fyear}</td><td style="width: 80px;">{$pmph2fpast}</td>
	</tr>
	<tr>
		<td class="left">g. Gout</td><td style="width: 80px;">{$pmph2[7]}</td><td style="width: 80px;">{$pmph2gyear}</td><td style="width: 80px;">{$pmph2gpast}</td>
	</tr>
	<tr>
		<td class="left">h. High Cholesterol</td><td style="width: 80px;">{$pmph2[8]}</td><td style="width: 80px;">{$pmph2hyear}</td><td style="width: 80px;">{$pmph2hpast}</td>
	</tr>
	<tr>
		<td class="left">i. Hormone Problem</td><td style="width: 80px;">{$pmph2[9]}</td><td style="width: 80px;">{$pmph2iyear}</td><td style="width: 80px;">{$pmph2ipast}</td>
	</tr>
	<tr>
		<td class="left">j. Asthma</td><td style="width: 80px;">{$pmph2[10]}</td><td style="width: 80px;">{$pmph2jyear}</td><td style="width: 80px;">{$pmph2jpast}</td>
	</tr>
	<tr>
		<td class="left">k. Tuberculosis</td><td style="width: 80px;">{$pmph2[11]}</td><td style="width: 80px;">{$pmph2kyear}</td><td style="width: 80px;">{$pmph2kpast}</td>
	</tr>
	<tr>
		<td class="left">l. Kidney Disease</td><td style="width: 80px;">{$pmph2[12]}</td><td style="width: 80px;">{$pmph2lyear}</td><td style="width: 80px;">{$pmph2lpast}</td>
	</tr>
	<tr>
		<td class="left">m. Peptic Ulcers</td><td style="width: 80px;">{$pmph2[13]}</td><td style="width: 80px;">{$pmph2myear}</td><td style="width: 80px;">{$pmph2mpast}</td>
	</tr>
	<tr>
		<td class="left">n. Gall Bladder Problems</td><td style="width: 80px;">{$pmph2[14]}</td><td style="width: 80px;">{$pmph2nyear}</td><td style="width: 80px;">{$pmph2npast}</td>
	</tr>
	<tr>
		<td class="left">o. Spinal cord, neck or head injury</td><td style="width: 80px;">{$pmph2[15]}</td><td style="width: 80px;">{$pmph2oyear}</td><td style="width: 80px;">{$pmph2opast}</td>
	</tr>
	<tr>
		<td class="left">p. Back problem</td><td style="width: 80px;">{$pmph2[16]}</td><td style="width: 80px;">{$pmph2pyear}</td><td style="width: 80px;">{$pmph2ppast}</td>
	</tr>
	<tr>
		<td class="left">q. Depression</td><td style="width: 80px;">{$pmph2[17]}</td><td style="width: 80px;">{$pmph2qyear}</td><td style="width: 80px;">{$pmph2qpast}</td>
	</tr>
	<tr>
		<td class="left">r. Eating Disorder</td><td style="width: 80px;">{$pmph2[18]}</td><td style="width: 80px;">{$pmph2ryear}</td><td style="width: 80px;">{$pmph2rpast}</td>
	</tr>
	<tr>
		<td class="left">s. Anxiety or Stress</td><td style="width: 80px;">{$pmph2[19]}</td><td style="width: 80px;">{$pmph2syear}</td><td style="width: 80px;">{$pmph2spast}</td>
	</tr>
</table>
<p>&nbsp;<p/>
<table  width="800px">
	<tr>
		<td class="left">Have you had any other disease? </td><td style="width: 80px;">{$pmph3}</td>
	</tr>
	<tr>
		<td class="left" colspan="2">Describe: {$pmph3a}</td>
	</tr>
</table>
<p>&nbsp;<p/>
<table  width="800px">
	<tr>
		<td class="left">Have you ever received any psychiatric or psychological treatment? </td><td >{$pmph4}</td>
	</tr>
</table>
<table  width="800px">
	<tr>
		<th class="left">Year</th><th>Treatment</th>
	</tr>
	<tr>
		<td class="left">{$pmph4ayear}</td><td>{$pmph4atreatment}</td>
	</tr>
	<tr>
		<td class="left">{$pmph4byear}</td><td>{$pmph4btreatment}</td>
	</tr>
	<tr>
		<td class="left">{$pmph4cyear}</td><td>{$pmph4ctreatment}</td>
	</tr>
</table>
<p>&nbsp;<p/>
<table  width="800px">
	<tr>
		<th class="left">Have you been told by a health care provider that you have or had:</th><th style="width: 80px;"></th><th style="width: 80px;">How Long</th>
	</tr>
	<tr>
		<td class="left">a. Major Depression</td><td style="width: 80px;">{$pmph5a}</td><td style="width: 80px;">{$pmph5atime}</td>
	</tr>
	<tr>
		<td class="left">b. Anxiety Disorder</td><td style="width: 80px;">{$pmph5b}</td><td style="width: 80px;">{$pmph5btime}</td>
	</tr>
	<tr>
		<td class="left">c. Schizophrenia/Personality Disorder</td><td style="width: 80px;">{$pmph5c}</td><td style="width: 80px;">{$pmph5ctime}</td>
	</tr>
	<tr>
		<td class="left">d. Bipolar Disorder</td><td style="width: 80px;">{$pmph5d}</td><td style="width: 80px;">{$pmph5dtime}</td>
	</tr>
	<tr>
		<td class="left">e. Substance Dependence</td><td style="width: 80px;">{$pmph5e}</td><td style="width: 80px;">{$pmph5etime}</td>
	</tr>
</table>
<p>&nbsp;<p/>
<table  width="800px">
	<tr>
		<th class="left" colspan="2">If yes to any of the above, please let us know what methods you have used in the past or are currently using to improve symptoms?</th>
	</tr>
	<tr>
		<td class="left">f. Individual Counseling/Therapy</td><td class="center">{$pmph5f}</td>
	</tr>
	<tr>
		<td class="left">g. Group Counseling/Therapy</td><td class="center">{$pmph5g}</td>
	</tr>
	<tr>
		<td class="left">h. Over-the-counter medications</td><td class="center">{$pmph5h}</td>
	</tr>
	<tr>
		<td class="left">i.  Prescription Medications</td><td class="center">{$pmph5i}</td>
	</tr>
</table>
<p>&nbsp;<p/>
<table  width="800px">
	<tr>
		<th class="left" colspan="3">Please list the prescription medications or over-the-counter herbs/supplements that you are CURRENTLY taking (for any reasons)?</th>
	</tr>
	<tr>
		<th style="width: 300px;">Name</td>
		<th style="width: 300px;">Purpose</td>
		<th style="width: 300px;">Dosage</td>
	</tr>
	<tr>
		<td class="left">{$pmph6aname}</td><td class="left">{$pmph6apurpose}</td><td class="left">{$pmph6adosage}</td>
	</tr>
	<tr>
		<td class="left">{$pmph6bname}</td><td class="left">{$pmph6bpurpose}</td><td class="left">{$pmph6bdosage}</td>
	</tr>
		<tr>
		<td class="left">{$pmph6cname}</td><td class="left">{$pmph6cpurpose}</td><td class="left">{$pmph6cdosage}</td>
	</tr>
		<tr>
		<td class="left">{$pmph6dname}</td><td class="left">{$pmph6dpurpose}</td><td class="left">{$pmph6ddosage}</td>
	</tr>
		<tr>
		<td class="left">{$pmph6ename}</td><td class="left">{$pmph6epurpose}</td><td class="left">{$pmph6edosage}</td>
	</tr>
		<tr>
		<td class="left">{$pmph6fname}</td><td class="left">{$pmph6fpurpose}</td><td class="left">{$pmph6fdosage}</td>
	</tr>
		<tr>
		<td class="left">{$pmph6gname}</td><td class="left">{$pmph6gpurpose}</td><td class="left">{$pmph6gdosage}</td>
	</tr>
		<tr>
		<td class="left">{$pmph6hname}</td><td class="left">{$pmph6hpurpose}</td><td class="left">{$pmph6hdosage}</td>
	</tr>
		<tr>
		<td class="left">{$pmph6iname}</td><td class="left">{$pmph6ipurpose}</td><td class="left">{$pmph6idosage}</td>
	</tr>
		<tr>
		<td class="left">{$pmph6jname}</td><td class="left">{$pmph6jpurpose}</td><td class="left">{$pmph6jdosage}</td>
	</tr>
</table>


					
EOD;


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
                <h1>PMPH Survey Results by User</h1>
            </div>
            <div class="reporting"> 
				{$report_data}
			</div>
			<div class="reportlegend"> 
				<table width="400px">
					<tr>
						<td colspan="2"><a href="/rpt_base_one/{$client_key}">View Client Demographics</a></td>
					</tr>
				</table>
			</div>
            <!-- Column 1 end -->
            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;

?>
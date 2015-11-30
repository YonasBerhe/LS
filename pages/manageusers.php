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
    <link href="./css/bootstrap.min.css" rel="stylesheet" media="screen">
EOD;


$additionalJS.= <<<EOD

EOD;
$orgs = "";
$roles = "";


if ((isset($_SESSION['company_id']) == true) && ($_SESSION['company_id']) == 1) {
    if(isset($_SESSION['user_role_id']) && ($_SESSION['user_role_id'] == 0 || ($_SESSION['user_role_id'] == 1))) {
        $sql = "call getReportUsers();";
        $Result = execute_query($mysqli, $sql);
        if($Result){

            while($row = $Result[0]->fetch_assoc()) {
                $user_data .= <<<EOD
                <tr>
                    <td>{$row['orgname']}</td>
                    <td>{$row['role']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['fname']}</td>
                    <td>{$row['lname']}</td>
                    <td>{$row['joindate']}</td>
                    <td>{$row['lastlogin']}</td>
                </tr>
EOD;
            }    
        }

        $sql = "call getRptOrgs();";
        $Result = execute_query($mysqli, $sql);
        if($Result) {
            while ($row = $Result[0]->fetch_assoc()) {
                $id = $row["id"];
                $name = $row["name"];
                $orgs .= "<option value='{$id}'>{$name}</option>";
            }
        }

        $sql = "call getRptRoles();";
        $Result = execute_query($mysqli, $sql);
        if($Result) {
            while ($row = $Result[0]->fetch_assoc()) {
                $id = $row["id"];
                $name = $row["name"];
                $roles .= "<option value='{$id}'>{$name}</option>";
            }
        }

    } else {
        header('Location: /reports'); 
    }
} else {
        header('Location: /reports'); 
 
}

$users .= <<<EOD
<div class="reporting">
    <table width="600">
        <tbody>
            <tr>
                <td colspan="8" class="titlerow">Report Users</td>    
            </tr>
            <tr>
                <th>organization</th>
                <th>role</th>
                <th>email</th>
                <th>first name</th>
                <th>last name</th>
                <th>join date</th>
                <th>last login</th>
            </tr>
            {$user_data}
        </tbody>
    </table>
</div>
EOD;

$newuser = <<<EOD
            <style>
                .form-group, .form-group {
                    text-align:left;
                }
                .panel .panel-default {
                    width: 500px;
                    margin: auto;
                    margin-top:10px;
                }
                .panel-body > form {
                    margin: auto;
                }

            </style>
<div class="container panel panel-default">
    <div class="panel-heading titlerow"><h3>Create New User</h3></div>
    <div class="panel-body">
        <form action="/pages/createuser.php" method="post" class="form-horizontal">

            <div class="form-group">
                <label  class="col-sm-2 control-label" for="org">Organization</label>
                <select name="org" class="col-sm-8">
                    {$orgs}
                </select>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label" for="org">Role</label>
                <select name="role" class="col-sm-8">
                    {$roles}
                </select>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label" for="email">Email</label>
                <input type="email" name="email" class="col-sm-8"/>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label" for="lname">First Name </label>
                <input type="text" name="fname" class="col-sm-8"/>

            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label" for="lname">Last Name</label>
                <input type="text" name="lname" class="col-sm-8"/>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label" for="password">Password</label>
                <input type="password" name="password" class="col-sm-8"/>
            </div>
            <div class="form-group" style="margin-left:12em;">
                <input type="submit" value="Create" class="col-sm-2 btn btn-default"/>
            </div>
        </form>
    </div>
</div>
EOD;

$body .= <<<EOD
    {$header}
    <div class="colmask fullpage">
        <div class="col1 center">

            <div class="pagetitle">
                <h1>Manage Users</h1>
            </div>
            <div>
                {$users}
            </div>
            {$newuser}
            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;
?>

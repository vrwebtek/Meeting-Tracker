<?php 

include 'database.php';

if(isset($_GET["Fromdate"]) && isset($_GET["Todate"]))
{
	$fromdate = $_GET["Fromdate"];
	$todate = $_GET["Todate"];
	$type = $_GET["type"];
	$subject = $_GET["subject"];
	
	//$query = "SELECT user_meeting_id,code,name,meeting_scheduled_to FROM user_tab_meeting WHERE meeting_scheduled_to BETWEEN '$fromdate' AND '$todate'";
	//echo $query;
	$commonQuery="SELECT utm.user_meeting_id,utm.code,utm.name,utm.meeting_scheduled_to FROM user_tab_meeting utm INNER JOIN `user_tab_meeting_subject` utms WHERE (utm.meeting_scheduled_to BETWEEN '$fromdate' AND '$todate') and (utm.user_meeting_id=utms.meeting_id)";
	if($type !='')
	{
		$commonQuery.=" and (utm.code='$type')";
	}
	if($subject !='')
	{
		$commonQuery.=" and (utms.subject='$subject')";
	}
	
	//$commonQuery="SELECT utm.user_meeting_id,utm.code,utm.name,utm.meeting_scheduled_to FROM user_tab_meeting utm INNER JOIN `user_tab_meeting_subject` utms WHERE (utm.meeting_scheduled_to BETWEEN '$fromdate' AND '$todate') and (utm.user_meeting_id=utms.meeting_id) and (utms.subject='$subject') and (utm.code='$type')";
	echo $commonQuery;
	
	$result = mysql_query($commonQuery);
	$count = mysql_num_rows($result);
	
	If($result != '' && $count > 0)
	{
		echo '<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<tr>
				<th>SR</th>
				<th>Meeting</th>
				<th>Meeting Type</th>
				<th>Meeting On</th>
				<th>Action</th>
				</tr>';
		while ($meeting_rec = mysql_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>".$meeting_rec['user_meeting_id']."</td>";
			echo "<td>".$meeting_rec['name']."</td>";
			echo "<td>".$meeting_rec['code']."</td>";
			echo "<td>".$meeting_rec['meeting_scheduled_to']."</td>";
			echo "<td></td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	
}
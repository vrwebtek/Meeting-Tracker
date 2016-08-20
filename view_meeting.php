<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Edit Meeting</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="cruz">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->	
</head>
<body>
<?php include 'header.php';
   
$meeting_id = validate_input($_GET['id']);

$query = ("SELECT user_meeting_id,name,code,meeting_schedule_to, FROM user_tab_meeting WHERE user_meeting_id='$meeting_id'");
//echo $query; exit;
$result = mysql_query($query);
if ($result > 0)
{
	$result = mysql_fetch_assoc($result);
}
else {
	echo "No data found!"; exit;
}

function validate_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	if(!ctype_alnum($data))
	{
		header('Location:login.php');
	}
	return $data;
}
?>

<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-plus"></i>
					<a href="addNewMeeting.php">Meetings</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="">View Meeting</a>
				</li>
			</ul>
			
			<div class="row-fluid">
            	<!--put your content here-->
                	<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add new Meeting</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="save_meeting.php" method="post" enctype="multipart/form-data">
						  <fieldset>
                          
                          <div class="control-group">
								<label class="control-label" for="meetingType">Type of meeting</label>
								<div class="controls">
								  <select id="meetingType" data-rel="chosen" name="meetingType">
								  <?php
                                  	$q=mysql_query("select * from master_tab_meeting_type");
									while($meet_typ=mysql_fetch_array($q))
									{
										$meetingId=$meet_typ['meeting_id'];
										$meetingName=strtoupper($meet_typ['meeting_name']);
										$meetingCode=strtoupper($meet_typ['code']);
								  ?>
									<option value="<?php echo $meetingCode; ?>"<?php if ($meetingCode == $result['code'])
										echo "selected=selected"; ?> disabled><?php echo $meetingName; ?></option>
								  <?php
									}
								  ?>
								  </select>
								</div>
							  </div>
							  
							  	<div class="control-group">
								<label class="control-label" for="focusedInput">Name of meeting </label>
								<div class="controls">
								  <input class="input-xlarge focused" id="meetingName" name="meetingName" type="text" value="<?php echo $result['name'];?>" disabled required="required"/>
								</div>
							  </div>
                              
                              <div class="control-group">
								<label class="control-label" for="focusedInput">Meeting Scheduled on </label>
								<div class="controls">
								  <input class="input-xlarge focused" id="meetingTime" name="meetingTime" type="datetime-local" value="<?php echo $result['meeting_scheduled_to'];?>" disabled required="required"/>
								</div>
							  </div>
							  
							    <?php $q = ("SELECT * FROM user_tab_meeting_subject WHERE meeting_id='$meeting_id'");
							  		$res = mysql_query($q);
							  		if ($res > 0)
							  		{
							  			while ($_res = mysql_fetch_assoc($res))
							  			{
							  		
							  
							  ?>
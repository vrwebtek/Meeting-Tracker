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
 //include 'database.php';
   
$meeting_id = validate_input($_GET['id']);

$query = ("SELECT * FROM user_tab_meeting WHERE user_meeting_id='$meeting_id'");
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
					<a href="addNewMeeting.php">Add Meeting</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="">Edit Meeting</a>
				</li>
			</ul>
			
			<p style="color: blue"><b>* To replace previous uploaded files just choose new files.</b></p>
			<p style="color: blue"><b>* To download the files click on the grey buttons below.</b></p>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Meeting Form</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="meeting_edit_save.php" enctype="multipart/form-data">
						 <div style="width: 50%; float:left">
						  <fieldset>
						  <input type="hidden" name="meeting_id" value="<?php echo $meeting_id;?>" />
						  <div class="control-group">
								<label class="control-label" for="meetingType">Type of meeting</label>
								<div class="controls">
								  <select id="meetingType" data-rel="chosen" name="meetingType">
                                  <?php
                                  	$qdept=mysql_query("select * from master_tab_meeting_type");
									while($dept_r=mysql_fetch_array($qdept))
									{
										$meetingId=$dept_r['meeting_id'];
										$meetingName=strtoupper($dept_r['meeting_name']);
										$meetingCode=strtoupper($dept_r['code']);
								  ?>
									<option value="<?php echo $meetingCode; 
									
									?>"<?php if ($meetingCode == $result['code'])
										echo "selected=selected"; ?> ><?php echo $meetingName; ?></option>
								  <?php
									}
								  ?>
								  </select>
								</div>
							  </div>
							  
							  
									
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Name of Meeting</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" name="meetingname" type="text" value="<?php echo $result['name'];?>">
								</div>
							  </div>
							  
							   <div class="control-group">
								<label class="control-label" for="focusedInput">Meeting Scheduled on </label>
								<div class="controls">
								  <input class="input-xlarge focused" id="meetingTime" name="meetingTime" type="text" value="<?php echo date('d-m-Y H:i',strtotime($result['meeting_scheduled_to']));?>">
								</div>
							  </div>
							  
							  <?php $q = ("SELECT * FROM user_tab_meeting_subject WHERE meeting_id='$meeting_id'");
							  		$res = mysql_query($q);
							  		if ($res > 0)
							  		{
							  			while ($_res = mysql_fetch_assoc($res))
							  			{
							  		
							  
							  ?>
							  
							  <div class="control-group" id="duplicate">
								<label class="control-label" for="subject[] department[]">Particulars</label>
								<div class="controls">
								  <div class="input-append">
									<input id="subject[]" name="subject[]" placeholder="SUBJECT" size="16" type="text" value="<?php echo $_res['subject'] ?>">
                                    
                                    <select id="department[]"  name="department[]"><!--removed data-rel="chosen"-->
                                     <!--   <option value="">SELECT DEPARTMENT</option>-->
                                      <?php
                                      $qdept=mysql_query("select * from master_tab_dept");
                                      while($dept_r=mysql_fetch_array($qdept))
                                      {
                                          $dpid=$dept_r['dept_id'];
                                          $dpname=strtoupper($dept_r['dept_name']);
                                          if ($_res['department'] == $dpid)
                                          {
                                          	echo '<option value="'.$dpid.'" selected="selected">'.$dpname.'</option>';
                                          }
                                      ?>
                                      <option value="<?php echo $dpid; ?>"><?php echo $dpname; ?></option>
                                      <?php
                                        }
                                      ?>
                                    </select>
                                   <!--   <button class="btn" id="addmore" type="button" >add more..</button>-->
								  </div>
								</div>
							  </div>
							  
							  <input type="hidden" name="subject_id[]" value=<?php echo $_res['id']; ?>/>
							  
							  <div class="control-group">
							  <div style="width: 50%; float: left;">
								<label class="control-label" for="focusedInput">Upload Agenda </label>
								<div class="controls">
								  <input type="file" name="uploadAgenda[]" >
								</div>
								</div>
								
								 <div style="width: 50%; float: left;">
								<label class="control-label" for="focusedInput"></label>
									<div class="controls">
								  <a href="temp_download.php?File=A&id=<?php echo $meeting_id?>&sub_id=<?php echo $_res['id'];?>" class="btn">Download Agenda PDF</a>
								</div>
								</div>

								
							  </div>
							  
							 							  
							  <div class="control-group">
							  <div style="width: 50%; float: left;">
								<label class="control-label" for="focusedInput">Upload Synopsis </label>
								<div class="controls">
								  <input type="file" name="uploadSynopsis[]" >
								</div>
								</div>
								
								 <div style="width: 50%; float: left;">
								<label class="control-label" for="focusedInput"></label>
									<div class="controls">
								  <a href="temp_download.php?File=S&id=<?php echo $meeting_id?>&sub_id=<?php echo $_res['id']?>" class="btn">Download Synopsis PDF</a>
								</div>
								</div>
								
							  </div>
							  
							  <div class="control-group">
							  <div style="width: 50%; float: left;">
								<label class="control-label" for="focusedInput">Upload Resolution</label>
								<div class="controls">
								  <input type="file" name="uploadResolution[]">
								</div>
								</div>
								
								<div style="width: 50%; float: left;">
								<label class="control-label" for="focusedInput"></label>
									<div class="controls">
								  <a href="temp_download.php?File=R&id=<?php echo $meeting_id?>&sub_id=<?php echo $_res['id']?>" class="btn">Download Resolution PDF</a>
								</div>
								</div>
						  </div>
							  
							 
							 <div class="control-group">
							  <div style="width: 50%; float: left;">
								<label class="control-label" for="focusedInput">Resolution Number </label>
								<div class="controls">
								  <input type="text" name="resolution_number[]"/>
								</div>
								</div>
								
								
							  </div>
							  
							  <div class="control-group">
							  <div style="width: 50%; float: left;">
							  <label class="control-label" for="focusedInput">Upload Minutes in Meeting </label>
								<div class="controls">
								  <input type="file" name="uploadMIM[]"/>
							  </div>
							  </div>
							  
							  <div style="width: 50%; float: left;">
							  
							  <label class="control-label" for="focusedInput"></label>
									<div class="controls">
								  <a href="temp_download.php?File=M&id=<?php echo $meeting_id?>&sub_id=<?php echo $_res['id']?>" class="btn">Download Mins in Meeting PDF</a>
								</div>
							  </div>
							  </div>
							  
							
							  <div class="control-group">
							  <div style="width: 50%; float: left;">
							  <label class="control-label" for="focusedInput">Upload Other Document </label>
								<div class="controls">
								  <input type="file" name="uploadOtherDoc[]"/>
								  	</div>
								  	</div>
								  	
								  	
							  </div>
							 
							 <!--   <div class="control-group">
								<label class="control-label" for="focusedInput">Upload Leave Application </label>
								<div class="controls">
								 <a href="leaveApplication.php?id=<?php //echo $meeting_id;?>" class="btn btn-info">Upload Leave</a>
								</div>
							  </div>-->
							  
							  <?php 	}
							  
							  		}
							  ?>
							 
							  
							  <div class="control-group">
							  <div class="controls">
							
							  	<button type="submit" name="submit" value="submit" class="btn btn-primary">Save changes</button>
							 	 <a href="addNewMeeting.php" type="reset" class="btn">Back</a>
						
							</div></div>
							  
							  </fieldset>
							 </div>
							 <div style="width: 50%; float:left">
							 <fieldset>
							 

								
								
						
							
						  </fieldset>
						  </div>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->


			
		
    

	</div><!--/.fluid-container-->
	</div>
	</div>
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2013 <a href="http://jiji262.github.io/Bootstrap_Metro_Dashboard/" alt="Bootstrap_Metro_Dashboard">Bootstrap Metro Dashboard</a></span>
			
		</p>

	</footer>
	
	<!-- start: JavaScript-->

		<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js/jquery.ui.touch-punch.js"></script>
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		<script src="js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	
		<script src='js/jquery.dataTables.min.js'></script>

		<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.js"></script>
	<script src="js/jquery.flot.pie.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	
		<script src="js/jquery.chosen.min.js"></script>
	
		<script src="js/jquery.uniform.min.js"></script>
		
		<script src="js/jquery.cleditor.min.js"></script>
	
		<script src="js/jquery.noty.js"></script>
	
		<script src="js/jquery.elfinder.min.js"></script>
	
		<script src="js/jquery.raty.min.js"></script>
	
		<script src="js/jquery.iphone.toggle.js"></script>
	
		<script src="js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="js/jquery.gritter.min.js"></script>
	
		<script src="js/jquery.imagesloaded.js"></script>
	
		<script src="js/jquery.masonry.min.js"></script>
	
		<script src="js/jquery.knob.modified.js"></script>
	
		<script src="js/jquery.sparkline.min.js"></script>
	
		<script src="js/counter.js"></script>
	
		<script src="js/retina.js"></script>

		<script src="js/custom.js"></script>
		 <script type="text/javascript">
    <?php if($_SESSION['download_msg']):
    	  
    $msg = $_SESSION['download_msg'];
    	  ?>
    	  var n = noty({
    		    text: <?php echo "'$msg'";?>,
    		    animation: {
    		        open: {height: 'toggle'}, // jQuery animate function property object
    		        close: {height: 'toggle'}, // jQuery animate function property object
    		        easing: 'swing', // easing
    		        speed: 500 // opening & closing animation speed
    		    }
    		});
    		<?php unset($_SESSION['download_msg']); endif;?>

    </script>
		<script type="text/javascript">
		var jq = $.noConflict();
		jq(document).ready(function(){

			 jq("#content").find(".uploader").removeClass('uploader');
			jq("#content").find(".filename").remove();
			jq("#content").find(".action").remove();
				
		});
		</script>
	<!-- end: JavaScript-->
</body>
</html>

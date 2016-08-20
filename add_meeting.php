<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Add Meeting</title>
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
	<?php include('header.php');?>
    <!--content will start here-->
    	<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Add new Meeting</a></li>
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
									<option value="<?php echo $meetingCode; ?>"><?php echo $meetingName; ?></option>
								  <?php
									}
								  ?>
								  </select>
								</div>
							  </div>
                              
                          	<div class="control-group">
								<label class="control-label" for="focusedInput">Name of meeting </label>
								<div class="controls">
								  <input class="input-xlarge focused" id="meetingName" name="meetingName" type="text"  required="required"/>
								</div>
							  </div>
                              
                              <div class="control-group">
								<label class="control-label" for="focusedInput">Meeting Scheduled on </label>
								<div class="controls">
								  <input class="input-xlarge focused" id="meetingTime" name="meetingTime" type="datetime-local"  required="required"/>
								</div>
							  </div>
							  
							   <div class="control-group">
								<label class="control-label" for="focusedInput">Upload News Notification </label>
								<div class="controls">
								  <input type="file" name="uploadNotification" />
								</div>
							  </div>
                              
                              <section id="dynamicAddMore"></section><!--section where addmore controls will showup-->
                              
                             <div id="duplicate">
                              <div class="control-group" >
								<label class="control-label" for="subject[] department[]">Particulars</label>
								<div class="controls">
								  <div class="input-append">
									<input id="subject[]" name="subject[]" placeholder="SUBJECT" size="16" type="text"/>
                                    
                                    <select id="department[]"  name="department[]"><!--removed data-rel="chosen"-->
                                      <option value="">SELECT DEPARTMENT</option>
                                      <?php
                                      $qdept=mysql_query("select * from master_tab_dept");
                                      while($dept_r=mysql_fetch_array($qdept))
                                      {
                                          $dpid=$dept_r['dept_id'];
                                          $dpname=strtoupper($dept_r['dept_name']);
                                      ?>
                                      <option value="<?php echo $dpid; ?>"><?php echo $dpname; ?></option>
                                      <?php
                                        }
                                      ?>
                                    </select>
                                    <button class="btn" id="addmore" type="button" >add more..</button>
								  </div>
								</div>
							  </div>
                              
                              
                              <div class="control-group">
                              <div style="width: 50%; float: left;">
								<label class="control-label" for="focusedInput">Upload Agenda </label>
								<div class="controls">
								  <input type="file" name="uploadAgenda[]" />
								</div>
								</div>
								<div style="width: 50%; float: left;">
								<label class="control-label" for="focusedInput">Upload Synopsis </label>
								<div class="controls">
								  <input type="file" name="uploadSynopsis[]"/>
								</div>
								</div>
							  </div>
							  
							  
							  
							  <div class="control-group">
							  <div style="width: 50%; float: left;">
								<label class="control-label" for="focusedInput">Upload Resolution </label>
								<div class="controls">
								  <input type="file" name="uploadResolution[]"/>
								</div>
								</div>
								<div style="width: 50%; float: left;">
								<label class="control-label" for="focusedInput">Resolution Number </label>
								<div class="controls">
								  <input type="text" name="resolution_number[]"/>
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
								<div style="width: 50%; float: left;">
								<label class="control-label" for="focusedInput">Upload Minutes in Meeting </label>
								<div class="controls">
								  <input type="file" name="uploadMIM[]"/>
								</div>
							  </div>
							  </div>
							  </div><!-- end duplicate div -->
                              
                             
							
							<div class="form-actions">
							  <input type="submit" name="submit" class="btn btn-primary" value="Submit"/>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
                          
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
                <!--put your content here-->
            </div><!--/.fluid-container-->
            
            
            		</div><!--/#content.span10-->
    <!--content will end here-->
    
    <?php include('footer.php'); ?>
    <script type="text/javascript">
    <?php 
    if($_SESSION['upload_msg'] != NULL && $_SESSION['upload_msg'] != '' ):
    	  
    $msg = $_SESSION['upload_msg'];
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
    		<?php unset($_SESSION['upload_msg']); endif;?>

    </script>


<script src="js/myGoogleJs.js"></script>
<script>
var jq = $.noConflict();
jq(document).ready(function(){
    jq("#addmore").click(function(){
        jq("#duplicate").clone().find("input:text").val("").end().appendTo("#dynamicAddMore");
		jq("#dynamicAddMore").find("button").hide();
		//jq("#dynamicAddMore").append('<input type="file" name="uploadOtherDoc[]"/>');
		jq("#dynamicAddMore").find(".uploader").removeClass('uploader');
		jq("#dynamicAddMore").find(".filename").remove();
		jq("#dynamicAddMore").find(".action").remove();
    });

    jq("#content").find(".uploader").removeClass('uploader');
	jq("#content").find(".filename").remove();
	jq("#content").find(".action").remove();

});

</script>
</body>
</html>
            
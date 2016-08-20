<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Add a new meeting</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
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
						<form class="form-horizontal" action="addNewMeeting_save.php" method="post" enctype="multipart/form-data">
						  <fieldset>
                          
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
								  <input class="input-xlarge focused" id="meetingName" name="meetingName" type="text"  required="required">
								</div>
							  </div>
                              
                              <div class="control-group">
								<label class="control-label" for="focusedInput">Meeting Scheduled on </label>
								<div class="controls">
								  <input class="input-xlarge focused" id="meetingTime" name="meetingTime" type="datetime-local"  required="required">
								</div>
							  </div>
                              
                              <div class="control-group" id="duplicate">
								<label class="control-label" for="subject[] department[]">Particulars</label>
								<div class="controls">
								  <div class="input-append">
									<input id="subject[]" name="subject[]" placeholder="SUBJECT" size="16" type="text">
                                    
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
                              <section id="dynamicAddMore"></section><!--section where addmore controls will showup-->
                              
                              <div class="control-group">
								<label class="control-label" for="focusedInput">Upload Agenda </label>
								<div class="controls">
								  <input type="file" name="uploadAgenda"/>
								</div>
							  </div>
                              
                              <div class="control-group">
								<label class="control-label" for="focusedInput">Upload News Notification </label>
								<div class="controls">
								  <input type="file" name="uploadNotification">
								</div>
							  </div>
							
							<div class="form-actions">
							  <input type="submit" class="btn btn-primary" value="Save changes">
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
                          
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
                <!--put your content here-->
            </div><!--/.fluid-container-->
            
            <div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon wrench"></i><span class="break"></span>Parties</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>SR</th>
								  <th>Meeting</th>
                                  <th>Meeting type</th>
                                  <th>Meeting On</th>
                                  <th>Agenda</th>
                                  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
                          <?php
                          	$quser_tab_meeting=mysql_query("select * from user_tab_meeting where active='1' order by user_meeting_id desc");
							$counter=0;
							while($quser_tab_meeting_r=mysql_fetch_array($quser_tab_meeting))
							{
								$meeting_id=$quser_tab_meeting_r['user_meeting_id'];
								$meeting_name=$quser_tab_meeting_r['name'];
								$meeting_code=$quser_tab_meeting_r['code'];
								$meeting_scheduled_to=$quser_tab_meeting_r['meeting_scheduled_to'];
								$newspaper=$quser_tab_meeting_r['newspaper'];//news paper id will be like 1,2,3 so first explode it in array
								
								$PDF_agenda=$quser_tab_meeting_r['PDF_agenda'];
								$PDF_Notification=$quser_tab_meeting_r['PDF_Notification'];
								$PDF_Notification=$quser_tab_meeting_r['PDF_Notification'];
								$resolution=$quser_tab_meeting_r['resolution'];
								
								
								$meetingTime= date('dmY',strtotime($meeting_scheduled_to));//folder is created for date on which meeting will be held
								
								
								$counter++;
								
								
								
								
								
						  ?>
							<tr>
								<td><?php echo $counter; ?></td>
								<td class="center"><?php echo $meeting_name; ?></td>
                                <td class="center"><?php echo $meeting_code; ?></td>
                                <td class="center"><?php echo $meeting_scheduled_to; ?></td>
                                
                                <td class="center"><a href="temp_download.php?File=A&id=<?php echo $meeting_id; ?>"><?php echo $PDF_agenda !=''? $PDF_agenda.".pdf":''; ?></a></td>
 								
 									<td class="center">
									<!--<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>  
									</a>-->
									<a class="btn btn-info" href="meeting_edit.php?id=<?php echo $meeting_id; ?>" title="Click here to upload Leave,Sysnopsis,Resolution">
										<i class="halflings-icon white edit"></i>  
									</a>
									<!-- <a class="btn btn-danger" href="meeting_delete.php?id=<?php //echo $meeting_id; ?>">-->
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
                            
                            
                            <?php
							}
							?>
							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			
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
    });

});

</script>
</body>
</html>

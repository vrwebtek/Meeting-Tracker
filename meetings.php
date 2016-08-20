<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Meetings</title>
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
				<li><a href="#">Meetings</a></li>
			</ul>            
            
            <div>
           		 <a href="add_meeting.php"  class="btn btn-primary" title="Click here to add new meeting details">Add New Meeting</a>
            </div>
            <div style="float:left ;width:100%; height:15px;"></div>
            <p style="color: blue"><b>* To upload leave details click on the button "Leave" in below table</b></p>
            <p style="color: blue"><b>* To download the uploaded files for meeting click on "edit" button in Action column </b></p>
            <div style="float:left ;width:100%; height:15px;"></div>
            <div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon wrench"></i><span class="break"></span>Meetings</h2>
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
                                  <th>Leave Details</th>
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
                                
                                <td class="center"><div class="controls">
								 <a href="leaveApplication.php?id=<?php echo $meeting_id;?>" class="btn btn-info">Leave</a>
								</div></td>
 								
 									<td class="center">
									<!--<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>  
									</a>-->
									<a class="btn btn-info" href="meeting_edit.php?id=<?php echo $meeting_id; ?>" title="Click here to change the meeting details and download files">
									Edit <i class="halflings-icon white edit"></i>  
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
			
	</div><!-- end content -->
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
 </body>
</html>
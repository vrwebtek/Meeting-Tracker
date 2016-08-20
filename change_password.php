<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Change Password</title>
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
					<a href="addNewMeeting.php">Account Settings</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="">Change Password</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Change Password Form</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="change_password_save.php" enctype="multipart/form-data">
						 <div style="width: 50%; float:left">
						  <fieldset>
						 
						  <div class="control-group">
								
								<div class="controls">
								  <p style="color: red"><b>
								  <?php if($_SESSION['message'])
								  {
								  	echo $_SESSION['message'];
								  }?></b></p>
							
								</div>
							  </div>
						  
							  
									
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Old Password</label>
								<div class="controls">
								  <input class="input-xlarge focused" placeholder="type Old Password" id="focusedInput" name="oldpassword" type="text" value="">
								</div>
							  </div>
							  
							   <div class="control-group">
								<label class="control-label" for="focusedInput">New Password</label>
								<div class="controls">
								  <input class="input-xlarge focused" placeholder="type New Password" id="newpassword" name="newpassword" type="text" value="">
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Repeat New Password</label>
								<div class="controls">
								  <input class="input-xlarge focused" placeholder="type above New Password" id="newpassword2" name="newpassword2" type="text" value="">
								</div>
							  </div>
							  
							
							  <div class="control-group">
							  <div class="controls">
							  	<input type="submit" name="submit" value="Update" class="btn btn-primary"/>
							 	 <a href="addNewMeeting.php" type="reset" class="btn">Back</a>
								</div>
						 	</div>
							  
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
			<span style="text-align:left;float:left">&copy; 2015 <a href="http://jiji262.github.io/Bootstrap_Metro_Dashboard/" alt="Bootstrap_Metro_Dashboard">Bootstrap Metro Dashboard</a></span>
			
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
		
	<!-- end: JavaScript-->
</body>
</html>
<?php 





?>
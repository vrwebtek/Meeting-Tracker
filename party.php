<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Add Party</title>
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
	<?php include('header.php'); ?>
    <!--content will start here-->
    	<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Party</a></li>
			</ul>

			<div class="row-fluid">
            	<!--put your content here-->
                	<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Party</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="party_save.php" method="POST" enctype="multipart/form-data">
						  <fieldset>
                          
                          	<div class="control-group">
								<label class="control-label" for="focusedInput">Name </label>
								<div class="controls">
								  <input class="input-xlarge focused" id="name" name="name" type="text"  required="required">
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
								  <th>Name</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
                          <?php
                          	$qCorp=mysql_query('select * from master_tab_party');
							$counter=0;
							while($corp_r=mysql_fetch_array($qCorp))
							{
								$partyID=$corp_r['id'];
								$partyName=strtoupper($corp_r['party']);
								
								$counter++;
								
								
						  ?>
							<tr>
								<td><?php echo $counter; ?></td>
								<td class="center"><?php echo $partyName; ?></td>
								
								<td class="center">
									<!--<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>  
									</a>-->
									<a class="btn btn-info" href="party_edit.php?id=<?php echo $partyID; ?>">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="party_edit.php?id=<?php echo $partyID; ?>">
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
</body>
</html>
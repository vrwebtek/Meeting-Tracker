<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Enter corporator</title>
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
				<li><a href="#">Enter Corporator</a></li>
			</ul>

			<div class="row-fluid">
            	<!--put your content here-->
                	<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Enter Corporator</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="corporator_save.php" method="post" enctype="multipart/form-data">
						  <fieldset>
                          
                          	<div class="control-group">
								<label class="control-label" for="focusedInput">Name </label>
								<div class="controls">
								  <input class="input-xlarge focused" id="name" name="name" type="text" value="" required="required">
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Residence address </label>
								<div class="controls">
								  <textarea class="input-xlarge focused" id="name" name="resi_address"   required="required"></textarea>
								</div>
							  </div>
                              
                              <div class="control-group">
								<label class="control-label" for="focusedInput">Office address </label>
								<div class="controls">
								  <textarea class="input-xlarge focused" id="name" name="off_address"  required="required"></textarea>
								</div>
							  </div>
                              
							   
                              <div class="control-group">
								<label class="control-label" for="focusedInput">Phone </label>
								<div class="controls">
								  <input class="input-xlarge focused" id="phone" name="phone" type="text" value="" required="required">
								</div>
							  </div>
                              
                              <div class="control-group">
								<label class="control-label" for="focusedInput">Mobile </label>
								<div class="controls">
								  <input class="input-xlarge focused" id="mobile" name="mobile" type="text" value="" required="required">
								</div>
							  </div>
                              
                              <div class="control-group">
								<label class="control-label" for="focusedInput">Email </label>
								<div class="controls">
								  <input class="input-xlarge focused" id="email" name="email" type="email" value="" required="required">
								</div>
							  </div>
                              
                               <div class="control-group">
								<label class="control-label" for="selectError1">Select departments</label>
								<div class="controls">
								  <select id="selectError1" multiple data-rel="chosen" name="department[]">
                                  <?php
                                  	$qdept=mysql_query("select * from master_tab_dept");
									while($dept_r=mysql_fetch_array($qdept))
									{
										$dpid=$dept_r['dept_id'];
										$dpname=$dept_r['dept_name'];
								  ?>
									<option value="<?php echo $dpid; ?>"><?php echo $dpname; ?></option>
								  <?php
									}
								  ?>
								  </select>
								</div>
							  </div>
                              
                              <div class="control-group">
								<label class="control-label" for="selectError">Select Party</label>
								<div class="controls">
								  <select id="selectError" data-rel="chosen" name="party">
                                  <option value="">Choose Party</option>
                                  <?php
                                  	$qdept=mysql_query("select * from master_tab_party");
									while($dept_r=mysql_fetch_array($qdept))
									{
										//$partyid=$dept_r['id'];
										$partyName=$dept_r['party'];
								  ?>
									<option value="<?php echo $partyName; ?>"><?php echo $partyName; ?></option>
								  <?php
									}
								  ?>
								  </select>
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
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
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
								  <th>Phone</th>
								  <th>Mobile</th>
                                  <th>Email</th>
                                  <th>Departments</th>
                                  <th>Party</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
                          <?php
                          	$qCorp=mysql_query('select * from master_tab_corp');
							$counter=0;
							while($corp_r=mysql_fetch_array($qCorp))
							{
								$corpID=$corp_r['corp_id'];
								$corpName=$corp_r['name'];
								$corpPhone=$corp_r['phone'];
								$corpMobile=$corp_r['mobile'];
								$corpEmail=$corp_r['email'];
								$corpDept=$corp_r['dept'];
								$corpParty=$corp_r['party'];
								$counter++;
								
								
						  ?>
							<tr>
								<td><?php echo $counter; ?></td>
								<td class="center"><?php echo $corpName; ?></td>
								<td class="center"><?php echo $corpPhone; ?></td>
								<td class="center"><?php echo $corpMobile; ?></td>
                                <td class="center"><?php echo $corpEmail; ?></td>
                                <td class="center">
                                	<?php
                                    	//display deprtment in higlighted
								$indi_dept = explode(",", $corpDept);
								$dept_count=count($indi_dept);
								for($i=0;$i<$dept_count;$i++)
								{
									$getDept=mysql_query("select * from master_tab_dept where dept_id='$indi_dept[$i]'");
									while($getDept_r=mysql_fetch_array($getDept))
									{
										$dept_name=$getDept_r['dept_name'];
									?>
                                		<span class="label label-success"><?php echo $dept_name; ?></span><br /><br />
                                    <?php
									}//while ends
								}//for ends
									?>
                                </td>
                                <td class="center"><?php echo $corpParty; ?></td>
								<td class="center">
									<!--<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>  
									</a>-->
									<a class="btn btn-info" href="corporator_edit.php?id=<?php echo $corpID; ?>">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="corporator_delete.php?id=<?php echo $corpID; ?>">
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
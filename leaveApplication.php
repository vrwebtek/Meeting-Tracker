<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Leave Application</title>
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
	<?php include('header.php'); 
	
		//get meeting ID
		$meetingID=$_GET['id'];
		//get departments from user_tab_meeting_subject
		
		$getDept=mysql_query("select * from user_tab_meeting_subject where meeting_id='$meetingID'");
		while($getDept_r=mysql_fetch_array($getDept))
		{
			$arrDep[]=$getDept_r['department'];
		}
	?>
    <!--content will start here-->
    	<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Leave Application</a></li>
			</ul>

			<div class="row-fluid">
            	<!--put your content here-->
                	<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Upload Leave Application</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="leaveApplication_save.php" method="POST" enctype="multipart/form-data">
						  <fieldset>
                          
                          	<div class="control-group">
								<label class="control-label" for="focusedInput">Select Corporator </label>
								<div class="controls">
								  <!--<input class="input-xlarge focused" id="name" name="name" type="text"  required="required">-->
                                  <!--<select id="selectError" data-rel="chosen" name="corporator">
                                  <option value="">Choose Corporator</option>-->
                                  <?php
                                  	$countArr=count($arrDep);
									
									for($i=0;$i<$countArr;$i++)
									{
										$qGetCorp=mysql_query("select * from `master_tab_corp` where ((`dept` like '%,$arrDep[$i]') or (`dept` like '$arrDep[$i],%') or (`dept` like '%,$arrDep[$i],%') or (`dept`='$arrDep[$i]'))");
										
										if(mysql_num_rows($qGetCorp)<=0)
										{
											//do nothing
										}//if ends
										else{
											while($qGetCorp_r=mysql_fetch_array($qGetCorp))
											{
												$corpID=$qGetCorp_r['corp_id'];
												$corpName=$qGetCorp_r['name'];
												$tmp=mysql_query("INSERT INTO `user_tmp`(`id`, `cid`, `cname`) VALUES ('','$corpID','$corpName')");//inserting data in temporary table because of data inconsistency
												?>
                                                <!--<option value="<?php echo $corpID; ?>"><?php echo $corpName; ?></option>-->
                                                <?php
											}
										}//else ends
									}//for ends
								  ?>
								  <!--</select>-->
                                  
                                  <!--from temporary table to dropdown-->
                                  <select id="selectError" data-rel="chosen" name="corporator">
                                  <option value="">Choose Corporator</option>
                                  <?php
                                  	$tmp=mysql_query("SELECT distinct(`cid`), `cname` FROM `user_tmp`");
									while($tmp_r=mysql_fetch_array($tmp))
									{
										?>
                                        <option value="<?php echo $tmp_r['cid']; ?>"><?php echo $tmp_r['cname']; ?></option>
                                        <?php
									}
									mysql_query("TRUNCATE `user_tmp`;");//emptying the tmp table for next use
								  ?>
                                  </select>
								</div>
							  </div>
                              
                              <div class="control-group">
								<label class="control-label" for="focusedInput">Upload Leave Letter </label>
								<div class="controls">
                                	<input type="file" name="uploadLeaveLetter">
                                    <input type="hidden" name="meetingid" value="<?php echo $meetingID; ?>"/>
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
                                  <th>Date</th>
                                  <th>Meeting Name</th>
								  <th>Download</th>
							  </tr>
						  </thead>   
						  <tbody>
                          <?php
                          	$qCorp=mysql_query("select * from user_tab_leave_application where meeting_id=$meetingID");
							$counter=0;
							while($corp_r=mysql_fetch_array($qCorp))
							{
								$leaveID=$corp_r['id'];
								$meetingID=$corp_r['meeting_id'];
								$corpID=$corp_r['corp_id'];
								$leaveID=$corp_r['id'];
								$applicationOn=$corp_r['applicationOn'];
								
								$counter++;
								
								//get name of corporator
								$getCorp=mysql_query("SELECT * FROM `master_tab_corp` WHERE corp_id='$corpID'");
								$gc=mysql_fetch_array($getCorp);
								$cname=$gc['name'];
								
								$date=date('d/m/Y',strtotime($applicationOn));
								
								//get meeting name
								$getMeeting=mysql_query("SELECT * FROM `user_tab_meeting` WHERE user_meeting_id='$meetingID'");
								$gm=mysql_fetch_array($getMeeting);
								$meeting=$gm['name'];
								
						  ?>
							<tr>
								<td><?php echo $counter; ?></td>
								<td class="center"><?php echo $cname; ?></td>
                                <td class="center"><?php echo $date; ?></td>
                                <td class="center"><a href="seeMeetinginDetail.php?id=<?php echo $meetingID; ?>"><?php echo $meeting; ?></a></td>
								
								<td class="center">
									<!--<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>  
									</a>-->
									<a class="btn btn-info" title="download leave letter" href="party_edit.php?id=<?php echo $partyID; ?>">
										<i class="halflings-icon white download"></i>  
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
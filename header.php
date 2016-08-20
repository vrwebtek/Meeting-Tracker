<?php include('database.php'); 
ob_start();
	session_start();

if (empty($_SESSION['logusrname']))
{
	session_destroy();
	header('Location:login.php');
	exit;
}
?>
<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="dashboard.php"><span>VVMC MEETING TRACKER</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i><?php echo $_SESSION['logusrname'];?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="change_password.php"><i class="halflings-icon user"></i>Change Password</a></li>
								<li><a href="logout.php"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="dashboard.php"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>
                        	
						<li>
							<a class="dropmenu" href="#"><i class="icon-chevron-down"></i><span class="hidden-tablet"> Master</span><!--<span class="label label-important"> 3 </span>--></a>
							<ul>
								<li><a href="department.php"><i class="icon-legal"></i><span class="hidden-tablet"> Departments</span></a></li>
                                <li><a href="party.php"><i class="icon-flag"></i><span class="hidden-tablet"> Party</span></a></li>
								<li><a href="corporator.php"><i class="icon-group"></i><span class="hidden-tablet"> Corporators</span></a></li>
                                <li><a href="newspaper.php"><i class="icon-bullhorn"></i><span class="hidden-tablet"> Newspaper</span></a></li>
                                <li><a href="meetingType.php"><i class="icon-bullhorn"></i><span class="hidden-tablet"> Meeting Types</span></a></li>
							</ul>	
						</li>
                        
                        
                        
						<li><a href="meetings.php"><i class="icon-tasks"></i><span class="hidden-tablet">Meetings</span></a></li>
						
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo "$sfname $ssname";?></strong>
                             </span> <span class="text-muted text-xs block">Administrator <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="profile.php">Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php?logout">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            HMS+
                        </div>
                    </li>
                    <li class="active">
                        <a href="index.php"><i class="fa fa-home"></i> <span class="nav-label">Dashboard</span></a>
                    </li>
					<?php
										
					if($user_l=='PHARMACY'||$user_l=='ADMINISTRATOR'){
					?>
						
					<li>
                        <a href="#"><i class="fa fa-file-text-o"></i> <span class="nav-label">Pharmacy </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
							
                            <li><a href="newotc.php"><i class="fa fa-plus"></i> <span class="nav-label">OTC</span></a></li>
							<li><a href="drugs.php"><i class="fa fa-plus"></i> Drugs</a></li>
							<li><a href="inventory.php"><i class="fa fa-plus"></i> Recent Inventories</a></li>
							<li><a href="drugscurrentstock.php"><i class="fa fa-plus"></i> Stock & Prices</a></li>
                            <li><a href="sales.php"><i class="fa fa-plus"></i> Sales</a></li>
                            <li><a href="materialrequestapproval.php"><i class="fa fa-plus"></i> Dept Requests</a></li>
                            <li><a href="#"><i class="fa fa-plus"></i> Non-Pharms</a></li>
                            <li><a href="otcbill.php"><i class="fa fa-plus"></i> OTC Queue</a></li>
							
                            <li><a href="salesadmin.php"><i class="fa fa-plus"></i> Sales Report</a></li>
					</ul>
                    </li>
				
					<?php
					}					
					if($user_l=='ADMINISTRATOR'){
					?>
					 <li>
                        <a href="reports.php"><i class="fa fa-area-chart"></i> <span class="nav-label">Reports</a>
                        
                    </li>
					 
                    <li>
                        <a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">Master Settings</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           <!--<li><a href="clinicservices.php"><i class="fa fa-plus"></i> Clinic Services</a></li>-->
                           <!---<li><a href="first_lab_services.php"><i class="fa fa-plus"></i> Lab Services</a></li>-->
                           <!-- <li><a href="first_nursingstation_services.php"><i class="fa fa-plus"></i> Nursing Station </a></li>-->
							<li><a href="drugscurrentstock.php"><i class="fa fa-plus"></i> Drugs Stock </a></li>
							<li><a href="summary.php"><i class="fa fa-plus"></i> Drugs Summary </a></li>
							<li><a href="payment_schemes.php"><i class="fa fa-plus"></i> Payment Schemes</a></li>
							<li><a href="drug-caterogies.php"><i class="fa fa-plus"></i>Drug Categories</a></li>
                            <li><a href="suppliers.php"><i class="fa fa-plus"></i> Suppliers</a></li>
                            
					</ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-gear"></i> <span class="nav-label"> Settings</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="campaigner.php"><i class="fa fa-plus"></i> Institution Profile</a></li>
							<li> <a href="profile.php"><i class="fa fa-plus"></i> User Profile</a></li>
						</ul>
                    </li>
					<?php
					}					
					?>	
                </ul>
            </div>
        </nav>
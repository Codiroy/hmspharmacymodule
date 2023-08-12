<?php include('includes/authenticate.php'); 
date_default_timezone_set("Africa/Nairobi");
?>
<!DOCTYPE html>
<html>
<head>
    <?php include('includes/meta.php');?>
	
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

   <title>View Current Bill - <?php echo $smart_name; ?></title>
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>
	<script type="text/javascript">

       function printDiv(divName) {
           var printContents = document.getElementById(divName).innerHTML;
           var originalContents = document.body.innerHTML;

           document.body.innerHTML = printContents;

           window.print();

           document.body.innerHTML = originalContents;
       }
       //function hideDiv() {
       //    if (document.getElementById) {
       //        document.getElementById('printableArea').style.display = 'none';
       //    }
       //}
       //function showDiv() {
       //    if (document.getElementById) {
       //        document.getElementById('printableArea').style.visibility = 'visible';
       //    }
       //}

</script>
</head>
<body>
    <div id="wrapper">
	<?php include('includes/sidebar.php');?>
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
			<?php include('includes/top-nav.php'); ?>
        </div>
		<?php
			$billvisitno = $_GET['visitno'];
			$billopno = $_GET['opno'];
			$getbilling = mysqli_query($dbconnect, "SELECT * FROM tbl_billing lb INNER JOIN tbl_registry tl ON lb.bill_opno=tl.opno WHERE lb.bill_opno='$billopno'");
			$gbil = mysqli_fetch_array($getbilling);
			
			$bopno = $gbil['bill_opno'];
			$bvisitno = $gbil['bill_visitno'];
			$bfname = $gbil['f_name'];
			$blname = $gbil['l_name'];
			$bdob = $gbil['dob'];
			$bservicename = $gbil['bill_servicename'];
			$bamount = $gbil['bill_amount'];
			$bvisitdate = $gbil['visit_date'];
			$b_billdate = $gbil['bill_datetime'];
			
			$patient_names = mysqli_query($dbconnect, "SELECT * FROM tbl_registry WHERE opno='$bopno'");
			$pd = mysqli_fetch_array($patient_names);
			
			$pid_no = $pd['id_no'];
			$pfname = $pd['f_name'];
			$pdob = $pd['dob'];
			$plname = $pd['l_name'];
			$pgender = $pd['gender'];
			$preside = $pd['residence'];
			
			$todaydate = date('Y-m-d');
			
			$leodate = date('d-m-Y, h:i:sA');
			
			$date1 = $pdob;
			$date2 = $todaydate;
			
			$diff = date_diff(date_create($pdob), date_create($todaydate));
			$agess = $diff->format('%y');
			
			$current_processstage='BILLING';
			$getPatients = mysqli_query($dbconnect, "SELECT * FROM tbl_queue q INNER JOIN tbl_registry r on r.opno=q.queue_opno WHERE q.queue_to='$current_processstage'");
			$title='Patients for Billing Services';

		?>	
			
        <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>View Bill Statament</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Dashboard</a>
                        </li>
                        <li>
                            Billing
                        </li>
                        <li class="active">
                            <strong>Bill Report for <?php echo "$bfname $blname - Visit No. $bvisitno"; ?></strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-4">
                    
                </div>
        </div>
        <div class="row">
			<div class="col-lg-1">
			</div>
            <div class="col-lg-10">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div id="printableArea">
					<div class="ibox-content p-xl printed">
						<!-- Hospital Details -->
							
                     
							<div id="printableArea">
								
							<table bgcolor="White" style="border: 0px solid #000000"><tr>
								   <td valign="top" width="2480px" style="height: 456px;">
								
							<table width="100%" cellspacing="0" cellpadding="4">

							<tr style="border-bottom:1pt solid black; width:100%;" align="center" >
								<td colspan="4" align="center" style="border-bottom: 2px solid #000000; height: 23px; border-bottom-width: 1px;" valign="middle"><span style="font-family:Times New Roman;font-size:18pt;font-weight:bold;"><?php $institution_name = strtoupper($smart_name); echo $institution_name; ?></span><br > <p style="font-family:Times New Roman;font-size:12pt;font-weight:bold;"><?php echo $smart_address; ?> <br /> Mobile: <?php echo $smart_phone; ?> <br /> E-mail: <?php echo $smart_email; ?></p>
								</td>
								</hr>
							</tr>

							<tr>
								
								<br /><td colspan="4" align="center"><span style="font-family:Times New Roman;font-size:12pt;font-weight:bold;color:red;">RECEIPT </span><br />
								</td>
							</tr>

							<tr>
								<td style="width: 150px; height: 19px;"><span style="font-family:Times New Roman;font-size:12pt;">Patient Name:</span></td>
								 <td  style="height: 19px"><span style="font-family:Times New Roman;font-size:12pt;"><?php if($pgender = "Male"){
									 echo "Mr. $pfname $plname";
								 }
								 else {
									 echo "Mrs. $pfname $plname";
								 } ?> </span></td>
								<td style="width: 150px; height: 19px;"><span style="font-family:Times New Roman;font-size:12pt;">OP No:</span></td>
								 <td colspan="1" style="height: 19px"><span style="font-family:Times New Roman;font-size:12pt;"><?php echo $bopno; ?> </span><br /></td>
							</tr> 
							<tr>
								<td style="width: 150px; height: 19px;"><span style="font-family:Times New Roman;font-size:12pt;">Visit Date:</span></td>
								 <td  style="height: 19px"><span style="font-family:Times New Roman;font-size:12pt;"><?php  echo $bvisitdate; ?> </span></td>
								<td style="width: 150px; height: 19px;"><span style="font-family:Times New Roman;font-size:12pt;">Visit No:</span></td>
								 <td colspan="1" style="height: 19px"><span style="font-family:Times New Roman;font-size:12pt;"><?php echo $bvisitno; ?> </span><br /></td>
							</tr> 

							<tr>
								<td style="width: 70px; height: 17px;"><span style="font-family:Times New Roman;font-size:12pt;">Age:</span></td>
								<td colspan="1" style="height: 17px"><span style="font-family:Times New Roman;font-size:12pt;"><?php echo $agess; ?> years</span></td>
								<td style="width: 70px; height: 17px;"><span style="font-family:Times New Roman;font-size:12pt;">Gender:</span></td>
								<td colspan="1" style="height: 17px"><span style="font-family:Times New Roman;font-size:12pt;"><?php echo $pgender; ?> </span></td>
							</tr>  
							
							<tr>
								<td colspan="4" align="center"><span id="ContentPlaceHolder1_lblBank" style="font-family:Times New Roman;font-size:12pt;font-weight:bold;">Medical Bill Details</span><br /></td>
							</tr> 
							
							</table>
							
							<table width="100%" cellspacing="2">
								<tr><td colspan="4">

								<table width="100%" cellpadding="5" border="1px" id="table" style="height: 97px; margin-left:2px">
									<tr id="ContentPlaceHolder1_lblBank"style="background-color:gray; border-top-width: 1pt; border-top-color: #000000;font-weight:bold">
										<td style="font-family: 'Times New Roman', Times, serif; font-size: 12pt" width="20px">No </td>
										<td align="left" style="font-family: 'Times New Roman', Times, serif; font-size: 12pt">Service Category 
										</td>
										<td align="right" style="font-family: 'Times New Roman', Times, serif; font-size: 12pt">Service Name 
										</td>
										<td align="right" style="font-family: 'Times New Roman', Times, serif; font-size: 12pt">Amount</td>
									</tr>
									<?php
									$No = 0;
									$get_billinfo = mysqli_query($dbconnect,"SELECT * FROM tbl_billing WHERE bill_opno='$billopno' AND bill_visitno='$billvisitno'");
									while($bill = mysqli_fetch_array($get_billinfo)){
										$No = $No+1;
										$bill_amount = $bill['bill_amount'];
										$bill_category = $bill['bill_category'];
										$bill_servicename = $bill['bill_servicename'];
										$bill_scheme = $bill['bill_paymentscheme'];
										$bill_datetime = $bill['bill_datetime'];
									?>
									<tr>
										<td style="font-family: 'Times New Roman', Times, serif; font-size: 12pt;width:20px;"><?php echo $No; ?></td>
										<td align="left" style="font-family: 'Times New Roman', Times, serif; font-size: 12pt"><?php echo $bill_category; ?></td>
										<td align="right" style="font-family: 'Times New Roman', Times, serif; font-size: 12pt"><?php echo $bill_servicename; ?></td>
										<td align="right" style="font-family: 'Times New Roman', Times, serif; font-size: 12pt"><?php echo number_format($bill_amount); ?></td>
									</tr>
									<?php
									}
									$gettotalsbills = mysqli_query($dbconnect,"SELECT SUM(bill_amount) AS totalBill FROM tbl_billing WHERE bill_opno='$billopno' AND bill_visitno='$billvisitno'");
									$geT = mysqli_fetch_array($gettotalsbills);
									$totalbilled = $geT['totalBill'];
									?>
									<tr>
										<td colspan="3" style="font-family: 'Times New Roman', Times, serif; font-size: 12pt;width:10px;text-align:right;font-weight:bolder">TOTAL</td>
										<td align="right" style="font-family: 'Times New Roman', Times, serif; font-size: 14pt"><strong><span><?php echo number_format($totalbilled); ?></span></strong></td>
									</tr>
									<?php
									?>
								</table>
							</td>

							</tr>
							 </table>
									   <tr align="center" style="font-family: 'Times New Roman', Times, serif; font-size: 10px; border-top-style: solid; border-top-width: 1pt; border-top-color: #000000"><td valign="bottom" style="font-family: 'Times New Roman', Times, serif; font-size: 12px; border-top-style: solid; border-top-width: 1px; border-top-color: #ff0000">At Mpeli Medical Clinic - We Treat God Heals</td></tr>
							 </td></tr> 
							 </table>

								
							</div>
							</div>
							</div>
						
							<button onclick="printDiv('printableArea')" class="btn btn-primary"><i class="fa fa-print"></i> Print Bill Report</button> | 
							<!--<a href="printbill.php?visit_id=<?php echo $billvisitno; ?>&opno=<?php echo $billopno;?>"><button class="btn btn-primary"><i class="fa fa-print"></i> Print PDF </button></a>-->
                   		
            </div>
            </div>
        </div>
		
		
		<?php include 'includes/footer.php'?>
    </div>
    </div>
	<script>
	
			
    </script>
   <?php include 'includes/footer-scripts.php';?>
   <script src="js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
       <!-- Data Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="js/plugins/dataTables/dataTables.tableTools.min.js"></script>

    <!-- Page-Level Scripts -->
   
<style>
    body.DTTT_Print {
        background: #fff;

    }
    .DTTT_Print #page-wrapper {
        margin: 0;
        background:#fff;
    }

    button.DTTT_button, div.DTTT_button, a.DTTT_button {
        border: 1px solid #e7eaec;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }
    button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
        border: 1px solid #d2d2d2;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }

    .dataTables_filter label {
        margin-right: 5px;

    }
</style>
</body>
</html>

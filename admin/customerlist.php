<?php 
include("config.php"); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Page title -->
    <title>Customer List :: POS DYNAMICS(P) Ltd</title>
    <?php include("css.php"); ?>
</head>
<body class="fixed-navbar fixed-sidebar"><!-- Header -->
<?php include"top.php" ?>
<!-- Navigation -->
<?php include"side.php" ?>
<!-- Main Wrapper -->
<div id="wrapper">
    <div class="color-line"></div>
	<div class="panel-body topbreadcrumb">
            <div id="hbreadcrumb" class="pull-right">
                <ol class="hbreadcrumb breadcrumb">
                    <li><a href="<?php echo URL ?>dashboard">Dashboard</a></li>
                    <li>
                        <span>CUSTOMER</span>
                    </li>
                    <li class="active">
                        <span>Customer List</span>
                    </li>
                </ol>
            </div>
            <h4 class="font-light m-b-xs">
                Customer List 
            </h4>
			<!--
			<h4 class="font-light m-b-xs">
                Customer List - <a href="<?php echo URL ?>customer"><span class="label label-danger" style="padding: 0px 4px 1px 4px;font-size: 12px;font-weight: 500;">Add New</span></a>
            </h4>-->
    </div>
	<div class="content animate-panel">
        <div class="hpanel">
				<form method="post">
                <div class="panel-body" >
				<div class="fixed-table-body" style="overflow-x: auto;overflow-y: auto;height: 100%;padding-top: 30px;">
                <table id="example2" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Customer ID</th>
							<th>Name</th>
							<th>Mobile No</th>
                            <th>Email</th>
							<th>Company Name</th>
							<th>GST No</th>
							<th>Location</th>
							<th>Date of Join</th>
							<th>Actions</th> 
						</tr>
					</thead>
					<tbody>
					<?php
						$sel=mysqli_query($conn , "select *from tbl_customer order by customer_id desc");
						while($res=mysqli_fetch_assoc($sel))
						{
							$district=mysqli_fetch_assoc(mysqli_query($conn, "select *from tbl_districts where district_id='".$res["cust_district1"]."'"));					
							?>
							<tr>
								<td><?php echo $res["cust_id_prefix"]?><?php echo $res["cust_id"]?></td>
								<td><?php echo $res["cust_fname"]?><?php echo $res["cust_lastname"]?></td>
								<td><?php echo $res["cust_mobileno"]?></td>
								<td><?php echo $res["cust_emailid1"]?></td>
								<td><?php echo $res["cust_compname"]?></td>
								<td><?php echo $res["cust_gstno"]?></td>
								<td><?php echo $district["name"]?></td>
								<td><?php echo $res["joining_date"]?></td>
								
								<td>								
									&nbsp;
									<a href="<?php echo URL."view-customer/".$res["customer_id"];?>" title="View" >
										<i class="fa fa-eye"></i>
									</a>
									<!--&nbsp;
									<a href="<?php echo URL."customer/".$res["customer_id"];?>" title="Edit" >
										<i class="fa fa-pencil"></i>
									</a>-->
									&nbsp;								
									<a title="Delete" onclick="deleterec('<?php echo $res["customer_id"]?>','customer_id','tbl_customer','','customerlist')">
										<i class="fa fa-trash"></i>
									</a>
								</td> 
							</tr>
							<?php
						}
						?>
					</tbody>
                </table>
                </div>
				</div>
        </div>
        </div>
    </div>
        </div>
	</div>	
</div>
<?php include("footer.php"); ?>
</body>
</html>				
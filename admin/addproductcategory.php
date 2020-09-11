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
    <title><?php echo $title ?></title>
    <?php include("css.php"); ?>
</head>
<body class="fixed-navbar fixed-sidebar">


<!-- Header -->
<?php include"top.php" ?>

<!-- Navigation -->
<?php include"side.php" ?>

<!-- Main Wrapper -->
<div id="wrapper">
    <div class="color-line"></div>
	<div class="panel-body topbreadcrumb">
            <div id="hbreadcrumb" class="pull-right">
                <ol class="hbreadcrumb breadcrumb">
                    <li><a href="<?php echo URL ?>dashboard/">DASHBOARD</a></li>
                    <li>
                        <span>SETTINGS</span>
                    </li>
                    <li class="active">
                        <span>Product Category</span>
                    </li>
                </ol>
            </div>
            <h4 class="font-light m-b-xs">
                Product Category
            </h4>
    </div>
	<div class="content animate-panel">
    <div>
	<?php
		$resp=mysqli_fetch_assoc(mysqli_query($conn, "select *from tbl_product_category where product_category='".$_GET["product_category"]."'"));	
	?>
	<form name="project-details" method="post" class="form-horizontal" enctype="multipart/form-data">
		<div class="col-lg-12" style="background-color:#fff">
			<div class="row" style="background-color:#fff">
				<div class="col-lg-12">	
					<div class="panel-body">
						<div class="col-md-4">
							<div class="form-group">
								 <label>Product Category Name</label>
								 <input type="text" name="child" id="child" autocomplete="off" autofocus required placeholder="Enter Product Category Name" class="form-control">
							</div><div class="clearfix"></div>
						</div>
						<div class="col-md-1"></div>
						<div class="col-md-2">
							<div class="form-group">
								 <label>&nbsp;</label><br>
								 <input type="submit" id="button" name="submit" value="Submit" class="btn btn-primary">
							</div><div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
    </form>
	<script>
		$('input[name="child"]').val('<?php echo $resp["productcategoryname"]?>');
		//$('textarea[name="des"]').val('<?php echo $resp["des"]?>');
	</script>
    <?php				 
		if(isset($_POST["submit"]))
		{
			$child=str_replace("'","",$_POST["child"]);
			//$des=str_replace("'","",$_POST["des"]);
			
			date_default_timezone_set('Asia/Kolkata');
			$date = date('Y-m-d');
			if($_GET["product_category"]=='')
			{
				$n=mysqli_query($conn , "INSERT INTO tbl_product_category(productcategoryname,date) VALUES ('$child','$date')");
			}
			else
			{
				$n=mysqli_query($conn , "update tbl_product_category set productcategoryname='$child' where product_category='".$_GET["product_category"]."'");
			}
			echo '<script type="text/javascript">alert("Updated Successfully.");window.location.href="'.URL.'addproductcategory/";</script>';					
		}
	  ?> 
</div>
     
    <div class="clearfix"></div>
        <div class="hpanel">
          		<?php
					echo "<br><h4 style='text-transform:capitalize'>Product Category List</h4>";
				?>
                <div class="panel-body">
				<div class="fixed-table-body" style="overflow-x: auto;overflow-y: auto;height: 100%;padding-top: 30px;">
                <table id="example2" class="table table-striped table-bordered table-hover" >
                <thead>
					<tr>
						<th>S.No</th>
						<th style='text-transform:capitalize'>Product Category Name</th>
						<th>Actions</th> 
					</tr>
                </thead>
                <tbody>
					<?php
						$i=1;
						$sel=mysqli_query($conn , "select *from tbl_product_category order by product_category asc");
						while($res=mysqli_fetch_assoc($sel))
						{
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $res["productcategoryname"]; ?></td>							
								<td style="width:1%">
									<a href="<?php echo URL."addproductcategory/".$res["product_category"];?>">
										<i class="fa fa-pencil"></i>
									</a>
									&nbsp;&nbsp;
									<a onclick="deleterec1('<?php echo $res["product_category"]?>','product_category.','tbl_product_category','','-')">
										<i class="fa fa-trash"></i>
									</a>
								</td> 
							</tr>
							<?php
							$i++;
						}
					?>     
					<script> 
						function deleterec1(id, delcol, table , imagecol, page)
						{ 
							var c=window.confirm("Are you sure to Delete..");
							if(c)
							{
								$.get("<?php echo URL ?>scripts.php?action=deleterec&table="+table+"&page="+page+"&imagecol="+imagecol+"&id="+id+"&delcol="+delcol+"&rpage="+page , dispdeleterec1);		
							}
						}

						function dispdeleterec1(rpage)
						{  
							window.location.href="<?php echo URL ?>addproductcategory/<?php echo $_GET["product_category"] ; ?>";
						}
					</script>                    
                </tbody>
                </table>
                </div>
                </div>
            </div>
        </div>

    </div>
    </div>

 
</div>

<!-- Vendor scripts -->
<?php include("footer.php"); ?>
</body>
 
</html>
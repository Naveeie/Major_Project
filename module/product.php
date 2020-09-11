<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Product : POS Dynamics</title>
<!-- Stylesheets -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="css/responsive.css" rel="stylesheet">
</head>

<body>
<div class="page-wrapper">
 	
    <!-- Preloader -->
    <?php include'header.php'; ?>
    <?php
	    $product_name=mysqli_fetch_assoc(mysqli_query($conn , "select *from tbl_product_category where product_category='".$_GET["product_category"]."' "));
	?>
    <!--Page Title-->
    <section class="page-title" style="background-image:url(images/pos_banner1.jpg);">
        <div class="auto-container">
            <h1><?php echo $product_name["productcategoryname"]; ?></h1>
            <ul class="bread-crumb">
            	<li><a href="index.php">Home</a></li>
                <li><a href="#">Our Product</a></li>
				<li><a href="#"><?php echo $product_name["productcategoryname"]; ?></a></li>
            </ul>
        </div>
        <!--Go Down Button-->
        <div class="go-down">
            <div class="curve scroll-to-target" data-target="#sidebar-section"><span class="icon fa fa-arrow-down"></span></div>
        </div>
    </section>
    
    <!--Sidebar Section-->
    <div class="sidebar-section no-bg" id="sidebar-section">
    	
        <div class="auto-container">
        	<div class="row clearfix">
            	
                <!--Content Side-->
                <div class="col-md-9 col-sm-8 col-xs-12 content-side pull-right">
    				<!--Services Section-->
                    <!-- .shop-page-content -->
                    <div class="shop-page-content">
                        <div class="row">
                            <?php
							$sel5=mysqli_query($conn , "select *from tbl_product where product_category='".$_GET["product_category"]."' order by p_id desc");
							while($res5=mysqli_fetch_assoc($sel5))
							{
							?>
							<div class="col-lg-4 single-shop-item">
                                <img src="admin/<?php echo $res5["product_image"] ?>" alt="">
                                <div class="meta">
                                    <h4><a href="product-details.php?p_id=<?php echo $res5["p_id"] ?>"><?php echo $res5["product_name"] ?></a></h4>
                                    <a href="product-details.php?p_id=<?php echo $res5["p_id"] ?>" class="add-to-cart hvr-bounce-to-right">More Details</a>
                                </div>
                            </div>
							<?php } ?>
                        </div>      
                    </div> <!-- /.shop-page-content -->
                </div>
                <!--Sidebar-->
                <div class="col-md-3 col-sm-4 col-xs-12 pull-left">
                	<?php include'right-side-product.php'; ?>
                </div>
                
    		</div>
        </div>
    </div>
    
    <?php include'footer.php'; ?>
    
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="#main-header"><span class="fa fa-arrow-up"></span></div>
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-parallax.js"></script>
<script src="js/bxslider.js"></script>
<script src="js/owl.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/wow.js"></script>
<script src="js/js-collection.js"></script>
<script src="js/script.js"></script>
</body>

<!-- Mirrored from hasan.themexlab.com/new/hope-medical/hope-medical/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Sep 2018 10:50:58 GMT -->
</html>

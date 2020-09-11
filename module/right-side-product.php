<aside class="sidebar">
	<!--Categories-->
	<div class="widget links-widget">
		<h3>Our Products</h3>
		<ul>
			<?php
			$sel5=mysqli_query($conn , "select *from tbl_product_category order by product_category asc");
			while($res5=mysqli_fetch_assoc($sel5))
			{
			?>
			<li><a href="product.php?product_category=<?php echo $res5["product_category"] ?>"><?php echo $res5["productcategoryname"] ?></a></li>
			<?php } ?>
		</ul>
	</div>
</aside>

	<div class = "centerbox">
		<!-- display a table of products -->
        <table>
			<!-- First row,Table head-->
			<tr>
                <th>Nước uống</th>
                <th>Mô tả</th>
				<th>Kích thước</th>
                <th>Giá</th>
                <th>Số lượng</th> 
			</tr> 
			<!-- Loop through the products array, and list them under the first row-->
            <?php foreach ($products as $product) : ?>
				<tr>
					<td><b><?php echo $product['prodName']; ?></b> </td>
					<td><?php echo $product["prodType"]; ?></td>
					<td><?php echo $product['prodSize']; ?></td>
					<td class="right"><b><?php echo "$" . $product['prodUnitPrice']; ?></b></td>
									
					<td>
						<!-- addToCart.php will be triggered when a user hits "Add to Cart,"-->
						<form action = "addToCart.php" method="post">
							<input type="number" name="quantity">
							<!-- hidden fields -->
							<input type="hidden" name="prodID"
								value="<?php echo $product['prodID']; ?> ">
							<input type="hidden" name="prodName"
								value="<?php echo $product['prodName']; ?> ">
							<input type="hidden" name="prodType"
								value="<?php echo $product['prodType']; ?> ">
							<input type="hidden" name="prodUnitPrice"
								value=" <?php echo $product['prodUnitPrice']; ?> ">
							<input type="hidden" name="prodSize"
							   value="<?php echo $product['prodSize']; ?> ">  
							<input type="submit" name = "action" value="Add To Cart">
						</form>
					</td>		
				</tr>
			
            <?php endforeach; ?>
        </table>
		
		<br><br>
		<div class="btn-group">	
			<form action ="viewCart.php" method = "get" id = "View_Cart">
				<button class ="button" type="submit" value="Submit">Xem giỏ hàng</button>
			</form>
		</div>
	</div>
			<?php require_once("../inc/footer.php"); ?>
	
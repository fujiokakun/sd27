<?php require_once('../../private/initialize.php') ?>


<?php

	// Create new product record in database:
	$args = $_POST['product'];
	$args_stock = $_POST['stock'];
	$args_origin = $_POST['origin'];

	$product = new Product($args);
	$stock = new Stock($args_stock);
	$origin = new Origin($args_origin);

	$stock->product_id = $_POST['product']['product_id'];
	$origin->product_id = $_POST['product']['product_id'];

//	$product->merge_attributed($args);
	$result = $product->save();
	$stock->update();
	$origin->update();

//	$new_id = $product->product_id;

?>
	<section>
		<div class="container-fluid">
			<div class="row mb-5">
				<div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
					<div class="row align-items-center">

						<div class="col-12 mt-5">
							<p class="text-left display-3"></p>
						</div>
						<div class="col-12 col-xl-6">
							<h3 class="text-secondary text-center mb-3">商品管理</h3>
							<table class="table table-bordered table-striped bg-light text-center">
								<tbody>
								<?php // Populate product table:

									$products = Product::find_by_id($_POST['product']['product_id']);


									foreach ($products as $product) {
										echo "<tr>";

										echo "<td class='bg-dark text-white w-25'>商品番号 : </td>";
										echo "<td class='w-75 text-left'>" . $product->product_id . $_POST['stock']['stock_id'] ."</td>";

										echo "</tr>";
										echo "<tr>";

										echo "<td class='bg-dark text-white w-25'>商品名 : </td>";
										echo "<td class='w-75 text-left'>" . $product->product_name . "</td>";

										echo "</tr>";
										echo "<tr>";

										echo "<td class='bg-dark text-white w-25'>単価 : </td>";
										echo "<td class='w-75 text-left'>" . $product->price . "</td>";

										echo "</tr>";
										echo "<tr>";

										echo "<td class='bg-dark text-white w-25'>性別 : </td>";
										echo "<td class='w-75 text-left'>" . $product->gender . "</td>";

										echo "</tr>";
										echo "<tr>";

										echo "<td class='bg-dark text-white w-25'>詳細 : </td>";
										echo "<td class='w-75 text-left'>" . $product->description . "</td>";

										echo "</tr>";

									}
								?>

								</tbody>
							</table>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>



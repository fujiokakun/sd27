<?php require_once('../../private/initialize.php') ?>


<?php

	// Create new product record in database:
	$args_product = $_POST['product'];
	$args_origin = $_POST['origin'];

	$product = new Product($args_product);
	$result = $product->save();
	$new_id = $product->product_id;

	$origin = new Origin($args_origin);
	$origin->product_id = $new_id;
	$result = $origin->create();

	$args_stock = ["product_id"=>$new_id, "size_s"=>0 ,"size_m"=>0, "size_l"=>0, "size_xl"=>0];
	$stock = new Stock($args_stock);
	$result = $stock->create();


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

								$products = Product::find_by_id($new_id);


								foreach ($products as $product) {
									echo "<tr>";

									echo "<td class='bg-dark text-white w-25'>商品番号 : </td>";
									echo "<td class='w-75 text-left'>" . $product->product_id . "</td>";

									echo "</tr>";
									echo "<tr>";

									echo "<td class='bg-dark text-white w-25'>商品名 : </td>";
									echo "<td class='w-75 text-left'>" . $product->product_name . "</td>";

									echo "</tr>";
									echo "<tr>";

									echo "<td class='bg-dark text-white w-25'>国 : </td>";
									echo "<td class='w-75 text-left'>" .$origin->country . "</td>";

									echo "</tr>";
									echo "<tr>";

									echo "<td class='bg-dark text-white w-25'>大陸 : </td>";
									echo "<td class='w-75 text-left'>" . $origin->continent . "</td>";

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



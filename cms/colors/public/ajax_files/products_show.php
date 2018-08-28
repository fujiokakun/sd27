<?php require_once('../../private/initialize.php') ?>
<?php $product_id = $_POST["product_id"]; ?>


<section>
	<div class="container-fluid">
		<div class="row mb-5">
			<div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
				<div class="row align-items-center">

					<div class="col-12 mt-5">
						<p class="text-left display-3"></p>
					</div>
					<div class="col-12 col-xl-6">
						<h3 class="text-secondary text-center mb-3">商品詳細</h3>
						<table class="table table-bordered table-striped bg-light text-center">
							<tbody>
							<?php // Populate product table:

								$products = Product::find_by_id($product_id);
								$origin = Origin::find_by_sql("SELECT * FROM origin WHERE product_id ='{$product_id}'");
								$stock = Stock::find_by_sql("SELECT * FROM stock WHERE product_id ='{$product_id}'");

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
									echo "<td class='w-75 text-left'>" . $origin[0]->country . "</td>";

									echo "</tr>";
									echo "<tr>";

									echo "<td class='bg-dark text-white w-25'>大陸 : </td>";
									echo "<td class='w-75 text-left'>" . $origin[0]->continent . "</td>";

									echo "</tr>";
									echo "<tr>";

									echo "<td class='bg-dark text-white w-25'>単価 : </td>";
									echo "<td class='w-75 text-left'>¥" . $product->price . "</td>";

									echo "</tr>";
									echo "<tr>";

									echo "<td class='bg-dark text-white w-25'>性別 : </td>";
									echo "<td class='w-75 text-left'>" . $product->gender . "</td>";

									echo "</tr>";
									echo "<tr>";

									echo "<td class='bg-dark text-white w-25'>詳細 : </td>";
									echo "<td class='w-75 text-left'>" . $product->description . "</td>";

									echo "</tr>";
									echo "<tr>";

									echo "<td class='bg-dark text-white w-25'>在庫 : </td>";
									echo "<td class='w-75 text-left'>" . $stock[0]->size_s . "(s), ". $stock[0]->size_m . "(m), ". $stock[0]->size_l . "(l), " . $stock[0]->size_xl . "(xl) ". "</td>";

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


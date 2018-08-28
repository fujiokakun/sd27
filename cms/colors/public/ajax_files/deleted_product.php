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

								$product = Product::find_by_id($product_id);
								$result = $product[0]->delete();


								echo "<tr>";

								echo "<td class='bg-dark text-white w-25'>商品番号 : </td>";
								echo "<td class='w-75 text-left text-success'>" . $product[0]->product_id . "を削除しました。</td>";

								echo "</tr>";


							?>

							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>


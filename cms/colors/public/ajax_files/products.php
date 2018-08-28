<?php require_once('../../private/initialize.php') ?>

<section>
	<div class="container-fluid">
		<div class="row mb-5">
			<div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
				<div class="row align-items-center">

					<div class="col-12 mt-5">
						<p class="text-left display-3"></p>
					</div>

					<div class="col-12">
						<h3 class="text-secondary text-center mb-3">商品管理</h3>
						<div class="row mb-1">
							<div class="col-12 text-left">
								<a href="#" onclick="add_new_product()" class="btn"><i
											class="fas align-middle fa-plus-circle fa-2x text-primary"></i><span
											class="ml-2 align-middle">商品追加</span></a>
							</div>
						</div>
						<table class="table table-bordered table-striped bg-light text-center">
							<thead>
							<tr class="text-white bg-dark">
								<th>商品番号</th>
								<th>商品名</th>
								<th>国</th>
								<th>詳細</th>
								<th>編集</th>
								<th>削除</th>
							</tr>
							</thead>
							<tbody>
							<?php // Populate product table:


								$current_page = $_GET['page'] ?? 1;
								$per_page = 5;
								$total_count = Product::count_all();

								// $products = Product::find_all();
								// use pagination instead
								$pagination = new Pagination($current_page, $per_page, $total_count);

								$sql = "SELECT * FROM product ";
								$sql .= "LIMIT {$per_page} ";
								$sql .= "OFFSET {$pagination->offset()}";
								$products = Product::find_by_sql($sql);


								foreach ($products as $product) {
									echo "<tr>";
									echo "<th>" . $product->product_id . "</th>";
									echo "<td>" . $product->product_name . "</td>";
									$id_dummy = intval($product->product_id);

									$origin = Origin::find_by_id($product->product_id);

									echo "<td>" . $origin[0]->country . "</td>";
									echo "<td> <a onclick='replaceText_with_id(\"products_show.php\", $id_dummy)' href=\"#\" ><i class=\"fas fa-file-alt fa-lg text-primary mr-2\"></i></a></td>";
									echo "<td> <a onclick='replaceText_with_id(\"products_edit.php\", $id_dummy)' href=\"#\" ><i class=\"fas fa-edit fa-lg text-success mr-2\"></i></a></td>";
									echo "<td> <a onclick='delete_product_btn($id_dummy)' href=\"#\" ><i class=\"fas fa-trash-alt fa-lg text-danger mr-2\"></i></a></td>";
									echo "</tr>";
								}
							?>

							</tbody>
						</table>
						<!-- pagination -->
						<?php

							echo "<nav>
									<ul class=\"pagination justify-content-center\">";

							if ($pagination->total_pages() > 1) {

								if($pagination->previous_page() != false) {
									echo "<li class=\"page-item\">
											<a onclick='products_pagination(\"products.php";
									echo "?page={$pagination->previous_page()}";
									echo "\")' href=\"#\" class=\"page-link py-2 px-3\">
												<span>前へ</span>
											</a>
										</li>
									";
								}

//
//

								for($i=1; $i <= $pagination->total_pages(); $i++){
									echo "<li class=\"page-item ";
									if($i == $pagination->current_page) {
										echo " active\"> ";
									} else {
										echo " \"> ";
									}

									echo "<a href=\"#\" class=\"page-link py-2 px-3\" onclick='products_pagination(\"products.php?page={$i}\")'>{$i}</a></li>";
								}



								if($pagination->next_page() != false) {
									echo "<li class=\"page-item\"><a onclick='products_pagination(\"products.php";
									echo "?page={$pagination->next_page()}";
									echo "\")' href=\"#\" class=\"page-link py-2 px-3\"><span>次へ</span></a></li></ul></nav>";
								}


							}

						?>


						<!-- end of pagination -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>




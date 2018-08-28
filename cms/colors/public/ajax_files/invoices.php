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
						<h3 class="text-secondary text-center mb-3">オーダー管理</h3>

						<table class="table table-bordered table-striped bg-light text-center">
							<thead>
							<tr class="text-white bg-dark">
								<th>受注番号</th>
								<th>ユーザ名</th>
								<th>受注日時</th>
								<th>合計</th>
								<th>ステータス</th>
								<th>詳細</th>
								<th>編集</th>

							</tr>
							</thead>
							<tbody>
							<?php // Populate product table:

								$invoices_dummy = Invoices_summary::find_all();
								$array_length = COUNT($invoices_dummy);

								$current_page = $_GET['page'] ?? 1;
								$per_page = 5;
								$total_count = $array_length;

								$pagination = new Pagination($current_page, $per_page, $total_count);

								$invoices_summary = Invoices_summary::find_by_sql("SELECT invoices.invoice_id AS 'invoice_id', CONCAT(users.last_name,\" \", users.first_name) AS user_name, invoices.date_time AS 'date_time', FORMAT(SUM(product.price*(invoice_detail.quantity_s+invoice_detail.quantity_m+invoice_detail.quantity_l+invoice_detail.quantity_xl)), 0) AS 'total',invoices.order_status AS 'order_status' FROM invoices INNER JOIN users ON invoices.user_id = users.user_id INNER JOIN invoice_detail ON invoice_detail.invoice_id = invoices.invoice_id INNER JOIN product ON invoice_detail.product_id = product.product_id GROUP BY invoices.invoice_id LIMIT {$per_page} OFFSET {$pagination->offset()}");



								foreach ($invoices_summary as $invoice_summary) {

									echo "<tr>";
									echo "<td>" . $invoice_summary->invoice_id . "</td>";
									echo "<td>" . $invoice_summary->user_name . "</td>";
									echo "<td>" . $invoice_summary->date_time . "</td>";
									echo "<td>¥". $invoice_summary->total . "</td>";
									echo "<td>" . $invoice_summary->order_status . "</td>";
									$id_dummy = intval($invoice_summary->invoice_id);
									echo "<td> <a onclick='replaceText_with_invoice_id(\"invoice_show.php\", $id_dummy)' href=\"#\" ><i class=\"fas fa-file-alt fa-lg text-primary mr-2\"></i></a></td>";
									echo "<td> <a onclick='replaceText_with_invoice_id(\"invoice_edit.php\", $id_dummy)' href=\"#\" ><i class=\"fas fa-edit fa-lg text-success mr-2\"></i></a></td>";
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
											<a onclick='products_pagination(\"invoices.php";
									echo "?page={$pagination->previous_page()}";
									echo "\")' href=\"#\" class=\"page-link py-2 px-3\">
												<span>前へ</span>
											</a>
										</li>
									";
								}

//
								for($i=1; $i <= $pagination->total_pages(); $i++){
									echo "<li class=\"page-item ";
									if($i == $pagination->current_page) {
										echo " active\"> ";
									} else {
										echo " \"> ";
									}

									echo "<a href=\"#\" class=\"page-link py-2 px-3\" onclick='invoices_pagination(\"invoices.php?page={$i}\")'>{$i}</a></li>";
								}



								if($pagination->next_page() != false) {
									echo "<li class=\"page-item\"><a onclick='invoices_pagination(\"invoices.php";
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




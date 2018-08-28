<?php require_once('../../private/initialize.php') ?>
<?php $invoice_id = $_POST["invoice_id"]; ?>


<section>
	<div class="container-fluid">
		<div class="row mb-5">
			<div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
				<div class="row align-items-center">

					<div class="col-12 mt-5">
						<p class="text-left display-3"></p>
					</div>
					<div class="col-12 col-xl-6">
						<h3 class="text-secondary text-center mb-3">オーダー詳細</h3>
						<table class="table table-bordered table-striped bg-light text-center">
							<tbody>
							<?php // Populate product table:

								$invoices = Invoice::find_by_invoice_id($invoice_id);
								$invoices_detail = Invoice_detail::find_by_sql("SELECT * FROM invoice_detail WHERE invoice_id = {$invoice_id}");


								echo "<tr>";

								echo "<td class='bg-dark text-white w-25'>オーダー番号 : </td>";
								echo "<td class='w-75 text-left'>" . $invoices[0]->invoice_id . "</td>";

								echo "</tr>";
								echo "<tr>";

								echo "<td class='bg-dark text-white w-25'>ユーザー番号 : </td>";
								echo "<td class='w-75 text-left'>" . $invoices[0]->user_id . "</td>";

								echo "</tr>";

								$users = User::find_by_id($invoices[0]->user_id);

								echo "<tr>";

								echo "<td class='bg-dark text-white w-25'>ユーザー名 : </td>";
								echo "<td class='w-75 text-left'>" . $users[0]->last_name . " " . $users[0]->first_name . "</td>";

								echo "</tr>";
								echo "<tr>";

								echo "<td class='bg-dark text-white w-25'>受注日時 : </td>";
								echo "<td class='w-75 text-left'>" . $invoices[0]->date_time . "</td>";

								echo "</tr>";
								echo "<tr>";

								echo "<td class='bg-dark text-white w-25'>ステータス : </td>";
								echo "<td class='w-75 text-left'>" . $invoices[0]->order_status . "</td>";

								echo "</tr>";



								foreach ($invoices_detail as $invoice_detail) {
									$products = Product::find_by_id($invoice_detail->product_id);

									echo "<tr>";
									echo "<td class='bg-dark text-white w-25'>商品番号:</td>";
									echo "<td class='w-75 text-left'>{$products[0]->product_id}</td>";
									echo "</tr>";
									echo "<tr>";
									echo "<td class='bg-dark text-white w-25'>商品名:</td>";
									echo "<td class='w-75 text-left'>{$products[0]->product_name}</td>";
									echo "</tr>";
									echo "<tr>";
									echo "<td class='bg-dark text-white w-25'>数:</td>";
									echo "<td class='w-75 text-left'>S({$invoice_detail->quantity_s}), M({$invoice_detail->quantity_m}), L({$invoice_detail->quantity_l}), XL({$invoice_detail->quantity_xl})</td>";
									echo "</tr>";
									echo "<tr>";

								}

								$payments = Payment::find_by_invoice_id($invoice_detail->invoice_id);
								echo "<td class='bg-dark text-white w-25'>決済方法:</td>";
								echo "<td class='w-75 text-left'>{$payments[0]->payment_method} </td>";
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


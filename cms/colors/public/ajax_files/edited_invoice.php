<?php require_once('../../private/initialize.php') ?>


<?php

	// Create new product record in database:

	$invoice_id = intval($_POST['invoice']['invoice_id']) ;

	Invoice::update_by_sql("UPDATE invoices SET order_status = '{$_POST['invoice']['order_status']}' WHERE invoice_id = {$invoice_id}");




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
						<h3 class="text-secondary text-center mb-3">ユーザー詳細</h3>
						<table class="table table-bordered table-striped bg-light text-center">
							<tbody>
							<?php
								$invoices = Invoice::find_by_invoice_id($invoice_id);

								echo "<tr>";
								echo "<td class='bg-dark text-white w-25'>オーダー番号 :</td>";
								echo "<td class='w-75 text-center'>{$invoices[0]->invoice_id}</td>";
								echo "</tr>";

								echo "<tr>";
								echo "<td class='bg-dark text-white w-25'>ステータス :</td>";
								echo "<td class='w-75 text-center'>{$invoices[0]->order_status}</td>";
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



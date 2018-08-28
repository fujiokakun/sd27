<?php require_once('../../private/initialize.php') ?>
<?php

	$invoice_id = $_POST["invoice_id"];

	$invoices = Invoice::find_by_invoice_id($invoice_id);


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
						<h3 class="text-secondary text-center mb-3">商品編集</h3>

						<form id="submit_edited_invoice_form_element">

							<div class="form-group">
								<label for="invoice[invoice_id]" class="font-weight-bold">オーダー番号 :</label>
								<input type="text" class="form-control-plaintext" id="invoice_id" name="invoice[invoice_id]"
									   value="<?php echo trim(h($invoices[0]->invoice_id)) ?>"
									   placeholder="<?php echo trim(h($invoices[0]->invoice_id)) ?>" readonly>
							</div>



							<div class="form-group">
								<label for="invoice[order_status]" class="font-weight-bold">ステータス :</label>
								<select class="form-control" id="order_status" name="invoice[order_status]">
									<option <?php if (h($invoices[0]->order_status) == "入金待ち") {
										echo "selected";
									} ?>>入金待ち
									</option>
									<option <?php if (h($invoices[0]->order_status) == "発送待ち") {
										echo "selected";
									} ?>>発送待ち
									</option>
									<option <?php if (h($invoices[0]->order_status) == "配送中") {
										echo "selected";
									} ?>>配送中
									</option>
									<option <?php if (h($invoices[0]->order_status) == "配送済み") {
										echo "selected";
									} ?>>配送済み
									</option>
									<option <?php if (h($invoices[0]->order_status) == "キャンセル") {
										echo "selected";
									} ?>>キャンセル
									</option>
								</select>
							</div>



							<div class="form-group text-center mb-5 mt-5">
								<button onclick="replaceText_with_form_edited_invoice_data('edited_invoice.php')" type="button"
										class="btn btn-primary">送信
								</button>
							</div>


						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>




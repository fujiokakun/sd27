<?php require_once('../../private/initialize.php') ?>
<?php

	$product_id = $_POST["product_id"];

	$product = Product::find_by_id($product_id);
	$origin = Origin::find_by_sql("SELECT * FROM origin WHERE product_id ='{$product_id}'");
	$stock = Stock::find_by_sql("SELECT * FROM stock WHERE product_id ='{$product_id}'");


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

						<form id="submit_edited_product_form_element">

							<div class="form-group">
								<label for="product[product_id]" class="font-weight-bold">商品番号</label>
								<input type="text" class="form-control-plaintext" id="product_id"
									   name="product[product_id]" value="<?php echo h($product[0]->product_id) ?>"
									   placeholder="<?php echo h($product[0]->product_id) ?>" readonly>
							</div>
							<div class="form-group">
								<label for="product[product_name]" class="font-weight-bold">商品名</label>
								<input type="text" class="form-control" id="product_name" name="product[product_name]"
									   value="<?php echo h($product[0]->product_name) ?>">
							</div>

							<div class="form-group">
								<label for="origin[country]" class="font-weight-bold">国</label>
								<input type="text" class="form-control" id="country" name="origin[country]"
									   value="<?php echo h($origin[0]->country) ?>">
							</div>


							<div class="form-group">
								<label for="origin[continent]" class="font-weight-bold">大陸</label>
								<select class="form-control" id="continent" name="origin[continent]">
									<option <?php if (h($origin[0]->continent) == "北アメリカ") {
										echo "selected";
									} ?>>北アメリカ
									</option>
									<option <?php if (h($origin[0]->continent) == "南アメリカ") {
										echo "selected";
									} ?>>南アメリカ
									</option>
									<option <?php if (h($origin[0]->continent) == "南極") {
										echo "selected";
									} ?>>南極
									</option>
									<option <?php if (h($origin[0]->continent) == "アフリカ") {
										echo "selected";
									} ?>>アフリカ
									</option>
									<option <?php if (h($origin[0]->continent) == "ヨーロッパ") {
										echo "selected";
									} ?>>ヨーロッパ
									</option>
									<option <?php if (h($origin[0]->continent) == "アジア") {
										echo "selected";
									} ?>>アジア
									</option>
									<option <?php if (h($origin[0]->continent) == "オーストラリア") {
										echo "selected";
									} ?>>オーストラリア
									</option>
								</select>
							</div>

							<div class="form-group">
								<label for="product[price]" class="font-weight-bold">単価 (¥)</label>
								<input type="text" class="form-control" id="price" name="product[price]"
									   value="<?php echo h($product[0]->price) ?>">
							</div>

							<div class="form-group">
								<label for="stock[size_s]" class="font-weight-bold">在庫 (S)</label>
								<input type="text" class="form-control" id="size_s" name="stock[size_s]"
									   value="<?php echo h($stock[0]->size_s) ?>">
							</div>
							<div class="form-group">
								<label for="stock[size_m]" class="font-weight-bold">在庫 (M)</label>
								<input type="text" class="form-control" id="size_m" name="stock[size_m]"
									   value="<?php echo h($stock[0]->size_m) ?>">
							</div>
							<div class="form-group">
								<label for="stock[size_l]" class="font-weight-bold">在庫 (L)</label>
								<input type="text" class="form-control" id="size_l" name="stock[size_l]"
									   value="<?php echo h($stock[0]->size_l) ?>">
							</div>
							<div class="form-group">
								<label for="stock[size_xl]" class="font-weight-bold">在庫 (XL)</label>
								<input type="text" class="form-control" id="size_xl" name="stock[size_xl]"
									   value="<?php echo h($stock[0]->size_xl) ?>">
							</div>

							<div class="form-group">
								<label for="product[gender]" class="font-weight-bold">性別</label>
								<select class="form-control" id="gender" name="product[gender]">
									<option <?php if (h($product[0]->gender) == "メンズ") {
										echo "selected";
									} ?>>メンズ
									</option>
									<option <?php if (h($product[0]->gender) == "レディース") {
										echo "selected";
									} ?>>レディース
									</option>
									<option <?php if (h($product[0]->gender) == "メンズ・レディース") {
										echo "selected";
									} ?>>メンズ・レディース
									</option>
								</select>
							</div>
							<div class="form-group">
								<label for="product[description]" class="font-weight-bold">詳細</label>
								<textarea type="text" class="form-control" id="description" name="product[description]"
										  rows="5"
										  value="<?php echo h($product[0]->description) ?>"><?php echo h($product[0]->description) ?></textarea>
							</div>

							<div class="form-group text-center mb-5 mt-5">
								<button onclick="replaceText_with_form_edited_data('edited_product.php')" type="button"
										class="btn btn-primary">送信
								</button>
							</div>
							<div class="form-group">
								<label for="stock[stock_id]" class="font-weight-bold"></label>
								<input type="hidden" name="stock[stock_id]" value="000004">
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>




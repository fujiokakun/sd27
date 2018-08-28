<?php require_once('../../private/initialize.php') ?>


<section>
	<div class="container-fluid">
		<div class="row mb-5">
			<div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
				<div class="row align-items-center">

					<div class="col-12 mt-5">
						<p class="text-left display-3"></p>
					</div>

					<div class="col-12 col-xl-6">
						<h3 class="text-secondary text-center mb-3">商品追加</h3>
						<form id="submit_new_product_form_element">

							<div class="form-group">
								<label for="product[product_name]" class="control-label">商品名</label>
								<input type="text" class="form-control" id="product_name" name="product[product_name]" placeholder="チュッタイ">
							</div>

							<div class="form-group">
								<label for="origin[country]" class="control-label">国</label>
								<input type="text" class="form-control" id="country" name="origin[country]" placeholder="国名">
							</div>

							<div class="form-group">
								<label for="origin[continent]" class="control-label">大陸</label>
								<select class="form-control" id="continent" name="origin[continent]">
									<option value="北アメリカ" selected>北アメリカ</option>
									<option value="南アメリカ">南アメリカ</option>
									<option value="南極">南極</option>
									<option value="アフリカ">アフリカ</option>
									<option value="ヨーロッパ">ヨーロッパ</option>
									<option value="アジア">アジア</option>
									<option value="オーストラリア">オーストラリア</option>
								</select>
							</div>

							<div class="form-group">
								<label for="product[price]" class="control-label">単価</label>
								<input type="text" class="form-control" id="price" name="product[price]" placeholder="7000">
							</div>

							<div class="form-group">
								<label for="product[gender]" class="control-label">性別</label>
								<select class="form-control" id="gender" name="product[gender]">
									<option value="メンズ" selected>メンズ</option>
									<option value="レディース">レディース</option>
									<option value="メンズ・レディース">メンズ・レディース</option>
								</select>
							</div>

							<div class="form-group">
								<label for="product[description]" class="control-label">詳細</label>
								<textarea type="text" class="form-control" id="description" name="product[description]" rows="5"  placeholder="詳細"></textarea>
							</div>


							<div class="form-group text-center">
								<button onclick="replaceText_with_form_data('added_product.php')" type="button" class="btn btn-primary">追加</button>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script src="script.js"></script>


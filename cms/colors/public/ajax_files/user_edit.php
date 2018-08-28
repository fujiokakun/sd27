<?php require_once('../../private/initialize.php') ?>
<?php

	$user_id = $_POST["product_id"];

	$users = User::find_by_id($user_id);
	$users_address = User_address::find_by_id($user_id);


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
								<label for="user[user_id]" class="font-weight-bold">ユーザー番号 :</label>
								<input type="text" class="form-control-plaintext" id="user_id" name="user[user_id]"
									   value="<?php echo trim(h($users[0]->user_id)) ?>"
									   placeholder="<?php echo trim(h($product[0]->product_id)) ?>" readonly>
							</div>
							<div class="form-group">
								<label for="user[last_name]" class="font-weight-bold">姓 :</label>
								<input type="text" class="form-control" id="last_name" name="user[last_name]"
									   value="<?php echo trim(h($users[0]->last_name)) ?>">
							</div>

							<div class="form-group">
								<label for="user[first_name]" class="font-weight-bold">名：</label>
								<input type="text" class="form-control" id="first_name" name="user[first_name]"
									   value="<?php echo trim(h($users[0]->first_name)) ?>">
							</div>

							<div class="form-group">
								<label for="user[last_name_furigana]" class="font-weight-bold">姓（ふりがな） : </label>
								<input type="text" class="form-control" id="last_name_furigana"
									   name="user[last_name_furigana]"
									   value="<?php echo trim(h($users[0]->last_name_furigana)) ?>">
							</div>

							<div class="form-group">
								<label for="user[first_name_furigana]" class="font-weight-bold">名（ふりがな） : </label>
								<input type="text" class="form-control" id="first_name_furigana"
									   name="user[first_name_furigana]"
									   value="<?php echo trim(h($users[0]->first_name_furigana)) ?>">
							</div>

							<div class="form-group">
								<label for="user[birthday]" class="font-weight-bold">生年月日 :</label>
								<input type="text" class="form-control" id="birthday" name="user[birthday]"
									   value="<?php echo trim(h($users[0]->birthday)) ?>">
							</div>

							<div class="form-group">
								<label for="user[email]" class="font-weight-bold">E-mail :</label>
								<input type="text" class="form-control" id="email" name="user[email]"
									   value="<?php echo trim(h($users[0]->email)) ?>">
							</div>

							<div class="form-group">
								<label for="user[login_name]" class="font-weight-bold">ログイン名 :</label>
								<input type="text" class="form-control" id="login_name" name="user[login_name]"
									   value="<?php echo trim(h($users[0]->login_name)) ?>">
							</div>


							<div class="form-group">
								<label for="user[gender]" class="font-weight-bold">性別 :</label>
								<select class="form-control" id="gender" name="user[gender]">
									<option <?php if (h($users[0]->gender) == "男") {
										echo "selected";
									} ?>>男
									</option>
									<option <?php if (h($users[0]->gender) == "女") {
										echo "selected";
									} ?>>女
									</option>
									<option <?php if (h($users[0]->gender) == "未回答") {
										echo "selected";
									} ?>>未回答
									</option>
								</select>
							</div>

							<div class="form-group">
								<label for="user[tel]" class="font-weight-bold">電話番号 :</label>
								<input type="text" class="form-control" id="tel" name="user[tel]"
									   value="<?php echo trim(h($users[0]->tel)) ?>">
							</div>

							<div class="form-group">
								<label for="user_address[postal_code]" class="font-weight-bold">郵便番号 :</label>
								<input type="text" class="form-control" id="postal_code"
									   name="user_address[postal_code]"
									   value="<?php echo trim(h($users_address[0]->postal_code)) ?>">
							</div>

							<div class="form-group">
								<label for="user_address[province]" class="font-weight-bold">都道府県 :</label>
								<input type="text" class="form-control" id="province" name="user_address[province]"
									   value="<?php echo trim(h($users_address[0]->province)) ?>">
							</div>

							<div class="form-group">
								<label for="user_address[detail]" class="font-weight-bold">住所 :</label>
								<textarea type="text" class="form-control" id="detail" rows="2"
										  name="user_address[detail]"><?php echo trim(h($users_address[0]->detail)) ?></textarea>
							</div>

							<div class="form-group">
								<label for="user_address[address_id]" class="font-weight-bold"></label>
								<input type="hidden" class="form-control" id="address_id"
									   name="user_address[address_id]"
									   value="<?php echo trim(h($users_address[0]->address_id)) ?>">
							</div>


							<div class="form-group text-center mb-5">
								<button onclick="replaceText_with_form_edited_data('edited_user.php')" type="button"
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




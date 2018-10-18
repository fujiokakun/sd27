<?php

	$user_id = $_COOKIE['user_id'];


	$dsn = 'mysql:host=localhost;dbname=colors';
	$db = new PDO($dsn, 'root', 'root');


	try {

		$sql = 'SELECT * FROM users INNER JOIN user_Address USING(user_id) WHERE user_id = :user_id ';


		$stmt = $db->prepare($sql);
		$stmt->bindParam(':user_id', $user_id);
		$stmt->execute();

		$sql_prefecture = "SELECT * FROM prefecture";
		$stmt_prefecture = $db->prepare($sql_prefecture);
		$stmt_prefecture->execute();


		$errorInfo = $stmt->errorInfo();
		if (isset($errorInfo[2])) {
			$error = $errorInfo[2];
			echo $error;
		}


		// Fetching results:
		while ($user_row = $stmt->fetch()) { ?>
			<div class="user_box_wrapper">
				<div class="user_box">
					<h1>ユーザーID : <?php echo $user_id ?></h1>
					<h3>氏名 :</h3>
					<p>
						<label for="">姓 :</label>
						<input type="text" name="last_name" id="last_name" placeholder="<?php echo $user_row['last_name'] ?>">
					</p>
					<p>
						<label for="">名 :</label>
						<input type="text" name="first_name" id="first_name" placeholder="<?php echo $user_row['first_name'] ?>">
					</p>

					<h3>氏名 フリガナ :</h3>
					<p>
						<label for="">セイ :</label>
						<input type="text" name="last_name_furigana" id="last_name_furigana" placeholder="<?php echo $user_row['last_name_furigana'] ?>">
					</p>
					<p>
						<label for="">メイ :</label>
						<input type="text" name="first_name_furigana" id="first_name_furigana" placeholder="<?php echo $user_row['first_name_furigana'] ?>">
					</p>

					<h3>生年月日 :</h3>
						<input type="date" name="birthday" id="birthday" value="<?php echo $user_row['birthday'] ?>">

					<h3>E-mail :</h3>
					<input type="email" name="email" id="email" value="<?php echo $user_row['email'] ?>">

					<h3>ログイン名 :</h3>
					<input type="text" name="login_name" id="login_name" value="<?php echo $user_row['login_name'] ?>">

					<h3>性別 :</h3>
					<select name="gender" id="gender">
						<option value="男" <?php if($user_row['gender'] == '男') { echo "selected"; } ?>>男</option>
						<option value="女" <?php if($user_row['gender'] == '女') { echo "selected"; } ?>>女</option>
					</select>

					<h3>電話番号 :</h3>
					<input type="text" name="tel" id="tel" value="<?php echo $user_row['tel'] ?>">

					<h3>郵便番号 :</h3>
					<input type="text" name="postal_code" id="postal_code" value="<?php echo $user_row['postal_code'] ?>">

					<h3>都道府県 :</h3>
					<select name="prefecture" id="prefecture">
					<?php

						while ($prefecture = $stmt_prefecture->fetch()) {

							echo "<option";
							echo " value='" . $prefecture['name'] . "'";

							if($user_row['province'] === $prefecture['name']) {
								echo " selected>";
							} else {
								echo "> ";
							}

							echo $prefecture['name'] . "</option>";

						}

					?>
					</select>

					<h3>住所 :</h3>
					<input type="text" name="detail" id="detail" value="<?php echo $user_row['detail'] ?>">

					<h3>パスワード更新 :</h3>
					<input type="password" name="password1" id="password1" value="<?php echo $user_row['password1'] ?>">

					<h3>パスワード確認 :</h3>
					<input type="password" name="password2" id="password2" value="<?php echo $user_row['password2'] ?>">



				</div>
			</div>






<!--						E-mail :-->
<!--						ログイン名 :-->
<!--						性別 :-->
<!--						電話番号 :-->
<!--						郵便番号 :-->
<!--						都道府県 :-->
<!--						住所 :-->



		<?php }


	} catch (Exception $e) {
		$error = $e->getMessage();
	}
?>


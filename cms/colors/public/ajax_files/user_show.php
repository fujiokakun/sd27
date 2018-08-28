<?php require_once('../../private/initialize.php') ?>
<?php $user_id = $_POST["user_id"]; ?>


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
							<?php // Populate product table:

								$users = User::find_by_id($user_id);
								$users_address = User_address::find_by_sql("SELECT * FROM user_address WHERE user_id = {$user_id}");

								foreach ($users as $user) {
									echo "<tr>";

									echo "<td class='bg-dark text-white w-25'>ユーザー番号 : </td>";
									echo "<td class='w-75 text-left'>" . $user->user_id . "</td>";

									echo "</tr>";
									echo "<tr>";

									echo "<td class='bg-dark text-white w-25'>名前 : </td>";
									echo "<td class='w-75 text-left'>" . $user->last_name. " " . $user->first_name . "</td>";

									echo "</tr>";
									echo "<tr>";

									echo "<td class='bg-dark text-white w-25'>ふりがな : </td>";
									echo "<td class='w-75 text-left'>" . $user->last_name_furigana. " " . $user->first_name_furigana . "</td>";

									echo "</tr>";
									echo "<tr>";

									echo "<td class='bg-dark text-white w-25'>生年月日 : </td>";
									echo "<td class='w-75 text-left'>" . $user->birthday."</td>";

									echo "</tr>";
									echo "<tr>";

									echo "<td class='bg-dark text-white w-25'>E-mail : </td>";
									echo "<td class='w-75 text-left'>" . $user->email."</td>";

									echo "</tr>";
									echo "<tr>";

									echo "<td class='bg-dark text-white w-25'>ログイン名 : </td>";
									echo "<td class='w-75 text-left'>" . $user->login_name."</td>";

									echo "</tr>";
									echo "<tr>";

									echo "<td class='bg-dark text-white w-25'>性別 : </td>";
									echo "<td class='w-75 text-left'>" . $user->gender."</td>";

									echo "</tr>";
									echo "<tr>";

									echo "<td class='bg-dark text-white w-25'>電話番号 : </td>";
									echo "<td class='w-75 text-left'>" . $user->tel."</td>";

									echo "</tr>";
									echo "<tr>";

									echo "<td class='bg-dark text-white w-25'>郵便番号 : </td>";
									echo "<td class='w-75 text-left'>" . $users_address[0]->postal_code."</td>";

									echo "</tr>";
									echo "<tr>";

									echo "<td class='bg-dark text-white w-25'>都道府県 : </td>";
									echo "<td class='w-75 text-left'>" . $users_address[0]->province."</td>";

									echo "</tr>";
									echo "<tr>";

									echo "<td class='bg-dark text-white w-25'>住所 : </td>";
									echo "<td class='w-75 text-left'>" . $users_address[0]->detail."</td>";

									echo "</tr>";



								}
							?>

							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>


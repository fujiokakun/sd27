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
						<h3 class="text-secondary text-center mb-3">商品詳細</h3>
						<table class="table table-bordered table-striped bg-light text-center">
							<tbody>
							<?php // Populate product table:

								$user = User::find_by_id($user_id);
								$result = $user[0]->delete();


								echo "<tr>";

								echo "<td class='bg-dark text-white w-25'>商品番号 : " . $user[0]->user_id . "</td>";

								if($result) {
									echo "<td class='w-75 text-left text-success'>削除しました。</td>";
								} else {
									echo "<td class='w-75 text-left text-danger'>外部キー制約のため、削除できませんでした。</td>";
								}




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


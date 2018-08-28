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
						<h3 class="text-secondary text-center mb-3">ユーザー管理</h3>

						<table class="table table-bordered table-striped bg-light text-center">
							<thead>
							<tr class="text-white bg-dark">
								<th>ユーザー番号</th>
								<th>名前</th>
								<th>ログイン名</th>
								<th>詳細</th>
								<th>編集</th>
								<th>削除</th>
							</tr>
							</thead>
							<tbody>
							<?php

								$current_page = $_GET['page'] ?? 1;
								$per_page = 5;
								$total_count = User::count_all();


								$pagination = new Pagination($current_page, $per_page, $total_count);

								$sql = "SELECT * FROM users ";
								$sql .= "LIMIT {$per_page} ";
								$sql .= "OFFSET {$pagination->offset()}";
								$users = User::find_by_sql($sql);

								foreach ($users as $user) {
									echo "<tr>";
									echo "<th>" . $user->user_id . "</th>";
									echo "<td>" . $user->last_name . " " . $user->first_name . "</td>";
									$id_dummy = intval($user->user_id);
									echo "<td>" . $user->login_name . "</td>";
									echo "<td> <a onclick='replaceText_with_user_id(\"user_show.php\", $id_dummy)' href=\"#\" ><i class=\"fas fa-file-alt fa-lg text-primary mr-2\"></i></a></td>";
									echo "<td> <a onclick='replaceText_with_id(\"user_edit.php\", $id_dummy)' href=\"#\" ><i class=\"fas fa-edit fa-lg text-success mr-2\"></i></a></td>";
									echo "<td> <a onclick='delete_user_btn($id_dummy)' href=\"#\" ><i class=\"fas fa-trash-alt fa-lg text-danger mr-2\"></i></a></td>";
									echo "</tr>";
								}
							?>


							<!--							--><?php //// Populate user table:
								//
								//								$users = User::find_all();
								//
								//
								//								foreach ($users as $user) {
								//									echo "<tr>";
								//									echo "<th>" . $user->user_id . "</th>";
								//									echo "<td>" . $user->last_name . " " . $user->first_name ."</td>";
								//									$id_dummy = intval($user->user_id);
								//									echo "<td>" . $user->login_name . "</td>";
								//									echo "<td> <a onclick='replaceText_with_user_id(\"user_show.php\", $id_dummy)' href=\"#\" ><i class=\"fas fa-file-alt fa-lg text-primary mr-2\"></i></a></td>";
								//									echo "<td> <a onclick='replaceText_with_id(\"user_edit.php\", $id_dummy)' href=\"#\" ><i class=\"fas fa-edit fa-lg text-success mr-2\"></i></a></td>";
								//									echo "<td> <a onclick='delete_user_btn($id_dummy)' href=\"#\" ><i class=\"fas fa-trash-alt fa-lg text-danger mr-2\"></i></a></td>";
								//									echo "</tr>";
								//								}
								//							?>

							</tbody>
						</table>
						<!-- pagination -->

						<?php

							echo "<nav><ul class=\"pagination justify-content-center\">";

							if ($pagination->total_pages() > 1) {

								if($pagination->previous_page() != false) {
									echo "<li class=\"page-item\"><a onclick='products_pagination(\"users.php";
									echo "?page={$pagination->previous_page()}";
									echo "\")' href=\"#\" class=\"page-link py-2 px-3\"><span>前へ</span></a></li>";
								}


								for($i=1; $i <= $pagination->total_pages(); $i++){
									echo "<li class=\"page-item ";
									if($i == $pagination->current_page) {
										echo " active\"> ";
									} else {
										echo " \"> ";
									}

									echo "<a href=\"#\" class=\"page-link py-2 px-3\" onclick='products_pagination(\"users.php?page={$i}\")'>{$i}</a></li>";
								}



								if($pagination->next_page() != false) {
									echo "<li class=\"page-item\"><a onclick='products_pagination(\"users.php";
									echo "?page={$pagination->next_page()}";
									echo "\")' href=\"#\" class=\"page-link py-2 px-3\"><span>次へ</span></a></li></ul></nav>";
								}


							}


						?>



<!--						<nav>-->
<!--							<ul class="pagination justify-content-center">-->
<!--								<li class="page-item">-->
<!--									<a href="#" class="page-link py-2 px-3">-->
<!--										<span>前へ</span>-->
<!--									</a>-->
<!--								</li>-->
<!--								<li class="page-item active">-->
<!--									<a href="#" class="page-link py-2 px-3">-->
<!--										1-->
<!--									</a>-->
<!--								</li>-->
<!--								<li class="page-item">-->
<!--									<a href="#" class="page-link py-2 px-3">-->
<!--										2-->
<!--									</a>-->
<!--								</li>-->
<!--								<li class="page-item">-->
<!--									<a href="#" class="page-link py-2 px-3">-->
<!--										3-->
<!--									</a>-->
<!--								</li>-->
<!--								<li class="page-item">-->
<!--									<a href="#" class="page-link py-2 px-3">-->
<!--										<span>次へ</span>-->
<!--									</a>-->
<!--								</li>-->
<!--							</ul>-->
<!--						</nav>-->
						<!-- end of pagination -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>





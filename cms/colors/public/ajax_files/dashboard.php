<?php require_once('../../private/initialize.php') ?>
<section>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
				<div class="row pt-md-5 mt-md-3 mb-5">
					<div class="col-xl-3 col-sm-6 p-2">
						<div class="card card-common">
							<div class="card-body">
								<div class="d-flex justify-content-between">
									<i class="fas fa-shopping-cart fa-3x text-warning"></i>
									<div class="text-right text-secondary">
										<h5>売り上げ</h5>
										<?php
											$sales = Product::find_by_sql("SELECT FORMAT(SUM(product.price*(invoice_detail.quantity_s+invoice_detail.quantity_m+invoice_detail.quantity_l+invoice_detail.quantity_xl)), 0) AS 'total' FROM product INNER JOIN invoice_detail ON product.product_id = invoice_detail.product_id");
										?>
										<h3>¥<?php echo $sales[0]->total ?></h3>
									</div>
								</div>
							</div>
							<div class="card-footer text-secondary">
								<i class="fas fa-sync mr-3"></i>
								<span>更新する</span>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 p-2">
						<div class="card card-common">
							<div class="card-body">
								<div class="d-flex justify-content-between">
									<i class="fas fa-users fa-3x text-success"></i>
									<div class="text-right text-secondary">
										<h5>ユーザー</h5>
										<?php
											$users = User::find_all();
										?>
										<h3><?php echo count($users) ?>人</h3>
									</div>
								</div>
							</div>
							<div class="card-footer text-secondary">
								<i class="fas fa-sync mr-3"></i>
								<span>更新する</span>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 p-2">
						<div class="card card-common">
							<div class="card-body">
								<div class="d-flex justify-content-between">
									<i class="fas fa-tshirt fa-3x text-info"></i>
									<div class="text-right text-secondary">
										<h5>商品</h5>
										<?php
											$products = Product::find_all();
										?>
										<h3><?php echo count($products) ?>種類</h3>
									</div>
								</div>
							</div>
							<div class="card-footer text-secondary">
								<i class="fas fa-sync mr-3"></i>
								<span>更新する</span>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 p-2">
						<div class="card card-common">
							<div class="card-body">
								<div class="d-flex justify-content-between">
									<i class="fas fa-chart-line fa-3x text-danger"></i>
									<div class="text-right text-secondary">
										<h5>アクセス数</h5>
										<?php
											$visitor_count = Visitor_count::find_all();
										?>
										<h3><?php echo $visitor_count[0]->count ?>回</h3>
										<?php
											$visitors = $visitor_count[0]->count + 1;
											Visitor_count::find_by_sql_extra("UPDATE visitor_count SET COUNT = " . $visitors ." LIMIT 1 ");
										?>
									</div>
								</div>
							</div>
							<div class="card-footer text-secondary">
								<i class="fas fa-sync mr-3"></i>
								<span>更新する</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end of cards -->


<!-- Order / Product tables -->
<section>
	<div class="container-fluid">
		<div class="row mb-5">
			<div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
				<div class="row align-items-center">
					<div class="col-xl-6 col-12 mb-4 mb-xl-0">
						<h3 class="text-muted text-center mb-3">オーダー</h3>
						<table class="table table-striped bg-light text-center">
							<thead>
							<tr class="text-muted">
								<th>注文番号</th>
								<th>注文日</th>
								<th>合計</th>
								<th>ステータス</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$order_summaries = Order_summary::find_by_sql("SELECT invoices.invoice_id, invoices.date_time , FORMAT(SUM(product.price*(invoice_detail.quantity_s+invoice_detail.quantity_m+invoice_detail.quantity_l+invoice_detail.quantity_xl)), 0) AS 'total', invoices.order_status FROM product INNER JOIN invoice_detail ON product.product_id = invoice_detail.product_id INNER JOIN invoices ON invoice_detail.invoice_id = invoices.invoice_id GROUP BY invoice_detail.invoice_id DESC LIMIT 5");
							?>
							<?php
								foreach ($order_summaries as $order_summary) {
									echo "<tr>";
									echo "<td>". $order_summary->invoice_id ."</td>";
									echo "<td>". $order_summary->date_time ."</td>";
									echo "<td class='text-right'>¥". $order_summary->total ."</td>";
									echo "<td ";
									if($order_summary->order_status == "入金待ち" ) {
										echo "class=\"badge badge-success text-white w-100 mt-1\"";
									} elseif ($order_summary->order_status == "発送待ち") {
										echo "class=\"badge badge-primary text-white w-100 mt-1\"";
									} elseif ($order_summary->order_status == "配送中") {
										echo "class=\"badge badge-warning text-white w-100 mt-1\"";
									} elseif ($order_summary->order_status == "配送済み") {
										echo "class=\"badge badge-info text-white w-100 \"";
									} else {
										echo "class=\"badge badge-danger text-white w-100 \"";
									}
									echo ">". $order_summary->order_status ."</td>";
									echo "</tr>";

								}

							?>
							</tbody>
						</table>

					</div>
					<div class="col-xl-6 col-12">
						<h3 class="text-muted text-center mb-3">新着商品</h3>
						<table class="table table-dark table-hover text-center">
							<thead>
							<tr class="text-muted">
								<th>商品番号</th>
								<th>商品名</th>
								<th>単価</th>
								<th>性別</th>
							</tr>
							</thead>
							<tbody>
							<?php // Populate product table:

								$products = Product::find_by_sql("SELECT * FROM product ORDER BY product_id DESC LIMIT 5");

								foreach ($products as $product) {
									echo "<tr>";
									echo "<th>" . $product->product_id . "</th>";
									echo "<td>" . $product->product_name . "</td>";
									echo "<td>¥" . $product->price . "</td>";
									echo "<td>" . $product->gender . "</td>";
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
<!-- end of tables -->


<!-- progress / task list -->
<section>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
				<div class="row mb-4 align-items-top">
					<div class="col-xl-6 col-12 mb-4 mb-xl-0 mt-5">
						<div class="bg-dark text-white p-4 rounded">
							<h4 class="mb-5">コンバージョン率</h4>
							<h6 class="mb-3">Google Chrome</h6>
							<div class="progress mb-4" style="height: 20px">
								<div class="progress-bar progress-bar-striped font-weight-bold" style="width: 91%">
									91%
								</div>
							</div>
							<h6 class="mb-3">Mozilla Firefox</h6>
							<div class="progress mb-4" style="height: 20px">
								<div class="progress-bar progress-bar-striped font-weight-bold bg-success"
									 style="width: 82%">
									82%
								</div>
							</div>
							<h6 class="mb-3">Safari</h6>
							<div class="progress mb-4" style="height: 20px">
								<div class="progress-bar progress-bar-striped font-weight-bold bg-danger"
									 style="width: 67%">
									67%
								</div>
							</div>
							<h6 class="mb-3">IE</h6>
							<div class="progress mb-4" style="height: 20px">
								<div class="progress-bar progress-bar-striped font-weight-bold bg-info"
									 style="width: 10%">
									10%
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-12 mb-4 mb-xl-0">
						<div class="row align-items-center mb-5">
							<div class="col-12">
								<h4 class="text-muted mb-4">メッセージ</h4>
								<div id="accordion">

									<div class="card">
										<div class="card-header">
											<button class="btn btn-block bg-secondary text-light text-left"
													data-toggle="collapse" data-target="#collapseOne">
												<img src="images/cust1.jpeg" width="50" class="mr-3 rounded">
												ウィリーがコメントした
											</button>
										</div>
										<div class="collapse" id="collapseOne" data-parent="#accordion">
											<div class="card-body">
												Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam
												tempore
												commodi consequuntur, neque quas fugit eius expedita
												molestias repudiandae debitis porro rem temporibus architecto
												voluptatum.
											</div>
										</div>
									</div>

									<div class="card">
										<div class="card-header">
											<button class="btn btn-block bg-secondary text-light text-left"
													data-toggle="collapse" data-target="#collapseTwo">
												<img src="images/cust2.jpeg" width="50" class="mr-3 rounded">
												菊田がコメントした
											</button>
										</div>
										<div class="collapse" id="collapseTwo" data-parent="#accordion">
											<div class="card-body">
												Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam
												tempore
												commodi consequuntur, neque quas fugit eius expedita
												molestias repudiandae debitis porro rem temporibus architecto
												voluptatum.
											</div>
										</div>
									</div>

									<div class="card">
										<div class="card-header">
											<button class="btn btn-block bg-secondary text-light text-left"
													data-toggle="collapse" data-target="#collapseThree">
												<img src="images/cust3.jpeg" width="50" class="mr-3 rounded">
												菊田がコメントした
											</button>
										</div>
										<div class="collapse" id="collapseThree" data-parent="#accordion">
											<div class="card-body">
												Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam
												tempore
												commodi consequuntur, neque quas fugit eius expedita
												molestias repudiandae debitis porro rem temporibus architecto
												voluptatum.
											</div>
										</div>
									</div>

									<div class="card">
										<div class="card-header">
											<button class="btn btn-block bg-secondary text-light text-left"
													data-toggle="collapse" data-target="#collapseFour">
												<img src="images/cust4.jpeg" width="50" class="mr-3 rounded">
												菊田がコメントした
											</button>
										</div>
										<div class="collapse" id="collapseFour" data-parent="#accordion">
											<div class="card-body">
												Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam
												tempore
												commodi consequuntur, neque quas fugit eius expedita
												molestias repudiandae debitis porro rem temporibus architecto
												voluptatum.
											</div>
										</div>
									</div>

									<div class="card">
										<div class="card-header">
											<button class="btn btn-block bg-secondary text-light text-left"
													data-toggle="collapse" data-target="#collapseFive">
												<img src="images/cust5.jpeg" width="50" class="mr-3 rounded">
												菊田がコメントした
											</button>
										</div>
										<div class="collapse" id="collapseFive" data-parent="#accordion">
											<div class="card-body">
												Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam
												tempore
												commodi consequuntur, neque quas fugit eius expedita
												molestias repudiandae debitis porro rem temporibus architecto
												voluptatum.
											</div>
										</div>
									</div>

									<div class="card">
										<div class="card-header">
											<button class="btn btn-block bg-secondary text-light text-left"
													data-toggle="collapse" data-target="#collapseSix">
												<img src="images/cust6.jpeg" width="50" class="mr-3 rounded">
												菊田がコメントした
											</button>
										</div>
										<div class="collapse" id="collapseSix" data-parent="#accordion">
											<div class="card-body">
												Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam
												tempore
												commodi consequuntur, neque quas fugit eius expedita
												molestias repudiandae debitis porro rem temporibus architecto
												voluptatum.
											</div>
										</div>
									</div>

								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
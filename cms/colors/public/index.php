<?php require_once('../private/initialize.php') ?>

<?php $page_title = 'COLORS ・ CMS'; ?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="title icon" href="images/title-img.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
		  integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
		  crossorigin="anonymous">
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js"
			integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe"
			crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<title>管理システム</title>
</head>

<body>


<!-- navbar -->
<nav class="navbar navbar-expand-md navbar-light">
	<button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#myNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="myNavbar">
		<div class="container-fluid">
			<div class="row">
				<!-- sidebar -->
				<div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top">
					<a href="#"
					   class="navbar-brand text-white d-block mx-auto text-center py-3 mb-4 bottom-border logo-spacing">COLORS</a>
					<div class="bottom-border pb-3">
						<img src="images/admin.jpeg" width="50" class="rounded-circle mr-3">
						<a href="#" class="text-white">アパナンダ</a>
					</div>
					<ul class="navbar-nav flex-column mt-4">
						<li class="nav-item" id="side_menu_01">
							<a href="#" class="nav-link text-white p-3 mb-2 sidebar_status menu01 current">
								<i class="fas fa-home text-light fa-lg mr-3"></i>Dashboard</a>
						</li>
						<li class="nav-item" id="side_menu_02">
							<a href="#" class="nav-link text-white p-3 mb-2 sidebar_status menu02 sidebar-link">
								<i class="fas fa-user text-light fa-lg mr-3"></i>ユーザー管理</a>
						</li>
						<li class="nav-item" id="side_menu_03">
							<a href="#" class="nav-link text-white p-3 mb-2 sidebar_status menu03 sidebar-link">
								<i class="fas fa-shopping-cart text-light fa-lg mr-3"></i>注文管理</a>
						</li>
						<li class="nav-item" id="side_menu_04">
							<a href="#" class="nav-link text-white p-3 mb-2 sidebar_status menu04 sidebar-link">
								<i class="fas fa-tshirt text-light fa-lg mr-3"></i>商品管理</a>
						</li>
						<li class="nav-item" id="side_menu_07">
							<a href="#" class="nav-link text-white p-3 mb-2 sidebar_status menu07 sidebar-link">
								<i class="fas fa-upload text-light fa-lg mr-3"></i>アップロード</a>
						</li>
						<li class="nav-item" id="side_menu_05">
							<a href="#" class="nav-link text-white p-3 mb-2 sidebar_status menu05 sidebar-link">
								<i class="fas fa-envelope text-light fa-lg mr-3"></i>メッセージ</a>
						</li>


					</ul>
				</div>
				<!-- end of sidebar -->

				<!-- top-nav -->
				<div class="col-xl-10 col-lg-9 col-md-8 ml-auto bg-dark fixed-top py-2 top-navbar">
					<div class="row align-items-center">
						<div class="col-md-4">
							<h4 class="text-light text-uppercase mb-0">Dashboard</h4>
						</div>
						<div class="col-md-5">
							<form>
								<div class="input-group">
									<input type="text" class="form-control search-input" placeholder="検索...">
									<button type="button" class="btn btn-white search-button">
										<i class="fas fa-search text-danger"></i>
									</button>
								</div>
							</form>
						</div>
						<div class="col-md-3">
							<ul class="navbar-nav">
								<li class="nav-item icon-parent">
									<a href="#" class="nav-link icon-bullet">
										<i class="fas fa-comments text-muted fa-lg"></i>
									</a>
								</li>
								<li class="nav-item icon-parent">
									<a href="#" class="nav-link icon-bullet">
										<i class="fas fa-bell text-muted fa-lg"></i>
									</a>
								</li>
								<li class="nav-item ml-md-auto">
									<a href="#" class="nav-link" data-toggle="modal" data-target="#sign-out">
										<i class="fas fa-sign-out-alt text-danger fa-lg"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end of top-nav -->
			</div>
		</div>
	</div>
</nav>
<!-- end of navbar -->


<!-- modal -->
<div class="modal fade" id="sign-out">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title">Logout</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
				ログアウトしますか
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">ログアウト</button>
				<button type="button" class="btn btn-success" data-dismiss="modal">キャンセル</button>
			</div>

		</div>
	</div>
</div>


<!-- end of modal -->


<!-- cards -->
<div id="main_div">
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
												Visitor_count::find_by_sql_extra("UPDATE visitor_count SET COUNT = " . $visitors . " LIMIT 1 ");
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
							<h3 class="text-muted text-center my-2">オーダー</h3>
							<table class="table table-striped bg-light text-center">
								<thead>
								<tr class="text-muted">
									<th>注文番号</th>
									<th>受注日時</th>
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
</div>
<!-- end of progress / task list -->

<!--  footer-->
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
			<div class="row border-top pt-3">
				<div class="col-lg-6 text-center mt-2">
					<ul class="list-inline">
						<li class="list-inline-item mr-2">
							<a href="#" class="text-dark">COLORS</a>
						</li>
						<li class="list-inline-item mr-2">
							<a href="#" class="text-dark">サイトについて</a>
						</li>
						<li class="list-inline-item mr-2">
							<a href="#" class="text-dark">問い合わせ</a>
						</li>
					</ul>
				</div>
				<div class="col-lg-6 text-center">
					<p>&copy;
						<script>document.write(new Date().getFullYear())</script>
						. Made with
						<i class="fab fa-html5 text-warning fa-2x mr-1"></i>
						<i class="fab fa-css3-alt text-info fa-2x mr-1"></i>
						<i class="fab fa-js text-warning fa-2x mr-1"></i>
						<i class="fab fa-php text-primary fa-2x mr-1"></i>
						by
						<span class="text-danger">COLORS TEAM</span>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end of footer-->

<?php


	db_disconnect($database);

?>


<script
		src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
		integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
		crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
		integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
		crossorigin="anonymous"></script>
<script src="script.js"></script>
<script>

    $("body").tooltip({selector: '[data-toggle=tooltip]'});


    // ---------- Add eventListener to the sidebar menus ----------

    function replaceText(ajax_file_name) {
        let target = document.getElementById("main_div");
        let xhr = new XMLHttpRequest();
        xhr.open('GET', './ajax_files/' + ajax_file_name, true);
        xhr.onreadystatechange = function () {
            console.log('readyState: ' + xhr.readyState);
            if (xhr.readyState == 2) {
                target.innerHTML = 'Loading...';
            }
            if (xhr.readyState == 4 && xhr.status == 200) {
                target.innerHTML = xhr.responseText;
            }
        }
        xhr.send();
    }


    function replaceText_upload(ajax_file_name) {
        let target = document.getElementById("main_div");
        let xhr = new XMLHttpRequest();
        xhr.open('GET', './upload/' + ajax_file_name, true);
        xhr.onreadystatechange = function () {
            console.log('readyState: ' + xhr.readyState);
            if (xhr.readyState == 2) {
                target.innerHTML = 'Loading...';
            }
            if (xhr.readyState == 4 && xhr.status == 200) {
                target.innerHTML = xhr.responseText;
            }
        }
        xhr.send();
    }

    function products_pagination(ajax_file_name) {
        let target = document.getElementById("main_div");
        let xhr = new XMLHttpRequest();
        xhr.open('GET', './ajax_files/' + ajax_file_name, true);
        xhr.onreadystatechange = function () {
            console.log('readyState: ' + xhr.readyState);
            if (xhr.readyState == 2) {
                target.innerHTML = 'Loading...';
            }
            if (xhr.readyState == 4 && xhr.status == 200) {
                target.innerHTML = xhr.responseText;
            }
        }
        xhr.send();
    }

    function invoices_pagination(ajax_file_name) {
        let target = document.getElementById("main_div");
        let xhr = new XMLHttpRequest();
        xhr.open('GET', './ajax_files/' + ajax_file_name, true);
        xhr.onreadystatechange = function () {
            console.log('readyState: ' + xhr.readyState);
            if (xhr.readyState == 2) {
                target.innerHTML = 'Loading...';
            }
            if (xhr.readyState == 4 && xhr.status == 200) {
                target.innerHTML = xhr.responseText;
            }
        }
        xhr.send();
    }

    function replaceText_with_id(ajax_file_name, id) {

        let target = document.getElementById("main_div");
        let xhr = new XMLHttpRequest();

        xhr.open('POST', './ajax_files/' + ajax_file_name, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-Requested-with', 'XMLHttpRequest');

        let product_id = id;

        xhr.onreadystatechange = function () {
            console.log('readyState: ' + xhr.readyState);
            if (xhr.readyState == 2) {
                target.innerHTML = 'Loading...';
            }
            if (xhr.readyState == 4 && xhr.status == 200) {
                target.innerHTML = xhr.responseText;
            }
        }
        xhr.send("product_id=" + product_id);
    }





    function replaceText_with_user_id(ajax_file_name, id) {

        let target = document.getElementById("main_div");
        let xhr = new XMLHttpRequest();

        xhr.open('POST', './ajax_files/' + ajax_file_name, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-Requested-with', 'XMLHttpRequest');

        let user_id = id;

        xhr.onreadystatechange = function () {
            console.log('readyState: ' + xhr.readyState);
            if (xhr.readyState == 2) {
                target.innerHTML = 'Loading...';
            }
            if (xhr.readyState == 4 && xhr.status == 200) {
                target.innerHTML = xhr.responseText;
            }
        }
        xhr.send("user_id=" + user_id);
    }

    function replaceText_with_invoice_id(ajax_file_name, id) {

        let target = document.getElementById("main_div");
        let xhr = new XMLHttpRequest();

        xhr.open('POST', './ajax_files/' + ajax_file_name, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-Requested-with', 'XMLHttpRequest');

        let invoice_id = id;

        xhr.onreadystatechange = function () {
            console.log('readyState: ' + xhr.readyState);
            if (xhr.readyState == 2) {
                target.innerHTML = 'Loading...';
            }
            if (xhr.readyState == 4 && xhr.status == 200) {
                target.innerHTML = xhr.responseText;
            }
        }
        xhr.send("invoice_id=" + invoice_id);

    }

    function replaceText_with_form_data(ajax_file_name) {

        // gather form data:
        let form = document.getElementById('submit_new_product_form_element');
        let form_data = new FormData(form);
        for ([key, value] of form_data.entries()) {
            console.log(key + ': ' + value);
        }

        let target = document.getElementById("main_div");
        let xhr = new XMLHttpRequest();

        xhr.open('POST', './ajax_files/' + ajax_file_name, true);
        xhr.setRequestHeader('X-Requested-with', 'XMLHttpRequest');


        xhr.onreadystatechange = function () {
            console.log('readyState: ' + xhr.readyState);
            if (xhr.readyState == 2) {
                target.innerHTML = 'Loading...';
            }
            if (xhr.readyState == 4 && xhr.status == 200) {
                target.innerHTML = xhr.responseText;
            }
        }
        xhr.send(form_data);
    }


    function replaceText_with_form_edited_data(ajax_file_name) {

        // gather form data:
        let edit_form = document.getElementById('submit_edited_product_form_element');
        let edit_form_data = new FormData(edit_form);

        // [optional] console log values
        for ([key, value] of edit_form_data.entries()) {
            console.log(key + ': ' + value);
        }

        let target = document.getElementById("main_div");
        let xhr = new XMLHttpRequest();

        xhr.open('POST', './ajax_files/' + ajax_file_name, true);
        xhr.setRequestHeader('X-Requested-with', 'XMLHttpRequest');


        xhr.onreadystatechange = function () {
            console.log('readyState: ' + xhr.readyState);
            if (xhr.readyState == 2) {
                target.innerHTML = 'Loading...';
            }
            if (xhr.readyState == 4 && xhr.status == 200) {
                target.innerHTML = xhr.responseText;
            }
        }
        xhr.send(edit_form_data);
    }


    function replaceText_with_form_edited_invoice_data(ajax_file_name) {

        // gather form data:
        let edit_form = document.getElementById('submit_edited_invoice_form_element');
        let edit_form_data = new FormData(edit_form);

        // [optional] console log values
        for ([key, value] of edit_form_data.entries()) {
            console.log(key + ': ' + value);
        }

        let target = document.getElementById("main_div");
        let xhr = new XMLHttpRequest();

        xhr.open('POST', './ajax_files/' + ajax_file_name, true);
        xhr.setRequestHeader('X-Requested-with', 'XMLHttpRequest');


        xhr.onreadystatechange = function () {
            console.log('readyState: ' + xhr.readyState);
            if (xhr.readyState == 2) {
                target.innerHTML = 'Loading...';
            }
            if (xhr.readyState == 4 && xhr.status == 200) {
                target.innerHTML = xhr.responseText;
            }
        }
        xhr.send(edit_form_data);
    }


    $("#side_menu_01").click(function () {
        $('.sidebar_status').removeClass("current");
        $('.menu01').addClass("current");
        replaceText("dashboard.php");
    });

    $("#side_menu_02").click(function () {
        $('.sidebar_status').removeClass("current");
        $('.menu02').addClass("current");
        replaceText("users.php");
    });

    $("#side_menu_03").click(function () {
        $('.sidebar_status').removeClass("current");
        $('.menu03').addClass("current");
        replaceText("invoices.php");
    });

    $("#side_menu_04").click(function () {
        $('.sidebar_status').removeClass("current");
        $('.menu04').addClass("current");
        replaceText("products.php?page=1");
    });

    $("#side_menu_05").click(function () {
        $('.sidebar_status').removeClass("current");
        $('.menu05').addClass("current");

    });

    // $("#side_menu_06").click(function () {
    //     $('.sidebar_status').removeClass("current");
    //     $('.menu06').addClass("current");
	//
    // });

    $("#side_menu_07").click(function () {
        $('.sidebar_status').removeClass("current");
        $('.menu07').addClass("current");

        // ============================ UPLOAD ============================
        $('#main_div').load('./upload/index.html', function() {

            var app = app || {};

            (function(o) {
                "use strict";

                // Private methods
                var ajax, getFormData, setProgress;

                ajax = function(data) {
                    var xmlhttp = new XMLHttpRequest();
                    var uploaded;


                    xmlhttp.addEventListener('readystatechange', function() {
                        if(this.readyState === 4) {
                            if(this.status === 200) {

                                uploaded = JSON.parse(this.response);

                                if(typeof o.options.finished === 'function') {
                                    o.options.finished(uploaded);
                                }

                            } else {
                                if(typeof o.options.error === 'function') {
                                    o.options.error();
                                }
                            }
                        }
                    });

                    xmlhttp.upload.addEventListener('progress', function(e) {
                        var percent;

                        console.log(e);

                        if(e.lengthComputable === true) {
                            percent = Math.round((event.loaded / event.total) * 100);
                            setProgress(percent);
                        }
                    });

                    xmlhttp.open('post', o.options.processor);
                    xmlhttp.send(data);

                };

                getFormData = function(source) {
                    var data = new FormData();
                    var i;

                    for(i = 0; i < source.length; i++) {
                        data.append('files[]', source[i]);
                    }

                    return data;

                };

                setProgress = function(value) {
                    if(o.options.progressBar !== undefined) {
                        o.options.progressBar.style.width = value ? value + '%' : 0;
                    }
                    if(o.options.progressText !== undefined) {
                        o.options.progressText.textContent = value ? value + '%' : '';
                    }
                };

                o.uploader = function(options) {
                    o.options = options;

                    if(options.files !== undefined) {
                        ajax(getFormData(o.options.files));
                    }
                };


            }(app));




            (function () {
                "use strict";


                var dropZone = document.getElementById('drop-zone');
                var barFill = document.getElementById('bar-fill');
                var barFillText = document.getElementById('bar-fill-text');
                var uploadsFinished = document.getElementById('uploads-finished');

                var startUpload = function (files) {
                    app.uploader({
                        files: files,
                        progressBar: barFill,
                        progressText: barFillText,
                        processor: './upload/upload.php',

                        finished: function(data) {
                            var x;
                            var uploadedElement;
                            var uploadedAnchor;
                            var uploadedStatus;
                            var currFile;

                            for(x = 0; x< data.length; x = x + 1) {
                                currFile = data[x];

                                uploadedElement = document.createElement('div');
                                uploadedElement.className = 'upload-console-upload';

                                uploadedAnchor = document.createElement('a');
                                uploadedAnchor.textContent = currFile.name;

                                if(currFile.uploaded) {
                                    uploadedAnchor.href = './upload/uploads/' + currFile.file;
                                }

                                uploadedStatus = document.createElement('span');
                                uploadedStatus.textContent = currFile.uploaded ? 'Uploaded' : 'Failed';

                                uploadedElement.appendChild(uploadedAnchor);
                                uploadedElement.appendChild(uploadedStatus);

                                uploadsFinished.appendChild(uploadedElement);

                            }

                            uploadsFinished.className = '';

                        },

                        error: function() {
                            console.log('There was an error');
                        }
                    });
                };


                // Standard form upload
                document.getElementById('standard-upload').addEventListener('click', function(e) {
                    var standardUploadFiles = document.getElementById('standard-upload-files').files;
                    e.preventDefault();

                    startUpload(standardUploadFiles);
                })

                // Drop functionality
                dropZone.ondrop = function (e) {
                    e.preventDefault();
                    this.className = 'upload-console-drop';

                    startUpload(e.dataTransfer.files);
                }


                dropZone.ondragover = function () {
                    this.className = 'upload-console-drop drop';
                    return false;
                };

                dropZone.ondragleave = function () {
                    this.className = 'upload-console-drop';
                    return false;
                }


            }());

        });
        // replaceText_upload("index.html");
    });
    // ============================ END OF UPLOAD ============================








    // ---------- End of adding eventListener to the sidebar menus ----------


    function add_new_product() {
        replaceText("products_new.php");
    }


    // ---------- function for checking parameters in URL ----------
    function getAllUrlParams(url) {

        // get query string from url (optional) or window
        var queryString = url ? url.split('?')[1] : window.location.search.slice(1);

        // we'll store the parameters here
        var obj = {};

        // if query string exists
        if (queryString) {

            // stuff after # is not part of query string, so get rid of it
            queryString = queryString.split('#')[0];

            // split our query string into its component parts
            var arr = queryString.split('&');

            for (var i = 0; i < arr.length; i++) {
                // separate the keys and the values
                var a = arr[i].split('=');

                // in case params look like: list[]=thing1&list[]=thing2
                var paramNum = undefined;
                var paramName = a[0].replace(/\[\d*\]/, function (v) {
                    paramNum = v.slice(1, -1);
                    return '';
                });

                // set parameter value (use 'true' if empty)
                var paramValue = typeof(a[1]) === 'undefined' ? true : a[1];

                // (optional) keep case consistent
                paramName = paramName.toLowerCase();
                paramValue = paramValue.toLowerCase();

                // if parameter name already exists
                if (obj[paramName]) {
                    // convert value to array (if still string)
                    if (typeof obj[paramName] === 'string') {
                        obj[paramName] = [obj[paramName]];
                    }
                    // if no array index number specified...
                    if (typeof paramNum === 'undefined') {
                        // put the value on the end of the array
                        obj[paramName].push(paramValue);
                    }
                    // if array index number specified...
                    else {
                        // put the value at that index number
                        obj[paramName][paramNum] = paramValue;
                    }
                }
                // if param name doesn't exist yet, set it
                else {
                    obj[paramName] = paramValue;
                }
            }
        }

        return obj;
    }


    if (getAllUrlParams().page) {
        $('.sidebar_status').removeClass("current");
        $('.menu04').addClass("current");
        replaceText("products.php");
    }


    function delete_product_btn(product_id) {
        let delete_confirmation = confirm('削除しますか');
        if (delete_confirmation === true) {

            // delete record from database:
            replaceText_with_id('deleted_product.php', product_id);
        }
    }


    function delete_user_btn(user_id) {
        let delete_user_confirmation = confirm('ユーザーを削除しますか');
        if (delete_user_confirmation === true) {

            // delete record from database:
            replaceText_with_user_id('deleted_user.php', user_id);
        }
    }


</script>

</body>

</html>
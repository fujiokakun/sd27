<?php

	$user_id = $_COOKIE['user_id'];


	$dsn = 'mysql:host=localhost;dbname=colors';
	$db = new PDO($dsn, 'root', 'root');


	try {

		$sql = 'SELECT * FROM invoices WHERE user_id = :user_id ';


		$stmt = $db->prepare($sql);
		$stmt->bindParam(':user_id', $user_id);
		$stmt->execute();


		$errorInfo = $stmt->errorInfo();
		if (isset($errorInfo[2])) {
			$error = $errorInfo[2];
			echo $error;
		}


		// Fetching results:
		while($invoices_row = $stmt->fetch()) { ?>

			<div class="order_detail_box">
				<h1>注文の詳細</h1>
				<p>
					注文日: <?php echo $invoices_row['date_time'] . " | " . " 注文番号 " . $invoices_row['invoice_id'] ?>
				</p><br>
				<div class="detail1">

					<div class="address"><span>お届け先住所 :</span><br>

						<?php


							try {

								$sql = 'SELECT * FROM users WHERE user_id = :user_id ';


								$stmt2 = $db->prepare($sql);
								$stmt2->bindParam(':user_id', $user_id);
								$stmt2->execute();


								$errorInfo = $stmt2->errorInfo();
								if (isset($errorInfo[2])) {
									$error = $errorInfo[2];
									echo $error;
								}


								// Fetching results:
								$row = $stmt2->fetch();


							} catch (Exception $e) {
								$error = $e->getMessage();
							}
						?>

						<?php echo $row['last_name'] . " " . $row['first_name'] ?>

						<?php


							try {

								$sql = 'SELECT * FROM user_address WHERE user_id = :user_id ';


								$stmt3 = $db->prepare($sql);
								$stmt3->bindParam(':user_id', $user_id);
								$stmt3->execute();


								$errorInfo = $stmt3->errorInfo();
								if (isset($errorInfo[2])) {
									$error = $errorInfo[2];
									echo $error;
								}


								// Fetching results:
								$row = $stmt3->fetch();


							} catch (Exception $e) {
								$error = $e->getMessage();
							}
						?>

						<br>
						<?php echo substr_replace($row['postal_code'], '-', 3, 0) ?>
						<br>
						<?php echo $row['province'] ?>
						<br>
						<?php echo $row['detail'] ?>


					</div>

					<div class="payment"><span>支払い方法 :</span><br>

						<?php try {

							$sql = 'SELECT * FROM invoices inner join payment using(invoice_id) WHERE invoice_id = :invoice_id';


							$stmt4 = $db->prepare($sql);
							$stmt4->bindParam(':invoice_id', $invoices_row['invoice_id']);
							$stmt4->execute();


							$errorInfo = $stmt4->errorInfo();
							if (isset($errorInfo[2])) {
								$error = $errorInfo[2];
								echo $error;
							}


							// Fetching results:
							$row = $stmt4->fetch();


						} catch (Exception $e) {
							$error = $e->getMessage();
						}
						?>

						<?php echo $row['payment_method'] ?>

					</div>


						<?php try {

							$sql = 'SELECT invoice_id ,product_id, product_name, price, quantity_s, quantity_m, quantity_l, quantity_xl, SUM(quantity_s+quantity_m+quantity_l+quantity_xl) AS quantity, SUM(quantity_s+quantity_m+quantity_l+quantity_xl)*product.price AS total_num FROM invoice_detail INNER JOIN invoices USING(invoice_id) INNER JOIN product USING(product_id) WHERE user_id = :user_id GROUP BY invoice_id,product_id';
							$stmt5 = $db->prepare($sql);
							$stmt5->bindParam(':user_id', $user_id);
							$stmt5->execute();
							$errorInfo = $stmt5->errorInfo();
							if (isset($errorInfo[2])) {
								$error = $errorInfo[2];
								echo $error;
							}
							$total_sum = 0;





							echo "<div class=\"total\"><br><span>商品：</span><br>";

							// Fetching results:
							while($price_row = $stmt5->fetch()) {


								if($price_row['invoice_id'] == $invoices_row['invoice_id']) {
									$total_sum = $total_sum + $price_row['total_num'];
									echo $price_row['product_name']." (${price_row['quantity']} x ${price_row['price']})"."<br>";
									echo "サイズ : ";

									$newline = false;
									if($price_row['quantity_s'] != 0) {
										echo "S(${price_row['quantity_s']}) ";
										$newline = true;
									}
									if ($price_row['quantity_m'] != 0) {
										echo "M(${price_row['quantity_m']}) ";
										$newline = true;
									}
									if ($price_row['quantity_l'] != 0) {
										echo "L(${price_row['quantity_l']}) ";
										$newline = true;
									}
									if ($price_row['quantity_xl'] != 0) {
										echo "XL(${price_row['quantity_xl']}) ";
										$newline = true;
									}
									if($newline) { echo "<br>"; }
								}




							}

							echo "</div>";

						} catch (Exception $e) {
							$error = $e->getMessage();
						}


						?>
					<div class="total"><br>
						<span>注文合計：</span>
						<br>

						<?php echo "¥".$total_sum   ?>
					</div>

				</div>
			</div>

		<?php }


	} catch (Exception $e) {
		$error = $e->getMessage();
	}
?>


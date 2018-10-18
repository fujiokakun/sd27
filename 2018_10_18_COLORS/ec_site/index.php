<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>COLORS</title>


	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon1.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

	<!-- Owl Carousel CSS -->
	<link rel="stylesheet" href="css/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl-carousel/owl.theme.default.min.css">

	<!-- Google font-->
	<link href="https://fonts.googleapis.com/css?family=Belleza" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic" rel="stylesheet">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Dynamically generate CSS style for product -->
	<style>

		<?php
		$dsn = 'mysql:host=localhost;dbname=colors';
		$db = new PDO($dsn, 'root', 'root');


		try {

			$sql = 'SELECT * FROM product ';


			$stmt = $db->prepare($sql);
			$stmt->execute();
			$errorInfo = $stmt->errorInfo();

			if (isset($errorInfo[2])) {
				$error = $errorInfo[2];
				echo $error;
			}


		} catch (Exception $e) {
			$error = $e->getMessage();
		}


		while ($pickup_product = $stmt->fetch()) { ?>

		.item-<?php echo $pickup_product['product_id']; ?> {
			overflow: hidden;
			position: relative;
			cursor: pointer;
		}
		.item-<?php echo $pickup_product['product_id']; ?>_bg_wrapper {
			width: 100%;
			height: 25vw;
			background: url("../cms/colors/public/upload/uploads/<?php echo $pickup_product['product_id']; ?>_main.png") center;
			background-size: cover;
			transform: scale(1.1);
			transition: all .5s ease-out;
		}
		.item-<?php echo $pickup_product['product_id']; ?>:hover .item-<?php echo $pickup_product['product_id']; ?>_bg_wrapper{
			transform: scale(1);
		}
		.item-<?php echo $pickup_product['product_id']; ?>:hover .item_text {
			position: absolute;
			top: 50%;
			transform: translateX(-50%) translateY(-50%);
			color: #fff;
			left: 50%;
			text-align: center;
			line-height: 1.3rem;
			z-index: 6;
		}


		.item-<?php echo $pickup_product['product_id']; ?>:hover .layer {
			background-color: rgba(0,0,0, .7);
		}

		<?php } ?>


		.layer {
			background-color: rgba(0,0,0, 0);
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			transition: all .5s ease-out;
			z-index: 5;
		}

	</style>


</head>


<body>

<nav>
	<img src="img/logo.png" alt="" id="logo">
	<svg class="user__icon">
		<use xlink:href="img/symbol-defs.svg#icon-account_circle"></use>
	</svg>
	<a href="../login/index.php" class="username">
		ゲストさん
	</a>
	<svg class="cart__icon">
		<use xlink:href="img/symbol-defs.svg#icon-shopping-cart"></use>
	</svg>
</nav>

<div id="categories">
	<a id="pickup"><span>PICKUP</span></a>
	<a id="men"><span>MEN</span></a>
	<a id="women"><span>WOMEN</span></a>
	<a id="all"><span>ALL</span></a>
</div>


<div id="products" class="grid">

	<!-- Create pickup product list -->
	<?php
		$dsn = 'mysql:host=localhost;dbname=colors';
		$db = new PDO($dsn, 'root', 'root');


		try {

			$sql = 'SELECT * FROM product WHERE product_id >= 1 && product_id <=8 ';


			$stmt = $db->prepare($sql);
			$stmt->execute();
			$errorInfo = $stmt->errorInfo();

			if (isset($errorInfo[2])) {
				$error = $errorInfo[2];
				echo $error;
			}


		} catch (Exception $e) {
			$error = $e->getMessage();
		}


		while ($pickup_product = $stmt->fetch()) { ?>


			<div class="grid-item pickup item-<?php echo $pickup_product['product_id']; ?>">
				<div class="item-<?php echo $pickup_product['product_id']; ?>_bg_wrapper">

				</div>
				<div class="item_text">
					<?php echo $pickup_product['product_name']; ?><br><br>
					<?php echo "¥".number_format($pickup_product['price']); ?>

				</div>
				<div class="layer"></div>
			</div>


		<?php } ?>


	<!-- Create men product list -->
	<?php

		try {

			$sql = 'SELECT * FROM product WHERE gender = \'メンズ\' ';


			$stmt_men = $db->prepare($sql);
			$stmt_men->execute();
			$errorInfo = $stmt_men->errorInfo();

			if (isset($errorInfo[2])) {
				$error = $errorInfo[2];
				echo $error;
			}


		} catch (Exception $e) {
			$error = $e->getMessage();
		}

		while ($men_product = $stmt_men->fetch()) { ?>


			<div class="grid-item men all item-<?php echo $men_product['product_id']; ?>">
				<div class="item-<?php echo $men_product['product_id']; ?>_bg_wrapper">

				</div>
				<div class="item_text">
					<?php echo $men_product['product_name']; ?><br><br>
					<?php echo "¥".number_format($men_product['price']); ?>

				</div>
				<div class="layer"></div>
			</div>

		<?php } ?>



	<!-- Create women product list -->
	<?php

		try {

			$sql = 'SELECT * FROM product WHERE gender = "レディース" ';


			$stmt_women = $db->prepare($sql);
			$stmt_women->execute();
			$errorInfo = $stmt_women->errorInfo();

			if (isset($errorInfo[2])) {
				$error = $errorInfo[2];
				echo $error;
			}


		} catch (Exception $e) {
			$error = $e->getMessage();
		}

		while ($women_product = $stmt_women->fetch()) { ?>


			<div class="grid-item women all item-<?php echo $women_product['product_id']; ?>">
				<div class="item-<?php echo $women_product['product_id']; ?>_bg_wrapper">

				</div>
				<div class="item_text">
					<?php echo $women_product['product_name']; ?><br><br>
					<?php echo "¥".number_format($women_product['price']); ?>

				</div>
				<div class="layer"></div>
			</div>

		<?php } ?>




</div> <!-- End #products -->



<!-- About colors -->
<div class="about_colors">
	<div class="about_img_wrapper">
		<img src="img/about_colors.png" alt="">
	</div>
</div><!-- End of About colors -->




<!-- Customer Reviews -->
<section class="customer_reviews">
	<header>Customer Reviews</header>
		<div id="reviews_box_carousel" class="reviews_box owl-carousel owl-theme">


			<div class="review_item item">
				<div class="review_top">
					可愛かったです！
				</div>
				<div class="review_middle">
					とても可愛かったです！ハロウィン用に探していましたが、どうせ切るならガチの民族衣装が欲しいと思っていました。本物？の民族衣装を取り扱っているのか、とてもしっかりした作りでした！
				</div>
				<div class="review_bottom">
					<div class="review_photo">
						<img src="img/reviewer01.jpg" alt="">
					</div>
					<div class="review_name">マツコ21さん</div>
					<div class="review_stars">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="far fa-star"></i>
					</div>
				</div>
			</div>


			<div class="review_item item">
				<div class="review_top">
					満足です
				</div>
				<div class="review_middle">
					私は海外によくいくのですが、結構マイナーな国の衣装もあって見てるだけで割と楽しめました。そしていざ旅行に行ったときにその国の衣装を買っておいたおかげですぐに馴染めたり現地の人との交流が楽しくできて満足です。
				</div>
				<div class="review_bottom">
					<div class="review_photo">
						<img src="img/reviewer02.jpg" alt="">
					</div>
					<div class="review_name">マツコ22さん</div>
					<div class="review_stars">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="far fa-star"></i>
					</div>
				</div>
			</div>


			<div class="review_item item">
				<div class="review_top">
					すごい楽しめました!
				</div>
				<div class="review_middle">
					こういう衣装を買うのって初めてですごい楽しめました。私が買った衣装はマサイ族の衣装で、棒を持って歌いながら踊っていました。そのおかげで仮装パーティでは、一際目立つことができて買ってよかったなとなりました。
				</div>
				<div class="review_bottom">
					<div class="review_photo">
						<img src="img/reviewer03.jpg" alt="">
					</div>
					<div class="review_name">マツミさん</div>
					<div class="review_stars">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="far fa-star"></i>
					</div>
				</div>
			</div>


		</div>
</section>


<!-- End of Customer Reviews -->






<!-- Team -->
	<section class="team">
		<div class="text_we_are">
			We are
		</div>

		<div class="team_carousel_wrapper">
			<div id="team_carousel" class="owl-carousel owl-theme">
				<div class="team_carousel_item item">
					<img id="member1" src="img/member/member1.png" alt="">
				</div>
				<div class="team_carousel_item item">
					<img id="member2" src="img/member/member2.png" alt="">
				</div>
				<div class="team_carousel_item item">
					<img id="member3" src="img/member/member3.png" alt="">
				</div>
				<div class="team_carousel_item item">
					<img id="member4" src="img/member/member4.png" alt="">
				</div>
				<div class="team_carousel_item item">
					<img id="member5" src="img/member/member5.png" alt="">
				</div>
				<div class="team_carousel_item item">
					<img id="member6" src="img/member/member6.png" alt="">
				</div>
			</div>
		</div>

		<div class="team_comment">
			
		</div>





	</section>


<!-- End of Team -->

<!-- JQuery -->
<script src="js/jquery.js"></script>

<!-- Owl Carousel JS -->
<script src="js/owl-carousel/owl.carousel.min.js"></script>

<!-- Isotope JS -->
<script src="js/isotope/isotope.pkgd.min.js"></script>

<!-- Custom JS -->
<script src="js/script.js"></script>


<!--	Set Local storage for transaction (DEBUG ONLY) : Remove before put into production-->
<script>

    let jsObj = {
        userId: 1,
        products: {
            productId: [
                1, 2, 7
            ],
            size: [
                "s", "m", "xl"
            ],
            quantity: [
                1, 22, 6
            ]
        }
    }

    let jsonData = JSON.stringify(jsObj);

    console.log(jsonData);

    localStorage.setItem('transaction', jsonData);


</script>


</body>


</html>
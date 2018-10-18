<?php
	// Check if user was already logged in:
	if(isset($_COOKIE['login_name'])) {

		// Do sth.
	}


	// Check for user's login_name & password:
	if (!isset($_COOKIE['login_name']) || !isset($_COOKIE['user_id'])) {


		header('Location: ../login/index.php');


	} else { // retrieve user's login data from database:

		$dsn = 'mysql:host=localhost;dbname=colors';
		$db = new PDO($dsn, 'root', 'root');


		try {

			$sql = 'SELECT login_name, user_id, hash FROM users WHERE login_name = :login_name ';


			$stmt = $db->prepare($sql);
			$stmt->bindParam(':login_name', $_POST['login_name']);
			$stmt->execute();


			$errorInfo = $stmt->errorInfo();
			if (isset($errorInfo[2])) {
				$error = $errorInfo[2];
				echo $error;
			}


			// Fetching results:
			$row = $stmt->fetch();
			if($row['login_name'] == $_POST['login_name'] && $row['hash'] == md5($_POST['password'])) {

				// Create Cookie:
				setcookie(login_name, $_POST['login_name'], time() + (86400 * 1), "/");

				// redirect to another page:
				// header('Location: member.html');
				$matched = true; // Debug

			} else {
				$not_match = true;

			}




		} catch (Exception $e) {
			$error = $e->getMessage();
		}


	}

?>


<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" type="image/png" href="img/favicon3.png">

	<title>COLORS - Login</title>
</head>

<body>
<div class="container">
	<header class="header">
		<!--		<img src="img/logo.png" alt="colors logo" class="logo">-->
		<span class="logo">
			<img src="img/logo.png" alt="">
		</span>

		<form action="#" class="search">
			<input type="text" class="search__input" placeholder="検索">
			<button class="search__button">
				<svg class="search__icon">
					<use xlink:href="img/sprite.svg#icon-magnifying-glass"></use>
				</svg>
			</button>
		</form>

		<nav class="user-nav">
			<div class="user-nav__icon-box">
				<svg class="user-nav__icon">
					<use xlink:href="img/sprite.svg#icon-bookmark"></use>
				</svg>
				<span class="user-nav__notification">7</span>
			</div>
			<div class="user-nav__icon-box">
				<svg class="user-nav__icon">
					<use xlink:href="img/sprite.svg#icon-chat"></use>
				</svg>
				<span class="user-nav__notification">13</span>
			</div>
			<div class="user-nav__user">
				<!--                    <img src="img/user.jpg" alt="User photo" class="user-nav__user-photo">-->
				<svg class="search__icon user-nav__user-photo">
					<use xlink:href="img/symbols.svg#icon-account_circle"></use>
				</svg>
				<span class="user-nav__user-name"><?php echo $_COOKIE['login_name']; ?></span>
			</div>
		</nav>
	</header>
	<div class="content">
		<nav class="sidebar">
			<ul class="side-nav">

				<li class="side-nav__item ">
					<a href="../ec_site/index.php" class="side-nav__link">
						<svg class="side-nav__icon">
							<use xlink:href="img/sprite.svg#icon-home"></use>
						</svg>
						<span>ホーム</span>
					</a>
				</li>
				<li class="side-nav__item side-nav__item--active">
					<a id="orderDetailBtn"  href="order_detail.php?user_id=<?php echo $_COOKIE['user_id']; ?>" class="side-nav__link">
						<svg class="side-nav__icon">
							<use xlink:href="img/symbol-defs.svg#icon-drawer"></use>
						</svg>
						<span>注文詳細</span>
					</a>
				</li>
				<li class="side-nav__item ">
					<a id="changeInfoBtn" href="#" class="side-nav__link">
						<svg class="side-nav__icon">
							<use xlink:href="img/symbol-defs.svg#icon-profile"></use>
						</svg>
						<span>情報の変更</span>
					</a>
				</li>
				<li class="side-nav__item ">
					<a id="logoutBtn" href="#" class="side-nav__link">
						<svg class="side-nav__icon">
							<use xlink:href="img/symbol-defs.svg#icon-log-out"></use>
						</svg>
						<span>ログアウト</span>
					</a>
				</li>


			</ul>

			<div class="legal">
				&copy; 2018 by
				<span class="logo_spacing">COLORS</span>
				<br>All rights reserved.
			</div>
		</nav>


		<main id="main-view">





		</main>
	</div>
</div>

<script defer src="js/script.js"></script>



</body>

</html>
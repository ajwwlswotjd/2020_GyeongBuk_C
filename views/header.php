<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>경북 C 모듈</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/common.css">
	<script src="/js/jquery.js"></script>
</head>
<body>
	<!-- bootstrap container  -->
	<div class="container">
		<!-- header-nav (common) -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand logo" href="/">
				전주비빔밥축제
			</a>
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="/">홈</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/reserve">부스 예약</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/apply">부스 신청</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/attend">참여 현황</a>
					</li>
				</ul>
				<div class="navbar-nav mr-auto display-flex">
					<img src="imgs/Facebook.png" alt="img" title="img">
					<img src="imgs/PayPal.png" alt="img" title="img">
					<img src="imgs/Twitter.png" alt="img" title="img">
				</div>
			</div>

			<div class="navbar-nav ml-auto">
				<?php if(__SIGN) : ?>
					<li class="nav-item">
						<a class="nav-link" href="/logout">로그아웃</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#"><?= $_SESSION['user']->name ?>(<?= $_SESSION['user']->id ?>)</a>
					</li>
					<?php else : ?>
						<li class="nav-item">
							<a class="nav-link" href="/login">로그인</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/join">회원가입</a>
						</li>
					<?php endif; ?>
				</div>
			</nav>
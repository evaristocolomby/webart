<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<title>Web Art</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Styles -->
		<link href="./bootstrap/css/bootstrap.css" rel="stylesheet">
		<style type="text/css">
			body {
				padding-top: 60px;
				padding-bottom: 40px;
			}
			.sidebar-nav {
				padding: 9px 0;
			}

			@media (max-width: 980px) {
				/* Enable use of floated navbar text */
				.navbar-text.pull-right {
					float: none;
					padding-left: 5px;
					padding-right: 5px;
				}
			}
		</style>
		<link href="./bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		  <script src="./bootstrap/js/html5shiv.js"></script>
		<![endif]-->


	</head>

	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container-fluid">
					<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="brand">Web Art</a>
				</div>
			</div>
		</div>

		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span3">
					<div class="well sidebar-nav">
						<ul class="nav nav-list">
							<li class="nav-header">REST APIs</li>
							<li class="active"><a>Ads</a></li>
							<li><a href="ad/getAds.json">Get ads by JSON - GET</a></li>
							<li><a href="ad/saveAdsFile">Save ads in a JSON file - PUT</a></li>
							<li><a href="ad/deleteAdsFile">Delete JSON file if any - DELETE</a></li>
							<br>
							<li class="active"><a>Contact us - POST</a></li>
							<br>
							<form action="ad/contactUs" method="post">
				<li>Name: <input type="text" name="name"><br></li>
				<li>E-mail: <input type="text" name="email"><br></li>
				<li><input type="submit"></li>
				</form>
					</div><!--/.well -->
				</div><!--/span-->
				<div class="span9">
					<div class="hero-unit">
						<h1>Web Art</h1>
						<p>Buy and sell Artwork online!</p>
					</div>
					<div id="content">
						<table width="600" cellpadding="3" class="table table-hover table-bordered">
							<tbody>

							<?php

								$con = mysqli_connect("localhost","evarbdec_root","root123","evarbdec_websalesdb");
								if (mysqli_connect_errno($con))
								{
									echo "Failed to connect to MySQL: " . mysqli_connect_error();
									exit;
								}

								$result = mysqli_query($con,"SELECT * FROM ad");

																while($row = mysqli_fetch_array($result))
								{
									echo ' <div class="pagination pagination-large"><div class="thumbnail right-caption span2"><h4>'.$row['title'].'</h4><p>Price $'.$row['price'].'</p><p><img src="'.$row['url_image'].'"/></p> <p><a class="btn" href="adPage.php?id='.$row['id'].'">View details</a></p></div></div>';

																}

								mysqli_close($con);

							?>

							</tbody>
					</div>
				</div>
			</div>
		</div><!--/.fluid-container-->
	</body>
</html>

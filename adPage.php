<!DOCTYPE html>
<html lang="en">
	<body onload="processRequest()">
		<link href="./bootstrap/css/bootstrap.css" rel="stylesheet">
		<div class="container">
			<div class="row">
				<div class="span12">
					<div class="navbar navbar-inverse navbar-fixed-top">
						<div class="navbar-inner">
							<div class="container-fluid">
								<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="brand" href="./index.php">Web Sales</a>
							</div>
						</div>
					</div>
					<br>
					<br>

						<?php

							if (isset($_GET['id']) && is_numeric($_GET['id'])) {
								$id = $_GET['id'];
							} else {
								echo "Invalid Product!";
								exit;
							}

							$con = mysqli_connect("localhost","evarbdec_root","root123","evarbdec_websalesdb");
							if (mysqli_connect_errno($con))
							{
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
								exit;
							}

							$result = mysqli_query($con,'SELECT title,price,description,date,url_image,user.id,user.name,user.email FROM ad,user WHERE user.id=id_user AND ad.id='.$id);
							while($row = mysqli_fetch_array($result))
							{
								$item = '<h2>'.$row['title'].'</h2>';
								$item .= '<div class="row"><div class="span3">';
								$item .= '<p class="lead">Seller:</p><p><strong>'.$row['name'].'</strong></p>';
								$item .= '<p class="muted">Email: </p><p>'.$row['email'].'</p>';
								$item .= '<p class="muted">Price: </p><p>$'.$row['price'].'</p>';
								$item .= '<p class="muted">Posted: </p><p>'.$row['date'].'</p>';
								$item .= '</div>';
								$item .= '<div class="span4"><p class="lead">Description: </p><p>'.$row['description'].'</p></div>';
								$item .= '<div class="span2"><div class="span3"><a href="'.$row['url_image'].'" class="thumbnail"><img src="'.$row['url_image'].'" alt="Image" style="max-width:100%;" /></a></div>';
							}
							mysqli_close($con);
							echo $item;
						?>

				</div>
			</div>
		</div>
	</body>
</html>

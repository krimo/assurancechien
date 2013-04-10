<?php require_once("process.php") ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>Assurance chien - Les résultats de votre comparaison</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta name="keywords" content="assurance santé, assurance chien" />
	<meta name="description" content="Une assurance santé pour votre chien" />

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
	<link rel="stylesheet" href="css/app.css">

	<!-- Google font -->
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,900,400italic' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="header-container">
		<div class="container">
			<div class="row-fluid">
				<div class="span7">
					<div class="hgroup">
						<h1 class="header">Mon Assurance Chien <br> <small>Le comparateur de mutuelles chien et chat</small></h1>

						<span class="label label-info">Gratuit, rapide &amp; sans engagement</span>
					</div>		
				</div>
				<div class="span5">
					<img src="img/dog-cat.png" alt="Chien et chat" class="header-img visible-phone">
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row-fluid">			
			<div class="span6 offset3">
				<h2>Comparaison :</h2>
				<iframe src="<?php echo $return->synthese; ?>" frameborder="0" width="630" height="1200" seamless style="overflow:hidden;"></iframe>
			</div>
		</div>	
	</div>
</body>
</html>
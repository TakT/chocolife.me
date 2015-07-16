<?php

require_once './classes/ArrayGenerator.php';
require_once './classes/ExportImportJSON.php';

$ArrayGenerator    = new ArrayGenerator(40, 500);
$ExportImportJSON  = new ExportImportJSON;

$sharesArray      = $ExportImportJSON->setFileName('dataFirst-v2.json')->import()->getFileData();
$sharesCategories = $ExportImportJSON->setFileName('dataFirstCategories-v2.json')->import()->getFileData();

?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Chocolife.me</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Custom styles for this template -->
		<link href="./assets/css/styles.css" rel="stylesheet">

		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="./assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<script src="./assets/js/ie-emulation-modes-warning.js"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>

		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php" title="Chocolife.me">Chocolife.me</a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="index.php" title="Версия 1">Версия 1</a></li>
						<li class="active"><a href="indexBigData.php" title="Версия 2">Версия 2</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>

		<div class="container content">
			
			<div class="row shareCategories">
				<?php if ($sharesCategories): ?>
					<div class="btn-group" role="group">
						<button type="button" class="btn btn-default active js-shareCategory" data-category-id="-1">Показать все</button>
						<?php foreach ($sharesCategories as $key => $category): ?>
							<button type="button" class="btn btn-default js-shareCategory" data-category-id="<?php echo $category; ?>">Категория - <?php echo $category; ?></button>
						<?php endforeach ?>
					</div>
				<?php endif ?>
			</div>

			<div class="row shares js-shares">
				<?php foreach ($sharesArray as $share): ?>
					<div class="shareItem<?php echo ($share['is_show']) ? '' : ' hide'; ?> shareItem-width-<?php echo $share['height']; ?>" data-categories="<?php echo json_encode($share['categories']); ?>" style="
						
						width:<?php echo $share['width']; ?>%;
						height:<?php echo $share['height']; ?>px;
					"
					>
						<div class="shareItem-id"><b>ID</b> - <?php echo $share['id']; ?></div>
						<div class="shareItem-categories"><b>Категории</b> - <?php echo json_encode($share['categories']); ?></div>
					</div>
				<?php endforeach ?>
			</div>

		</div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/packery/1.4.2/packery.pkgd.min.js"></script>
	
    <script src="./assets/js/template.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./assets/js/ie10-viewport-bug-workaround.js"></script>

	</body>
</html>
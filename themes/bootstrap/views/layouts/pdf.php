<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
	
		<!-- Le styles -->
		<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/application.min.css" rel="stylesheet">
		<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.css" rel="stylesheet">
	
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	
		<!-- Le fav and touch icons -->
		<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico">
		<link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-114x114.png">
	</head>
	
	<body>
		<?php
		$flashMessages = Yii::app()->user->getFlashes();
		if($flashMessages){
			foreach($flashMessages as $key => $message){
				echo '<div class="info alert alert-'.$key.'" style="text-align:center;">';
				echo '<p class="lead">' . $message . '</p>';
				echo '</div>';
			}
		}
		?>
		<div class="container">	
			<?php echo $content; ?>
		</div>
	</body>
	<script type="text/javascript" src="/planeaciones/assets/10e31bd0/jquery.js"></script>
	<script type="text/javascript" src="/planeaciones/themes/bootstrap/js/bootstrap.js"></script>
</html>
<?php
Yii::app()->clientScript->registerScript(
	'myHideEffect',
	'$(".info").animate({opacity:1.0},5000).slideUp("slow");',
	CClientScript::POS_READY
);
<?php
/**
 * Main layout file for the whole backend.
 * It is based on Twitter Bootstrap classes inside HTML5Boilerplate.
 *
 * @var BackendController $this
 * @var string $content
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= CHtml::encode($this->pageTitle); ?></title>
     <?php cs()->registerScriptFile("/js/config.js")?>
     <?php cs()->registerCssFile("/css/main.css")?>
     <?php cs()->registerCssFile("/css/font-awesome.min.css")?>
</head>

<body>
<!-- NAVIGATION BEGIN -->
<?php  $this->renderPartial('//layouts/_navigation');?>
<div class="container-fluid p0">
	<div class="row-fluid">	
		<div class="span2">
		<?php $this->renderPartial('//layouts/pan');?>
		</div>
		<div class="span9 ">
		    <?php if (isset($this->breadcrumbs)): ?>
		        <?php $this->widget(
		            'bootstrap.widgets.TbBreadcrumbs',
		            array(
		                'links' => $this->breadcrumbs,
		            )
		        ); ?>
		    <?php endif?>
		
			<div class="row">
				<?= $content; ?>
		    </div>
		   
		</div>
	</div>
</div>
</body>
</html>

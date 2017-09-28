<?php
/**
 * Main layout for frontend entry point.
 *
 * It's just raw HTML5Boilerplate, nothing else.
 *
 * @var FrontendController $this
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
	<link rel="shortcut icon" href="/images/main/favicon.png" type="image/x-icon" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <?php cs()->registerCssFile("/css/font-awesome.min.css")?>
    <?php cs()->registerCssFile("/css/global.css")?>
    <?php cs()->registerCssFile("/css/ui.css")?>
    <?php // cs()->registerScriptFile("/js/jquery/jquery-1.11.1.min.js")?>
     <?php cs()->registerScriptFile("/js/jquery/jquery-ui.min.js")?>
     <?php cs()->registerScriptFile("/js/site/main.js")?>
     <?php cs()->registerScriptFile("/js/readmore/readmore.min.js")?>
</head>

<body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57010901-1', 'auto');
  ga('send', 'pageview');

</script>

<div class="main">
	<?php $this->renderPartial("//layouts/header")?>
<br/>

<div class="clear-both"></div>					

	<div class="container  main-container oh boxShadow "  style="background: #f7f7f7;">
	<div class="w100P  pull-left" style="position: relative;">
<div class="container " >
	<div style="position: absolute; z-index: 100; bottom:5px;width:100%;">
		<?php echo CHtml::image('/images/main/logo3.png','',array('style'=>'width:680px;margin:0px auto;display:block;'))?>
	</div>	
</div>
<?php
	$this->widget(
			'bootstrap.widgets.TbCarousel',
			array(
					'options'=>array('autostart'=>true,'interval'=>'7000'),
					'items' => array(
							array(
									'image' => bu('/images/main/1.jpg'),
								),
							array(
									'image' => bu('/images/main/2.jpg'),
									
							),
							array(
									'image' => bu('/images/main/3.jpg'),
									
							),
							array(
									'image' => bu('/images/main/4.jpg'),
			
							),
							array(
									'image' => bu('/images/main/5.jpg'),
										
							),
						/*	array(
									'image' => bu('/images/main/6.jpg'),
										
							),*/
							array(
									'image' => bu('/images/main/7.jpg'),
										
							),
							array(
									'image' => bu('/images/main/8.jpg'),
							
							),
							
					),
			)
	);
	?>
</div>	
	<div class="span3 m0 oH">
	<?php $this->widget(
			'application.widgets.LeftBaner.LeftBaner'
	
	);?>
	
	</div>
	<div class="txtJ span6 mainContnet" >
	<div>
	<?php
        foreach(Yii::app()->user->getFlashes() as $key => $message) {
            echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
        }
    ?>
    </div>
	<?php  echo $content?>
	</div>
	<div class="span3 m0 oH pull-right">
		<?php $this->widget(
			'application.widgets.RightBaner.RightBaner'
	
	);?>
	</div>
	
	</div>
	<div class="bottomDiv Bmargin20  w100P  pull-left"  >
	    <div class="container">
			<div class="span12">
				<div class="pull-left">Օրհնությամբ ՝ ԱՀԹ Առաջնորդական Փոխանորդ  Տ․ Նավասարդ Արքեպիսկոպոս Կճոյանի</div> 
				
			</div>
			<div class="span12">
			<div class="pull-left">Կայքի պատասխանատու՝  Տեր Գրիգոր քահանա Գրիգորյան</div>
			</div>
			
			<div class="span12">
				<div class="pull-left">Կայքի հովանավոր՝   Անդրանիկ Բաբոյան</div>
			</div>
			<div class="span12">
				<div class="pull-left"> Web page developer A. Grigoryan</div>
				<div class="pull-left Lmargin15">Mail <a href="#">aramgrig@hotmail.com </a></div> 
			</div>
			<div class="span12">
			<div class="pull-left">Բոլոր իրավունքները պաշտպանված են Զորավոր Սուրբ Աստվածածին եկեղեցի 2014թ․</div>
			</div>
		</div>	
	</div>

		
		<!-- 	</div>
			
			</div>
		</header>
		<div class="main container" style="margin-top: 350px;">
			<?php // echo $content?>
		</div>	
	</div>-->
<script type="text/javascript">
			var SERVER_URL =<?php echo  CJavaScript::encode(app()->getBaseUrl(true));?>;
$(document).ready(function (){
	$('.time').datepicker({
		numberOfMonths: 1,
		timeOnlyTitle: 'Ընտրեք ժամը',
		timeText: 'Ժամը',
		hourText: 'Ժամ',
		minuteText: 'Րոպ',
		secondText: 'Վարկյանները',
		currentText: 'Հիմա',
		closeText: 'Փակել',
		prevText: '<Նախորդը',
		nextText: 'Հաջորդը>',
		currentText: 'Այսօր',
		monthNames: ['Հունվար','Փետրվար','Մարտ','Ապրիլ','Մայիս','Հունիս',
		'Հուլիս','Օգոստոս','Սեպտեմբեր','Հոկտեմբեր','Նոյեմբեր','Դեկտեմբեր'],
		monthNamesShort: ['Հուն','Փետ','Մար','Ապր','Մայ','Հուն',
		'Հուլ','Օգս','Սեպ','Հոկ','Նոյ','դեկ'],
		dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
		dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
		dayNamesMin: ['Կիր','Երկ','Երք','Չրք','Հնգ','Ուրբ','Շբթ'],
		weekHeader: 'Не',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		 minDate: new Date(2012, 7, 14, 8, 30),
      
		isRTL: false,
		showMonthAfterYear: false,
		 onSelect: function (dateText, inst) {
             var url = SERVER_URL + '/general/view/DATE';
             url = url.replace("DATE", dateText);
             window.location = url;

         },
		yearSuffix: ''
	});
	$('.time').focus();
	
});
</script>		
			
</div>
</body>
</html>

<?php
/**
 * @var BackendController $this
 * @var BackendLoginForm $model
 */


?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false" type="text/javascript">
</script>
<div class="divRed txtC Bmargin30">
    Հետադարձ Կապ
</div>
<p><i class="fa fa-map-marker fS18 red"></i> ՀՀ Ք Երևան Թումանյան 71</p>
<p><i class="fa fa-phone fS18 red"></i> (+374) 010 53 01 62</p>
<p><i class="fa  fa-envelope  fS18 red"></i> surbzoravor@gmail.com</p>
<div id="map" style="width:570px; height: 300px;">
	</div>	
	
<script type="text/javascript">
	function initialize() {
		var myLatlng = new google.maps.LatLng(40.186160,44.509618);
		var mapOptions = {
		zoom: 16,
		center: myLatlng
	};
	
	var map = new google.maps.Map(document.getElementById('map'), mapOptions);
	
	
	var marker = new google.maps.Marker({
	position: myLatlng,
	map: map,
	});
	google.maps.event.addListener(marker, 'click', function() {
	infowindow.open(map,marker);
	});
	}
	
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
<!-- Login Form BEGIN -->
<div class="form">

<?php
/** @var TbActiveForm $form */
$form = $this->beginWidget(
	'bootstrap.widgets.TbActiveForm',
	array(
		'id' => 'login-form',
		
		'htmlOptions' => ['class' => 'well'],
		
	)
);


?>

	<p class="note"><span class="required">*</span>-ով դաշտերը պարտադիր են</p>

	<?php echo $form->textFieldRow($model, 'mail', array('class'=>'span5'));?>
	<?php echo $form->textFieldRow($model, 'subject', array('class'=>'span5'));?>
	<?php echo $form->textAreaRow($model, 'text', array('class'=>'span5','rows'=>6, 'cols'=>50));?>
	

		
	

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit','type'=>'danger','label'=>'Ուղարկել նամակ', 'icon'=>'ok'));?>
		
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- Login Form END -->

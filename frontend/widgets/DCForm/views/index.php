<?php
/**
 * @var BackendController $this
 * @var BackendLoginForm $model
 */


?>


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

<div class="red txtC Bmargin30 fS18">
    Հետադարձ Կապ
</div>
<p>
        Ձեզ հետաքրքրող հարցերի համար կարող եք դիմել մեզ
   
</p>
<p><i class="fa fa-phone fS18 red "></i> (+374) 010 72 78 34</p>
<p><i class="fa fa-mobile fS18 red "></i> (+374) 099 90 95 15</p>
<p><i class="fa  fa-envelope  fS18 red "></i> daycenter.am@gmail.com</p>
	<p class="note"><span class="required">*</span>-ով դաշտերը պարտադիր են</p>

	<?php echo $form->textFieldRow($model, 'mail', array('class'=>'span5'));?>
	<?php echo $form->textFieldRow($model, 'subject', array('class'=>'span5'));?>
	<?php echo $form->textAreaRow($model, 'text', array('class'=>'span5','rows'=>6, 'cols'=>50));?>
	

		
	

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit','type'=>'danger','label'=>'Ուղարկել նամակ'));?>
		
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- Login Form END -->

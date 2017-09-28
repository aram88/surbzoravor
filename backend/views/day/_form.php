<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'day-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"> <span class="required">*</span>-ով  դաշտերը պարտադիր են</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>255)); ?>
 	<?php echo $form->label($model,'created');?>
	 <?php $this->widget(
    'bootstrap.widgets.TbDatePicker',
    array(
		'model'=>$model,
		'attribute'=> 'created',
		'options'=>array('format'=>'yyyy-mm-dd'),
        'htmlOptions' => array('class'=>'span4'),
    )
);?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Ստեղծել' : 'Փոփոխել',
		)); ?>
</div>

<?php $this->endWidget(); ?>

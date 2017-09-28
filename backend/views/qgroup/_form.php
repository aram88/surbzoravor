<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'qgroup-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"> <span class="required">*</span>-ով դաշտերը պարտադիր Է</p>

<?php echo $form->errorSummary($model); ?>
	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>200)); ?>
	<?php echo $form->textFieldRow($model,'position',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Ստեղծել' : 'փոփոխել',
		)); ?>
</div>

<?php $this->endWidget(); ?>

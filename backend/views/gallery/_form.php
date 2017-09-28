<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'gallery-form',
	'enableAjaxValidation'=>false,
		'htmlOptions' => array(
				'enctype' => 'multipart/form-data',
		),
)); ?>

<p class="help-block"><span class="required">*</span>-ով դաշտերը  պարտադիր են</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->dropDownListRow($model,'gallery_group_id',$galleryList); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->fileFieldRow($model,'image'); ?>
	<?php if (!$model->isNewRecord){
		  echo CHtml::image($model->getImage());
	}?>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Ստեղծել' : 'Պահպանել',
		)); ?>
</div>

<?php $this->endWidget(); ?>

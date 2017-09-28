<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'reading-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"><span class="required">*</span>-ով դաշտերը  պարտադիր են</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->dropDownListRow($model,'day_id',Day::model()->getLastAddedDays(),array('class'=>'span5')); ?>
	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>255)); ?>
	<?php echo $form->textFieldRow($model,'position',array('class'=>'span5')); ?>
<?php $this->widget(
            'bootstrap.widgets.TbCKEditor', array(
        'model' => $model,
	    'attribute' => 'text',
		'htmlOptions'=>array('class'=>'span8')
            )
    );?>
        <?php echo $form->label($model,'created_date');?>
	 <?php $this->widget(
    'bootstrap.widgets.TbDatePicker',
    array(
		'model'=>$model,
		'attribute'=> 'created_date',
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

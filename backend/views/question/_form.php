<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'question-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"><span class="required">*</span>-ով  դաշտերը պարտադիր են</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->dropDownListRow($model,'qgroup_id',Qgroup::model()->getQuestionGroups()); ?>
	<?php echo $form->textFieldRow($model,'first_name',array('class'=>'span5','maxlength'=>200)); ?>
	<?php echo $form->textAreaRow($model,'text',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
	<br>
	<?php echo $form->label($model,'ans_text');?>
	<?php $this->widget(
            'bootstrap.widgets.TbCKEditor', array(
        'model' => $model,
	    'attribute' => 'ans_text',
            )
    );?>

	<?php if ( !isset($hide)) echo $form->textFieldRow($model,'mail',array('class'=>'span5','maxlength'=>60,'readOnly'=>'readOnly')); ?>
	<?php echo $form->textFieldRow($model,'position',array('class'=>'span5')); ?>
	<?php echo $form->checkBoxRow($model,'publish'); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=> 'Պատասխանել',
		)); ?>
</div>

<?php $this->endWidget(); ?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'menu-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->textFieldRow($model,'name',array('class'=>'span8')); ?>
	<?php echo $form->checkBoxRow($model,'sub_show'); ?>
	<?php echo $form->dropDownListRow($model,'menu_id',$model->getMenusList(),array( 'empty'=>'','class'=>'span5')); ?>
	<?php echo $form->dropDownListRow($model,'location',$model->locationData, array('empty'=>''),array('class'=>'span5')); ?>
	<?php echo $form->textFieldRow($model,'icon',array('class'=>'span2')); ?>
	<br/>
	<br/>
	<?php $this->widget(
            'bootstrap.widgets.TbCKEditor', array(
        'model' => $model,
	    'attribute' => 'text',
            )
    );?>
	<?php echo $form->fileFieldRow($model,'image'); ?>
	<?php if (!$model->isNewRecord && $model->image !=null){
		  echo CHtml::image($model->getImage());
	}?>
	<?php echo $form->checkBoxRow($model,'visible'); ?>
	<?php echo $form->textFieldRow($model,'position',array('class'=>'span5')); ?>
	<?php echo $form->checkBoxRow($model,'main_show'); ?>
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Ստեղծել' : 'Փոփոխել',
		)); ?>
</div>

<?php $this->endWidget(); ?>

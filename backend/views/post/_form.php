<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'post-form',
	'enableAjaxValidation'=>false,
		'htmlOptions' => array(
				'enctype' => 'multipart/form-data',
		),
)); ?>

<p class="help-block"><span class="required">*</span>-ով դաշտերը պարտադիր են</p>
<?php echo $form->errorSummary($model); ?>
	<?php echo $form->dropDownListRow($model,'menu_id',Menu::model()->getMenusList(),array( 'empty'=>'','class'=>'span5')); ?>
	<?php echo $form->textFieldRow($model,'name',array('cols'=>50, 'class'=>'span8')); ?>
	<?php echo $form->textFieldRow($model,'meta-key',array('class'=>'span8')); ?>
	<?php echo $form->textFieldRow($model,'meta-key',array('class'=>'span8')); ?>
	<?php $this->widget(
            'bootstrap.widgets.TbCKEditor', array(
        'model' => $model,
	    'attribute' => 'text',
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
    <?php echo $form->dropDownListRow($model,'type',$model->postType)?>
	<?php echo $form->textFieldRow($model,'path',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
	<?php echo $form->checkBoxRow($model,'visible'); ?>
	<?php echo $form->checkBoxRow($model,'home_page'); ?>
	<?php echo $form->fileFieldRow($model,'image'); ?>
	<?php if (!$model->isNewRecord && $model->image !=null && $model->image !=''){
		  echo CHtml::image($model->getImage());
	}?>
	<?php echo $form->checkBoxRow($model,'stick'); ?>
	<?php echo $form->checkBoxRow($model,'read_all'); ?>
	<?php echo $form->checkBoxRow($model,'read'); ?>
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Ստեղծել' : 'Փոփոխել',
		)); ?>
</div>
<?php $this->endWidget(); ?>

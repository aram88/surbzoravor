<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'media-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"> <span class="required">*</span> ով դաշտերը պարտադիր են</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>256)); ?>
    <div class="hide">
	   <?php echo $form->textFieldRow($model,'path',array('class'=>'span5','maxlength'=>256)); ?>
    </div>
    <br/>    
    <div class="clear-both"></div>
    <p>
    <?php echo $form->label($model,'path');?>
            <?php
            $this->widget('common.extensions.EAjaxUpload.EAjaxUpload', array(
                'id' => 'uploadFile',
                'config' => array(
                    'action' => Yii::app()->createUrl('utilites/uploadFile/'),
                    'allowedExtensions' => array("pdf","jpg", "jpeg", "gif", "png", "JPG", "JPEG", "GIF", "PNG","doc","mp3"), //array("jpg","jpeg","gif","exe","mov" and etc...
                    'sizeLimit' => 32 * 1024 * 1024, // maximum file size in bytes
                    'minSizeLimit' => 10, // minimum file size in bytes
                    'onComplete' => "js:function(id, fileName, responseJSON){
								                                       if (responseJSON.success) {
								        										$('#Media_path').val(responseJSON.filename);
								                                        } else {
								                                                $('#uploadFile').html('<p  width=\"160\">' + responseJSON.error +'</p>');
								                                        }
																		
								                                }",
                )
            ));
            ?>
            <?php echo $form->error($model,'path');?>
    </p>
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Ստեղծել',
		)); ?>
</div>

<?php $this->endWidget(); ?>

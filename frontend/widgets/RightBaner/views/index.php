<div class="row-fluid ">
	<div class="divRed">
		<strong>ԲաԺանորդագրվել</strong> 
	</div>
	<div class="Tmargin10">
		<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'subscribe-form',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'validationUrl' => array('ajax/validate','mod'=>'Subscribe')
        ),
	
)); ?>

	<?php echo $form->textField($model,'email',array('class'=>'span12','placeholder'=>'Էլ․ հասցե' )); ?>
	<?php echo $form->error($model,'email')?>

	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'htmlOptions'=>array('class'=>'btn-bg'),
			'label'=>'Առաջ',
		)); ?>
	
	<?php $this->endWidget(); ?>
	</div>
</div>	
<div class="w100P Tmargin10"></div>
<div class="divRed" >
    <?php echo CHtml::link('<strong>'.$ton->name.'</strong>','/menu/view/'.$ton->slug,array('style'=>'line-height:1.5em !imporatnt'));?>
</div>


<div class="time  row-fluid "></div>

<div class="divRed" >
    <?php echo CHtml::link('<strong>Իրադարձություններ</strong>','/menu/view/iradardzutyun',array('style'=>'line-height:1.5em !imporatnt'));?>
</div>
<?php
$this->widget(
		'booster.widgets.TbMenu',
		array(
				'htmlOptions'=>array('class'=>'cl-vnavigation m0 '),
				'encodeLabel' => false,
				'type' => 'list',
				'items' => $items,
				
		)
);?>


<div class="divRed">
		<strong>Ընթերցել նաև</strong> 
</div>
<div>
    <?php foreach ($posts as $post): ?>
    <div class="Vpadding20 Tpadding10 Rpadding10">
        <?php   if ($post['image'] != "" && $post['image'] != NULL){
        echo  CHtml::link(
            CHtml::image('/images/post/'.date("Y-m",strtotime($post['created_date'])).'/sm_'.$post['image'],'',array('class'=>'pull-left Rmargin10')),'/post/view/'.$post['slug']);
        } ?>
   
         <?php echo CHtml::link($post['name'],'/post/view/'.$post['slug'],array('class'=>'red '))?>
    </div>
        <div class="  row-fluid "></div>
    <?php endforeach;?>
</div>
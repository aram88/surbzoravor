<div class="container">
<?php
$this->breadcrumbs=array(
	'Հարցեր'=>array('admin'),
	$model->id,
);
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'htmlOptions'=>array('class'=>'pull-left'),
        'buttons' => array(
            array('label' => 'Հարցեր', 'url' => '/question/admin','htmlOptions'=>array( 'class'=>'btn-success')),
            array('label' => 'Պատասխանել', 'url' => '/question/update/'.$model->id,'htmlOptions'=>array( 'class'=>'btn-warning')),
            array('label'=>'Ջնջել','url'=>'#','htmlOptions'=>array('class'=>'btn-danger','submit'=>array('delete','id'=>$model->id),'confirm'=>'Դուք պատրաստվում եք ջնյել այս մենյուն և նրան պատկանող բոլոր նյութերը')),
        ),
    )
);

?>
<br/>
<br/>

<div class="well">
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		array('name'=>'qgroup_id','value'=>isset($model->qgroup->name)?$model->qgroup->name:NULL),
		'first_name',
		'text',
		array('name'=>'publish','value'=>app()->params['yesNoArrayF'][$model->publish]),
		'ans_text',
		'mail',
		'position',
),
)); ?>
</div>
</div>

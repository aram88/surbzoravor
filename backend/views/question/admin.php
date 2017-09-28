<div class="container">
<?php
$this->breadcrumbs=array(
	'Questions'=>array('admin'),
	
);
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'htmlOptions'=>array('class'=>'pull-left'),
        'buttons' => array(
            array('label' => 'Ստեղծել', 'url' => '/question/create','htmlOptions'=>array( 'class'=>'btn-primary')),
        ),
    )
);

?>
<br/><br/><br/>
<div class="well">

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'question-grid',
'type' => 'striped',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		array('name'=>'qgroupRel','value'=>'isset($data->qgroup->name)?$data->qgroup->name:NULL'),
		'first_name',
        'mail',
		'text',
        'ans_text',
		array('name'=>'publishName','value'=>'app()->params["yesNoArrayF"][$data->publish]','filter'=>'' ),
		'position',
		
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
</div>
</div>

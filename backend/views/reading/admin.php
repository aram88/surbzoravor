<div class="container">
<?php
$this->breadcrumbs=array(
	'Ընթերցվածքներ'=>array('admin'),
	'Manage',
);
$this->widget(
		'bootstrap.widgets.TbButtonGroup',
		array(
				'htmlOptions'=>array('class'=>'pull-left'),
				'buttons' => array(
						array('label' => 'Ստեղծել', 'url' => '/reading/create','htmlOptions'=>array( 'class'=>'btn-success')),
				),
		)
);
?>
<br/>
<br/>

<div class="well">

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'reading-grid',
'type' => 'striped',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		array('name'=>'dayName','value'=>'$data->day->name','filter'=> CHtml::activeTextField($model, 'dayName'),),
		'name',
		array('name'=>'text','value'=>'substr($data->text,0,400)','type'=>'raw'),
		'created_date',
		'position',
		
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
</div>
</div>
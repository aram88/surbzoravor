<div class="container">
<?php
$this->breadcrumbs=array(
	'Իրադարձություններ'=>array('admin'),
);

$this->widget(
		'bootstrap.widgets.TbButtonGroup',
		array(
				'htmlOptions'=>array('class'=>'pull-left'),
				'buttons' => array(
						array('label' => 'Ստեղծել', 'url' => '/event/create','htmlOptions'=>array( 'class'=>'btn-success')),
				),
		)
);
?>
<br/>
<br/>

<div class="well">


<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'event-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		array('name'=>'dayName','value'=>'$data->day->name'),
		'name',
		array('name'=>'text','value'=>'substr($data->text,0,200)','type'=>'raw'),
		
		'created_date',
		'position',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
</div>
</div>

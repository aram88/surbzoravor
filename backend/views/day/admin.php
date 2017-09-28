<div class="container">
<?php
$this->breadcrumbs=array(
	'Օրեր'=>array('admin'),
);

$this->widget(
		'bootstrap.widgets.TbButtonGroup',
		array(
				'htmlOptions'=>array('class'=>'pull-left'),
				'buttons' => array(
						array('label' => 'Ստեղծել', 'url' => '/day/create','htmlOptions'=>array( 'class'=>'btn-primary')),
				),
		)
);

?>
<br/>
<br/>

<div class="well">

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'day-grid',
'type' => 'striped',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'name',
		'created',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
</div>
</div>

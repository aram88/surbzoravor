<div class="container">
<?php
$this->breadcrumbs=array(
	'Հարցերի խումբ'=>array('admin'),
);


$this->widget(
		'bootstrap.widgets.TbButtonGroup',
		array(
				'htmlOptions'=>array('class'=>'pull-left'),
				'buttons' => array(
						array('label' => 'Ստեղծել', 'url' => '/qgroup/create','htmlOptions'=>array( 'class'=>'btn-success')),
				),
		)
);
?>
<br/>
<br/>

<div class="well">
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'qgroup-grid',
'type' => 'striped',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'name',
		'position',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
</div>
</div>

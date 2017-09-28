<div class="container">
<?php
$this->breadcrumbs=array(
	'Մենյուներ'=>array('admin'),
);

$this->widget(
		'bootstrap.widgets.TbButtonGroup',
		array(
				'htmlOptions'=>array('class'=>'pull-right'),
				'buttons' => array(
						array('label' => 'Ստեղծել', 'url' => '/menu/create','htmlOptions'=>array( 'class'=>'btn-primary')),
				),
		)
);

?>
<br/><br/>
<div class="well">
	<h1>Մենյուներ</h1>
	<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'menu-grid',
	'type' => 'striped',		
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
			'menu_id',
			'name',
			array('name'=>'location','value'=>'$data->location?$data->locationData[$data->location]:""'
				,'filter'=>$model->locationData,'filterHtmlOptions'=>array('class'=>'span2')),
			'position',
			
			'visible',
			'created_date',
			
	array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
		),
	)); ?>
</div>
</div>
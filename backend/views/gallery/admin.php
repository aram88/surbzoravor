<div class="container">
<?php
$this->breadcrumbs=array(
	'Նկարներ'=>array('admin'),
	'նկարներ',
);
$this->widget(
		'bootstrap.widgets.TbButtonGroup',
		array(
				'htmlOptions'=>array('class'=>'pull-right'),
				'buttons' => array(
						array('label' => 'Ստեղծել', 'url' => '/gallery/create','htmlOptions'=>array( 'class'=>'btn-primary')),
				),
		)
);
?>
<br/>
<br/>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'gallerie-grid',
'type' => 'striped',		
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		array('name'=>'gallery_group_id','type'=>'html', 'value'=>'CHtml::link($data->galleryGroup->name,"/galleryGroup/".$data->galleryGroup->id)'),
		'name',
		'created_date',
		'modified_date',
		array('name'=>'image','type'=>'raw','value'=>'CHtml::image($data->getImage("sm_"),$data->name)'),
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
</div>
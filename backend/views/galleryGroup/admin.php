<div class="container">
<?php
$this->breadcrumbs=array(
	'Նկարների Խմբերի Ցուցակ',
);
$this->widget(
		'bootstrap.widgets.TbButtonGroup',
		array(
				'htmlOptions'=>array('class'=>'pull-right'),
				'buttons' => array(
						array('label' => 'Ստեղծել', 'url' => '/galleryGroup/create','htmlOptions'=>array( 'class'=>'btn-primary')),
				),
		)
);

?>

<br/>
<br/>



<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'gallery-group-grid',
'type' => 'striped',		
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		array('name'=>'name','type'=>'raw','value'=>'CHtml::link($data->name,"/galeryGroup/$data->id")'),
		'created_date',
		'modified_date',
		array('name'=>'image','type'=>'raw','value'=>'CHtml::image($data->getImage(),$data->name,array("class"=>"span4"))'),
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>

</div>
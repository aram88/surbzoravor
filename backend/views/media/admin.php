<div class="container">
<?php
$this->breadcrumbs=array(
	'ֆայլեր'=>array('admin'),
	
);
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'htmlOptions'=>array('class'=>'pull-left'),
        'buttons' => array(
            array('label' => 'Ստեղծել', 'url' => '/media/create','htmlOptions'=>array( 'class'=>'btn-primary')),
        ),
    )
);
?>
<br/>
<br/>




<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'media-grid',
'type' => 'striped',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'name',
		'path',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
    'template'=>'{view}{delete}'
),
),
)); ?>
</div>

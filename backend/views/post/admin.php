<div class="container">
<?php
$this->breadcrumbs=array(
	'Նյութեր'=>array('admin'),
);
$this->widget(
		'bootstrap.widgets.TbButtonGroup',
		array(
				'htmlOptions'=>array('class'=>'pull-left'),
				'buttons' => array(
						array('label' => 'Ստեղծել', 'url' => '/post/create','htmlOptions'=>array( 'class'=>'btn-primary')),
				),
		)
);
?>
<br/>
<br/>
<div class="well">
<h1>Նյութեր</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'post-grid',
'type' => 'striped',		
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		array('name'=>'menu_id','filter'=>Menu::model()->getMenusList(),'value'=>'$data->menu_id >0?$data->menu->name:null'),
		array('name'=>'stick', 'value'=>'app()->params["yesNoArray"][$data->stick]','filter'=>app()->params["yesNoArrayF"]),
		'name',
		'path',
		array('name'=>'visible', 'value'=>'app()->params["yesNoArray"][$data->visible]','filter'=>app()->params["yesNoArrayF"]),
		'created_date',
		array('name'=>'home_page', 'value'=>'app()->params["yesNoArray"][$data->visible]','filter'=>app()->params["yesNoArrayF"]),
		array('name'=>'image','value'=>'$data->image? CHtml::image($data->getImage("st_")):""','type'=>'raw'),
		array('name'=>'read_all', 'value'=>'app()->params["yesNoArray"][$data->read_all]','filter'=>app()->params["yesNoArrayF"]),
		array('name'=>'read', 'value'=>'app()->params["yesNoArray"][$data->read]','filter'=>app()->params["yesNoArrayF"]),
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
</div>
</div>
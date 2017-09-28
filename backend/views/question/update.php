<div class="container">
<?php
$this->breadcrumbs=array(
	'Հարցեր'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'htmlOptions'=>array('class'=>'pull-left'),
        'buttons' => array(
            array('label' => 'Հարցեր', 'url' => '/question/admin','htmlOptions'=>array( 'class'=>'btn-success')),
        ),
    )
);
	
	?>
<br/>
<br/>
<div class="well">
<h1>Պատասխանել հարցին   <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>
</div>
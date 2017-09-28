<?php
$this->breadcrumbs=array(
	'Questions'=>array('index'),
	'Create',
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
<br/>
<h1>Ստեղծել հարց</h1>
<div class='well'>
<?php echo $this->renderPartial('_form', array('model'=>$model,'hide'=>'1')); ?>
</div>
<?php
$posts->pagination=array('pageVar'=>'page');

$this->widget('bootstrap.widgets.TbListView',array(
		'dataProvider'=>$posts,
		'itemView'=>'_indexView',
		'summaryText'=>false,
        'ajaxUpdate'=>false,
        'template'=>'{items}{pager}'
)); ?>


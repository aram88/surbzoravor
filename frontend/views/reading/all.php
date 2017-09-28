
<?php
$dataProvider->pagination=array('pageVar'=>'page');

$this->widget('bootstrap.widgets.TbListView',array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_allReadings',
		'summaryText'=>false,
        'ajaxUpdate'=>false,
        'template'=>'{pager}{items}{pager}'
)); ?>
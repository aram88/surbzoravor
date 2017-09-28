<div class="divRed txtC">
    Նկարներ
</div>
<div class="clear-both"></div>
<div class="Tmargin25 txtJ">
<?php
$this->widget('bootstrap.widgets.TbListView',array(
		'dataProvider'=>$galleries,
		'itemView'=>'_indexView',
		'summaryText'=>false
));?>
</div>
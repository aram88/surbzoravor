<div class="divRed txtC Bmargin25">
        <?php echo $menu->name;?>
    </div>
<div class=" txtJ Tmargin25" id= "article">
  <?php 
            if ($menu->image != "" && $menu->image != NULL){
                echo CHtml::image('/images/menu/'.date("Y-m",strtotime($menu->created_date)).'/'.$menu->image,'',array('class'=>'pull-left Rmargin10'));
            }
        ?>
       <?php echo $menu->text;?>

</div>
      
    <div class="Bmargin25">
<?php foreach ($menu->menus as $men):?>
<div class="Bmargin15 w100P pull-left">
    <img src='/images/main/logoMin.png' class="pull-left Rmargin15" />
    <div class="pull-left Rmargin15 Tmargin10">
        <?php echo CHtml::link($men->name,'/menu/view/'.$men->slug);?>
    </div>
</div>
<div class="clear-both"></div>
<?php endforeach;?>
</div>
    
<div class = "pull-left">
<?php

$dataProvider->pagination=array('pageVar'=>'page');
$this->widget('bootstrap.widgets.TbListView',array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_indexView',
        'summaryText'=>'',
        'ajaxUpdate'=>false,
        'template'=>'{items}{pager}'
)); ?>
</div>
<br/>

<?php if($menu->id == 6):?>
<div class="clear-both"></div>
 <div class="Bmargin25 Tmargin25 pull-left w100P">
            <?php $this->widget('application.widgets.DCForm.DCForm');?>
       </div> 
<?php endif;?>   


<?php if($menu->id == 2):?>

<div style="clear:both"></div>
<div class="divRed txtC Bmargin25 Tmargin25">
        Նախկինում ծառայած քահանաներ
 </div>
 
 <div class="clear-both"></div>
 
 <?php
 
 $dataProvider2  = new CActiveDataProvider('Post',array(
              'criteria'=> array(
                  'condition' =>'menu_id=:menuId',
                  'order'=>'created_date DESC, id DESC',
                  'params'=>array(':menuId'=>53)
              
              ),
              'pagination'=>array(
                  'pageSize'=>40,
              ),
          ));


$this->widget('bootstrap.widgets.TbListView',array(
		'dataProvider'=>$dataProvider2,
		'itemView'=>'_indexView',
        'summaryText'=>'',
        'ajaxUpdate'=>false,
        'template'=>'{items}'
)); ?>
 
<?php endif;?>   

<script>

jQuery('#article').find('p').first().insertBefore('#article');



jQuery('#article').readmore({
	  speed: 75,
	  maxHeight: 215,
	  overflow: 'hidden',
	  moreLink: '<a href="#" style="margin-bottom:15px">Կարդալ ավելին</a>',
	  lessLink: '<a href="#"  style="margin-bottom:15px">Փակել</a>'
	});
</script>
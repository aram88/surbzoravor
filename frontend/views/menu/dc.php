<div class="divRed txtC Bmargin25">
        <?php echo $menu->name;?>
    </div>
<div class=" txtJ Tmargin25">
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
    <div class="pull-left Rmargin15 Tmargin10">
        <?php 
         if ($men->image != "" && $men->image != NULL){
                echo CHtml::image('/images/menu/'.date("Y-m",strtotime($men->created_date)).'/st_'.$men->image,'',array('class'=>'pull-left Rmargin10 Tmargin20'));
            }
         ?>
         <?php if (strlen($men->text) >=400): ?>
<?php  $firts_point = strpos($men->text,' ',400);
    	        $menu->text=substr($men->text,0,$firts_point+1);?>
        <?php echo  $menu->text;?>
        <?php if (strlen($men->text) >=4): ?>
        <?php echo Chtml::link('Կարդալ ավելին  '."<span class='red'>>></span>",'/menu/view/'.$men->slug);?>
        <?php endif;?>
        <?php else:?>
       <?php echo $men->text;?>
<?php endif;?>
    </div>
</div>
<div class="clear-both"></div>
<?php endforeach;?>
</div>
    
<div>
<?php

$dataProvider->pagination=array('pageVar'=>'page');
$this->widget('bootstrap.widgets.TbListView',array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_indexView',
        'summaryText'=>'',
        'ajaxUpdate'=>false,
        'template'=>'{pager}{items}{pager}'
)); ?>
</div>
<br/>

<div class="clear-both"></div>
 <div class="Bmargin25 Tmargin25 pull-left w100P">
            <?php $this->widget('application.widgets.DCForm.DCForm');?>
       </div> 
  
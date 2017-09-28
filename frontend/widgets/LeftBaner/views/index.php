<?php $this->widget(
			'application.widgets.Readings.Readings'
	
	);?>
<div class="clear-both"></div>
<br/>
<div class="divRed">
    <?php echo CHtml::link('<strong>Զորավոր Սուրբ Աստվածածին եկեղեցի</strong>','/menu/view/zoravor-surb-astvatsatsin-ekegheci',array('style'=>'line-height:1.9em'));?>
</div>
<?php
$this->widget(
		'booster.widgets.TbMenu',
		array(
				'htmlOptions'=>array('class'=>'cl-vnavigation m0  '),
				'encodeLabel' => false,
				'type' => 'list',
				'items' => $items,
				
		)
);?>

<div class="divRed">
		<strong>Գրքեր</strong> 
</div>
<div>
<?php if (count($postsPdf) >0):?>
    <?php foreach ($postsPdf as $post): ?>
    <div class="Lpadding15 Tpadding10">
    
   <i class="fa fa-book red fS18"></i>
    <?php echo CHtml::link($post['name'],$post['path'],array('class'=>'red ','target'=>'_blank'))?>
    </div>
    <?php endforeach;?>
<?php endif;?>
</div>
<div class="Tmargin20">
<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fsurbzoravor&amp;width=270&amp;height=400&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px; height:400px;" allowTransparency="true"></iframe>
</div>
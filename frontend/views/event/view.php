
<div class="divRed txtC Bmargin25" ><?php echo $event['0']['name'];?></div>
	<?php echo $event['0']['text']; $str = '';?>
<?php foreach ($other as $read):?>	
<strong>
         <div class="Bmargin15 Lmargin25"><i class="fa fa-book  fS18" style="color:#900"> </i> 
         <?php echo CHtml::link($read['name'],'/reading/'.$read['id']);
            $str .= $read['name'].', '?>
         </div>
</strong>
<?php endforeach;?>
<?php cs()->registerMetaTag('http://surbzoravor.am/images/images/vordegrutyun.jpg',null,null,array('property'=>'og:image')); ?>
<?php cs()->registerMetaTag($fbHeader,null,null,array('property'=>'og:title')); ?>
<?php cs()->registerMetaTag( substr($str, 0, -2),null,null,array('property'=>'og:description')); ?>
<?php cs()->registerMetaTag('http://surbzoravor.am/event/'.$event['0']['id'],null,null,array('property'=>'og:url')); ?>

<div class="divRed txtC Bmargin25" ><h1 class='fS14'><?php echo $reading['0']['name'];?></h1></div>
	<?php echo $reading['0']['text'];?>
<?php foreach ($other as $read):?>	
<strong>
         <div class="Bmargin15 Lmargin25"><i class="fa fa-book  fS18" style="color:#900"> </i> 
         <?php echo CHtml::link($read['name'],'/reading/'.$read['id'])?>
         </div>
</strong>
<?php endforeach;?>
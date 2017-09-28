<div class="row-fluid ">
<div class="divRed">
		<strong><?php echo $day->name;  ?>	</strong> 
	</div>
	<div class="clear-both"></div>
	<?php $i = 0; foreach ($day->events as $event):?>
	<div class="txtL Tmargin10 Lpaddin15 <?php if ($i%2 == 0) {echo "bg1";}else{echo "bg2";}?>">
		<?php echo CHtml::link($event->name,'/event/'.$event->id,array("class"=>"red")); $i++;?>
	</div>
	<?php endforeach;?>
	<?php foreach ($day->readings as $reading):?>
	<div class="txtL Lpaddin15 <?php if ($i%2 == 0) {echo "bg1";}else{echo "bg2";}?>">
		<?php echo CHtml::link('<i class="fa fa-book red "></i>&nbsp;'.$reading->name,'/reading/'.$reading->id); $i++;?>
	</div>
	<?php endforeach;?>
	<div class="txtR Rpadding10 <?php if ($i%2 == 0) {echo "bg1";}else{echo "bg2";}?>">
		<?php echo CHtml::link('Բոլոր օրեր >>','/reading/all');?>
	</div>
	
</div>
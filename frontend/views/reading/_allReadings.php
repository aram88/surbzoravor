<div class="Bmargin20">
    <div class=" txtC Bmargin25" style="color:#340237;font-size:17px;">
        <strong><?php echo $data->name;?></strong>
    </div>
<?php if (isset($data->events)):?>
    <?php foreach ($data->events as $event):?>
   <div class="Bmargin15 Lmargin25"> <?php echo CHtml::link($event->name,'/event/'.$event->id);?></div>
    <?php endforeach;?>
    <?php foreach ($data->readings as $reading):?>
   <div class="Bmargin15 Lmargin25"><i class="fa fa-book  fS18" style="color:#900"> </i> <?php echo CHtml::link($reading->name,'/reading/'.$reading->id);?></div>
    <?php endforeach;?>
<?php endif;?>    
</div>
<div class="span2">
    <div class="gallery">
        <div class="bgW padding20">
            <?php echo CHtml::image($data->getImage('inq_'));?>
            <div class="fS11 txtC">
              <?php echo CHtml::link($data->name,'/gallery/'.$data->id,array('class'=>'red'))?>
            </div>
        </div>
        
    </div>
</div>
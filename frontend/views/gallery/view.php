<div class="divRed txtC">
   ssdss
</div>
<div class="clear-both"></div>
<div class="Tmargin25 txtJ">

<?php   foreach ($galleries as $gallery):?>
    <div class='imageGallery pull-left Rmargin15 Bmargin15'>
        <a class="fancybox" rel="group" href="/images/gallery/<?php echo date('Y-m',strtotime($gallery['created_date'])).'/og_'.$gallery['image'];?>" title="<?php echo  $gallery['name']?>" >
        <?php echo CHtml::image('/images/gallery/'.date('Y-m',strtotime($gallery['created_date'])).'/'.$gallery['image'])?>
        </a>
    </div>
<?php endforeach;?>   
</div> 
<script type="text/javascript">
$(document).ready(function() {
	
	 $(".fancybox").fancybox({
			prevEffect		: 'none',
			nextEffect		: 'none',
			closeBtn		: false,
			helpers		: {
				title	: { type : 'inside' },
				buttons	: {}
			}
		});
});
</script>
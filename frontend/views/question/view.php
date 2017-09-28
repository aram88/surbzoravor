<?php cs()->registerMetaTag($question->text, null, null, array('property'=>'og:title')); ?>
<?php 
$fbHeader = $question->ans_text;
		if (strlen($fbHeader) > 100) {
			$firts_point = strpos($fbHeader,' ',100);
			$fbHeader=substr($fbHeader,0,$firts_point+1).'...';
		}
?>
	<?php cs()->registerMetaTag($fbHeader, null,null,array('property'=>'og:description')); ?>
	<?php cs()->registerMetaTag('http://surbzoravor.am/images/main/harc.jpg',null,null,array('property'=>'og:image')); ?>
<div class="divRed txtC Bmargin20">
    <?php echo $question->text;?>
</div>
<div class="clear-both"></div>
<div class="Tmargin25 txtJ">
  
   
    
    <?php echo $question->ans_text;?>
   
</div>
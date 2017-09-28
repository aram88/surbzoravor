<h1 class="divRed txtC">
    <?php echo $post['name']?>
</h1>
<div class="clear-both"></div>
<div class="Tmargin25 txtJ">
  
    <?php 
            if ($post['image'] != "" && $post['image'] != NULL){
                echo CHtml::image('/images/post/'.date("Y-m",strtotime($post['created_date'])).'/'.$post['image'],'',array('class'=>'pull-left Rmargin10'));  
                
                  cs()->registerMetaTag('http://surbzoravor.am/images/post/'.date("Y-m",strtotime($post['created_date'])).'/og_'.$post['image'],null,null,array('property'=>'og:image'));
                ?>
                
                
              
        <?php    }
        ?>
  
    
    <?php echo $post['text'];?>
   
</div>
<div class="Tmargin5 txtJ"> <?php echo date("d.m.y",strtotime($post['created_date']));?></div>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<div class="addthis_sharing_toolbox"></div>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-531795ad559cd538" async></script>
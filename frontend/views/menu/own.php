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
  
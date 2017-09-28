<div class="clear"></div>

<div class="w100P  pull-left bg3 " >
		<div class="headerLink"></div>
	   <?php if ($data->type == 0):?>
		<strong><?php echo CHtml::link($data->name,'/post/view/'.$data->slug);?>	</strong>
		<?php endif?> 
		 <?php if ($data->type == 1):?>
		<strong><?php echo CHtml::link("<i class='fa fa-book fS16' style='color:#900'></i> ".'   '.$data->name,$data->path,array('target'=>'_blank'));?>	</strong>
		<?php endif?> 
		<?php if ($data->type == 2):?>
		<strong><?php echo CHtml::link("<i class='fa fa-music fS16 ' style='color:#900'></i> ".'   '.$data->name,'/post/view/'.$data->slug);?>	</strong>
		<?php endif?> 
	

	<div class="clear-both"></div>
	<div class="w100P  pull-left Tmargin15 "></div>
        <?php if ($data->image != NULL && !empty($data->image) ): ?>
	<div class="span6 m0">
		<?php echo CHtml::image('/images/post/'.date("Y-m",strtotime($data->created_date)).'/st_'.$data->image,'',array('class'=>'pull-left Rmargin15'))?>

			<?php
			if ($data->read){
			echo strip_tags($data->shortText).'.....';
			}elseif($data->read_all) {
			    echo  $data->text;
			}
			else{
			    echo  $data->text;
			}
			?>
			
		
		<div class="pull-right fS12">
		<i>
		<?php if ($data->read): ?>
		    <?php if ($data->type == 0):?>
			<?php echo Chtml::link('Կարդալ ավելին  '."<span style='color:#900'>>></span>",'/post/view/'.$data->slug);?>
			<?php endif;?>
			<?php if ($data->type == 1):?>
			<?php echo Chtml::link('Կարդալ  Գիրքը',$data->path,array('target'=>'_blank'));?>
			<?php endif;?>
			<?php if ($data->type == 2):?>
			<?php echo Chtml::link('Լսել','/post/view/'.$data->slug);?>
			<?php endif;?>
		<?php endif;?>
		</i>
		</div>
	</div>
       <?php else:?>
       <div class="span6 m0">
		
		<div >
			<?php
			if ($data->read){
			echo strip_tags($data->shortText).'.....';
			}elseif($data->read_all) {
			    echo  $data->text;
			}
			else{
			    echo  $data->text;
			}
			?>
			
		</div>
		<div class="pull-right fS12">
		<i>
		<?php if ($data->read): ?>
		    <?php if ($data->type == 0):?>
			<?php echo Chtml::link('Կարդալ ավելին  '."<span style='color:#900'>>></span>",'/post/view/'.$data->slug);?>
			<?php endif;?>
			<?php if ($data->type == 1):?>
			<?php echo Chtml::link('Կարդալ  Գիրքը',$data->path,array('target'=>'_blank'));?>
			<?php endif;?>
			<?php if ($data->type == 2):?>
			<?php echo Chtml::link('Լսել','/post/view/'.$data->slug);?>
			<?php endif;?>
		<?php endif;?>
		</i>
		</div>
	</div>
       <?php endif;?>
</div>
	<div class="clear-both"></div>
<div class="w100P  pull-left Tmargin20 "></div>
	<div class="clear-both"></div>
<?php if(!empty($days)){ ?>
<h1 class="divRed txtC">
	<?php echo $days->name?>
</h1>
<?php }?>
<div class="Bmargin20">
<?php if (isset($days->events)):?>
    <?php foreach ($days->events as $event):?>
   <div class="Bmargin15"> <?php echo CHtml::link($event->name,'/event/'.$event->id);?></div>
    <?php endforeach;?>
	<?php if (empty($days->events) &&  !empty($days->readings[0])) {?>
		<?php cs()->registerMetaTag($days->name, null, null, array('property'=>'og:title')); ?>
	<?php } elseif(!empty($days->events)) {
		$fbHeader = $days->name.' '.$days->events[0]->name;
		if (strlen($fbHeader) > 100) {
			$firts_point = strpos($fbHeader,' ',100);
			$fbHeader=substr($fbHeader,0,$firts_point+1).'...';
		}
      cs()->registerMetaTag($fbHeader,null,null,array('property'=>'og:title'));
	} ?>
	<?php $str = ''; ?>
    <?php foreach ($days->readings as $reading):?>
   <div class="Bmargin15"><i class="fa fa-book  fS18 dsdd" style='color:#900'> </i> <?php echo CHtml::link($reading->name,'/reading/'.$reading->id);?></div>
		<?php $str .= $reading->name.', '?>
    <?php endforeach;?>
	<?php cs()->registerMetaTag( substr($str, 0, -2),null,null,array('property'=>'og:description')); ?>
<?php endif;?>
</div>
<?php cs()->registerMetaTag('http://surbzoravor.am/images/images/vordegrutyun.jpg',null,null,array('property'=>'og:image')); ?>
<div class="Bmargin20">
<?php if ($posts):?>
   <?php foreach ($posts as $post):?>
<div class="clear"></div>
<div class="w100P  pull-left bg3 " >
		<div class="headerLink">
	   <?php if ($post->type == 0):?>
		<strong><?php echo CHtml::link($post->name,'/post/view/'.$post->slug);?>	</strong>
		<?php endif?> 
		 <?php if ($post->type == 1):?>
		<strong><?php echo CHtml::link("<i class='fa fa-book fS16' style='color:#900'></i> ".'   '.$post->name,$post->path,array('target'=>'_blank'));?>	</strong>
		<?php endif?> 
		<?php if ($post->type == 2):?>
		<strong><?php echo CHtml::link("<i class='fa fa-music fS16' style='color:#900'></i> ".'   '.$post->name,'/post/view/'.$post->slug);?>	</strong>
		<?php endif?> 
	</div>
	<div class="pull-right"><?php echo date("d/m/Y",strtotime($post->created_date))?></div>
	<div class="clear-both"></div>
	<div class="w100P  pull-left Tmargin15 "></div>
	<?php if ($post->image != NULL && !empty($post->image) ): ?>
	<div class="span2 m0">
		<?php echo CHtml::image('/images/post/'.date("Y-m",strtotime($post->created_date)).'/st_'.$post->image)?>
	</div>
	<div class="span4">
		
		<div >
			<?php
			if ($post->read){
			echo strip_tags($post->shortText).'.....';
			}elseif($post->read_all) {
			    echo  $post->text;
			}
			else{
			    echo  $post->text;
			}
			?>
			
		</div>
		<div class="pull-right fS12">
		<i>
		<?php if ($post->read): ?>
		    <?php if ($post->type == 0):?>
			<?php echo Chtml::link('Կարդալ ավելին  '."<span style='color:#900'>>></span>",'/post/view/'.$post->slug);?>
			<?php endif;?>
			<?php if ($post->type == 1):?>
			<?php echo Chtml::link('Կարդալ  Գիրքը',$post->path,array('target'=>'_blank'));?>
			<?php endif;?>
			<?php if ($post->type == 2):?>
			<?php echo Chtml::link('Լսել','/post/view/'.$post->slug);?>
			<?php endif;?>
		<?php endif;?>
		</i>
		</div>
	</div>
       <?php else:?>
       <div class="span6 m0">
		
		<div >
			<?php
			if ($post->read){
			echo strip_tags($post->shortText).'.....';
			}elseif($post->read_all) {
			    echo  $post->text;
			}
			else{
			    echo  $post->text;
			}
			?>
			
		</div>
		<div class="pull-right fS12">
		<i>
		<?php if ($post->read): ?>
		    <?php if ($post->type == 0):?>
			<?php echo Chtml::link('Կարդալ ավելին  '."<span style='color:#900'>>></span>",'/post/view/'.$post->slug);?>
			<?php endif;?>
			<?php if ($post->type == 1):?>
			<?php echo Chtml::link('Կարդալ  Գիրքը',$post->path,array('target'=>'_blank'));?>
			<?php endif;?>
			<?php if ($post->type == 2):?>
			<?php echo Chtml::link('Լսել','/post/view/'.$post->slug);?>
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
<?php endforeach;?>
<?php endif;?>    
</div>
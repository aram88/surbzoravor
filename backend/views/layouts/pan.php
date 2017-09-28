<?php
$this->widget(
		'booster.widgets.TbMenu',
		array(
				'htmlOptions'=>array('class'=>'cl-vnavigation m0'),
				'type' => 'list',
				'encodeLabel' => false,
				'items' => array(
						array('label' => '<i class="fa fa-home c1 fS16"></i> &nbsp;Գլխավոր', 'url' => '/'),
						array('label' => '<i class="fa fa-cogs c1 fS16"></i> &nbsp;Մենյուներ', 'url' => '/menu/admin'),
						array('label' => '<i class="fa fa-bookmark c1 fS16"></i> &nbsp;Նյութեր', 'url' => '/post/admin'),
						array('label' => '<i class="fa fa-calendar c1 fS16"></i> &nbsp;Օրեր', 'url' => '/day/admin'),
						array('label' => '<i class="fa fa-book c1 fS16"></i> &nbsp;Ընթերցվածքներ', 'url' => '/reading/admin'),
						array('label' => '<i class="fa fa-flag c1 fS16"></i> &nbsp;Իրադարձություններ', 'url' => '/event/admin'),
						array('label' => '<i class="fa fa-camera c1 fS16"></i> &nbsp;Նկարների խմբեր ', 'url' => '/galleryGroup/admin'),
						array('label' => '<i class="fa fa-camera-retro c1 fS16"></i> &nbsp;Նկարներ', 'url' => '/gallery/admin'),
				        array('label' => '<i class="fa fa-question c1 fS16"></i> &nbsp;Հարցերի խումբ ', 'url' => '/qgroup/admin'),
						array('label' => '<i class="fa fa-question c1 fS16"></i> &nbsp;Հարց Քահանային', 'url' => '/question/admin'),
						array('label' => '<i class="fa fa-rss c1 fS16"></i> &nbsp;Բաժանորդագրվողներ', 'url' => '/subibe/admin'),
						array('label' => '<i class="fa fa-play-circle c1 fS16"></i> &nbsp;Վիդեոներ', 'url' => '/video/admin'),
						array('label' => '<i class="fa fa-folder-open c1 fS16"></i> &nbsp;ֆայլեր', 'url' => '/media/admin'),
					
				)
		)
);
?>
           
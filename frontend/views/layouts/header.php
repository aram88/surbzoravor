<?php $this->widget('bootstrap.widgets.TbNavbar', array(
    'type'=>'inverse', // null or 'inverse'
    'brand'=>'',
    'brandUrl'=>'',
	'fixed'=>'top',
	'htmlOptions'=>array('class'=>'navbar m0'),						
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
        array(
			'htmlOptions' => array('class'=>'m0 p0'),
        	'encodeLabel' => false,
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'<i class="fa fa-home fS18"> </i> &nbsp;Գլխավոր', 'url'=>'/', 'itemOptions'=>array('class'=>'color7'),'linkOptions'=>array('class'=>(app()->request->url=='/')?"activeUrl":"color7") ),
            		array('label'=>'<i class="fa fa-book fS18"> </i> &nbsp;Քարոզներ', 'url'=>'/menu/view/qarozner', 'itemOptions'=>array('class'=>'color7'),'linkOptions'=>array('class'=>(app()->request->url=='/menu/view/qarozner')?"activeUrl":"color7") ),
				array('label'=>'<i class="fa fa-book fS18"> </i> &nbsp;Գրադարան', 'url'=>'/menu/view/gradaran', 'itemOptions'=>array('class'=>'color7'),'linkOptions'=>array('class'=>(app()->request->url=='/menu/gradaran')?"activeUrl":"color7") ),
				array('label'=>'<i class="fa fa-film fS18"> </i>&nbsp;Տեսանյութեր', 'url'=>'https://www.youtube.com/channel/UC8go1GVoqdat3iKSTBYMrmA', 'itemOptions'=>array('class'=>'color7'),'linkOptions'=>array('class'=>' color7','target'=>'_blanck') ),
				array('label'=>'<i class="fa fa-camera fS18"> </i>&nbsp;Նկարներ', 'url'=>'/gallery', 'itemOptions'=>array('class'=>'color7'),'linkOptions'=>array('class'=>(app()->request->url=='/gallery')?"activeUrl":"color7") ),
				array('label'=>'<i class="fa fa-question fS18"> </i>&nbsp;Հարց Քահանային', 'url'=>'/question', 'itemOptions'=>array('class'=>'color7'),'linkOptions'=>array('class'=>(app()->request->url=='/question')?"activeUrl":"color7") ),
            ),
        ),
  
     // '<form class="navbar-search pull-right" action=""><input type="text" class="search-query span2" placeholder="Search" style="width:120px;"  ></form>',
		'<ul class="nav nav-pills pull-left">
					<li><a href="https://www.youtube.com/channel/UC8go1GVoqdat3iKSTBYMrmA" class="circleYT"><i class="fa fa-youtube-square  fS18"> </i></a></li>
	  				<li><a href="https://www.facebook.com/surbzoravor" target="_blank" class="circleFB"><i class="fa fa-facebook fS18"> </i></a></li>
	  				<li><a href="/site/contact" class="circleMS"><i class="fa fa-envelope fS18"> </i></a></li>
                    <li><a href="#" class="btn-info" id="circleSerach"><i class="fa fa-search fS18"> </i></a></li>
	  			</ul>',
        "<did id='googleSearch' class='hide Tpadding15 Bpadding15 pull-left'><script>
        (function() {
            var cx = '015528939422432583810:clyoodssjyw';
            var gcse = document.createElement('script');
            gcse.type = 'text/javascript';
            gcse.async = true;
            gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
            '//www.google.com/cse/cse.js?cx=' + cx;
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(gcse, s);
        })();
        </script>
        <gcse:search></gcse:search></div>",

    ),
)); ?>
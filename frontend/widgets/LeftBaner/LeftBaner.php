<?php
class LeftBaner extends CWidget {
	public function run (){
		$menus = Menu::model()->getMenusByLocation(2);
		$postsPdf =  Post::model()->getRandomPost(1);
		$items = array();
		$i= 2;
		$j = 1;
		foreach ($menus as $menu){
		    if ($j==1){
		      
		            $i++;
		            $j++;
		        
		    }else{
			$items[] = array(
				'label'=>"<table><tr><td class='p0 Lpading15 w35' ><img src='/images/main/logoMin1.png'/></td>
			    <td class='Tpadding10'>
				{$menu['name']}</span></td></tr></table>",
				'url'=>"/menu/view/{$menu['slug']}",
				'itemOptions'=>array('class'=>$i%2==0 ? 'odd1':'odd2' )			
			);
			if ($menu['id']==6){
			    $items[] = array(
			        'label'=>'<img src="/images/main/mutq2.jpg"/>',
			        'url'=>'https://www.youtube.com/watch?v=pUpg6M8aY7w',
			        'itemOptions'=>array('class'=> 'odd1', 'style'=>'width:106%; padding:0px;height:204px;'),
			        'linkOptions'=>array( 'style'=>' padding:0px;padding-left:15px;','target'=>'_blanck'),
			        );
			    $i++;
			}
			$i++;
		    }
		}
		$this->render('index',array('items'=>$items,'postsPdf'=> $postsPdf));
	}
}
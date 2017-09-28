<?php
class RightBaner extends CWidget {
	public function run (){
	    $posts =  Post::model()->getRandomPost(0);
		$menus = Menu::model()->getMenusByLocation(3);
		$items = array();
		$i= 2;
		$j =1;
		
		$model=  new Subscribe();
		foreach ($menus as $menu){
		    if ($j==1){
		    
		        $i++;
		        $j++;
		    
		    }else{
		    
		    if ($menu['id'] ==19){
			    $items[] = array(
					'label'=>"<table><tr><td class='p0 Lpading15 w35' ><img src='/images/main/logoMin1.png'/></td>
				    <td class='p0' style='padding-left:9px !important;'>
					{$menu['name']}</span></td></tr></table>",
					'url'=>"/menu/view/{$menu['slug']}",
					'itemOptions'=>array('class'=>$i%2==0 ? 'odd1':'odd2' )			
				);
				$i++;
		    }else{
			$items[] = array(
				'label'=>"<table><tr><td class='p0 Lpading15 w35' ><img src='/images/main/logoMin1.png'/></td>
			    <td class='Tpadding10'>
				{$menu['name']}</span></td></tr></table>",
				'url'=>"/menu/view/{$menu['slug']}",
				'itemOptions'=>array('class'=>$i%2==0 ? 'odd1':'odd2' )			
			);
			$i++;
		     }	
		    }
		}
		if (isset($_POST['Subscribe'])){
			$model->attributes =  $_POST['Subscribe'];
			$model->hash = uniqid('', true);
			
			if ($model->save()){
			    $to = $_POST['Subscribe']['email'];
			    
			    $text = "Բարև ձեզ դուք հաջողությամբ բաժանորդագրվեցիք մեր էջում։ 
			        <br/>Դուք կստանաք թարմացումներ մեր էջից։ <br/>
			         Շնորհակալություն բաժանորդագրվելու համեր <br/><br/><br/><br/>
			        Եթե դուք ուզում եք հրաժարվել բաժանորդագրվելուց ապա սեղմեք այս ճանապարհը <a href=".app()->getBaseUrl(true)."/subscribe/remove/".$model->hash.">".app()->getBaseUrl(true)."/subscribe/remove/".$model->hash."<a/>";
			    $subject = "Subscribtion ";
			    $headers = "From:  Zoravor Surb Astvacacin Church <info@surbzoravor.am>". "\r\n" . 'content-type:text/html' . "\r\n";
			    mail($to, $subject, $text,$headers);

			
			   Yii::app()->user->setFlash('success', "Շնորհակալություն  բաժանորդագրվելու համար։  Դուք կստանաք նամակներ մեր թարմացումների մասին։");
				$this->controller->redirect('/');
			}
		}
		$ton = Menu::model()->findByPk(46);
		
		$this->render('index',array('items'=>$items,'model'=> $model ,'posts'=>$posts,'ton'=>$ton));
	}
}
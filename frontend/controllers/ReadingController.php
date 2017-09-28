<?php
class ReadingController extends FrontendController{
	public function actionView(){
		$reading =  Reading::model()->getReadingById($_GET['id']);
		$other = Reading::model()->getReadingByParenId($reading['0']['day_id']);
		$this->pageTitle = $reading['0']['name'];
		$this->render('view',array('reading'=>$reading,'other'=>$other));
	}
	public function actionAll(){
	    $dataProvider = new CActiveDataProvider('Day',array(
	        'criteria'=> array(
	             'order'=>'created DESC',
	            'with'=>array('readings','events')
	             
	        ),
	        'pagination'=>array(
	            'pageSize'=>15,
	            'pageVar'=>'page'
	        ),
	    ));
	    $this->pageTitle = "Բոլոր օրերի ընթերցվածքները |  Bolor oreri yntercvacqnery";
	    $this->render('all',array('dataProvider'=>$dataProvider));
	}
}
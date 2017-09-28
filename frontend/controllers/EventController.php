<?php
class EventController extends FrontendController{
	public function actionView(){
		$event =  Event::model()->getEventById($_GET['id']);
		$other = Reading::model()->getReadingByParenId($event['0']['day_id']);
		$day =  Day::model()->findByPk($event['0']['day_id']);
		$fbHeader = $day->name.' '.$event['0']['name'];
		$event['0']['name'] = $fbHeader;
		if (strlen($fbHeader) > 100) {
			$firts_point = strpos($fbHeader,' ',100);
			$fbHeader=substr($fbHeader,0,$firts_point+1).'...';
		}
		$this->render('view',array('event'=>$event,'other'=>$other, 'fbHeader' => $fbHeader));
	}
}
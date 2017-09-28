<?php
class Readings extends CWidget{
	public function run(){
		$day =  Day::model()->getLastDayReadingsEvents();
		$this->render('index',array('day'=>$day));
	}
}
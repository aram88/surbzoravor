<?php
class GeneralController extends FrontendController{
    public function actionView($day,$month,$year){
       $days = Day::model()->getDayByDate($day, $month, $year);
       $posts =  Post::model()->getPostByDate($day, $month, $year);
       $this->render('view',array('posts'=>$posts,'days'=>$days));
    }
}
<?php
/**
 * Basic "kitchen sink" controller for frontend.
 * It was configured to be accessible by `/site` route, not the `/frontendSite` one!
 *
 * @package YiiBoilerplate\Frontend
 */
class FrontendSiteController extends FrontendController
{
    
	/**
     * Actions attached to this controller
     *
	 * @return array
	 */
	public function actions()
    {
		return array(
		    'captcha'=>array(
		        'class'=>'CCaptchaAction',
		        'backColor'=>0xFFFFFF,
		    ),
           
            'error' => array(
                'class' => 'SimpleErrorAction'
            )
		);
	}
	public function actionIndex()
	{
	    $this->pageTitle = "Սուրբ Զորավոր Աստվածածին Եկեղեցի  | Սուրբ Զորավոր   | Զորավոր  | Աստվածածին  | Suurb Zoravor | Zoravor Astvacacin Ekexeci  ";
	    $dataProvider=new CActiveDataProvider('Post',array(
	        'criteria'=> array(
	            'condition' =>'home_page =1 AND visible =1',
	            'order'=>'created_date DESC, id DESC',
	             
	        ),
	        'pagination'=>array(
	            'pageSize'=>10,
	            'pageVar'=>'page'
	        ),
	    ));
	    $this->render('index',array('posts'=>$dataProvider));
	}
	
	public function actionContact(){
	    $this->pageTitle = 'Հետադարձ Կապ';
	    $model = new MessageModel();
	    
	    if (isset($_POST['MessageModel'])){
	        $model->attributes = $_POST['MessageModel'];
	        if ($model->validate()){
	            $to = "surbzoravo@gmail.com";
	             
	            $subject = $_POST['MessageModel']['subject'];
	            $txt = $_POST['MessageModel']['text'];
	            $headers = "From: {$_POST['MessageModel']['mail']} ";
	            if (mail($to,$subject,$txt,$headers)) {
	                  Yii::app()->user->setFlash('success', "Շնորհակալություն ձեր նամակի համար։ Մենք շուտով ձեզ կպատասխանենք։");
	                $this->redirect('/');
	            } else {
	                 Yii::app()->user->setFlash('success', "Չհաջողվեց ուղարկել նամակը խնդրում ենք նորց փորձեք");
	            }
	        }
	    }
	    $this->render('contact',array('model'=>$model));
	}
	
	public function actionRemoveSubscribe($hash){
	    $criteria =  new CDbCriteria();
	    $criteria->condition = "hash =:hash";
	    $criteria->params = array(":hash"=>$hash);
	    $model = Subscribe::model()->find($criteria);
	    if ($model->delete()){
	        Yii::app()->user->setFlash('success', "Շնորհակալություն։ Դուք հաջողությամբ հրաժարվեցիք բաժանորդագրվելուց");
	    }else{
	        Yii::app()->user->setFlash('error', "Չհաջողվեց խնդրում ենք նորից փորձել");
	    }
	    $this->redirect('/');
	}
	
	public function actionVideo (){
		$this->redirect('/');
	  //  $this->render('video');
	}
	
	
}
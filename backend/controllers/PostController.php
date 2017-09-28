<?php

class PostController extends BackendController {
	/**
	* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	* using two-column layout. See 'protected/views/layouts/column2.php'.
	*/
	public $layout='//layouts/column2';
	
	/**
	* @return array action filters
	*/
	public function filters() {
		 return parent::filters();
	}
	
	/**
	* Specifies the access control rules.
	* This method is used by the 'accessControl' filter.
	* @return array access control rules
	*/
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','facebook','updatePost'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	/**
	* Displays a particular model.
	* @param integer $id the ID of the model to be displayed
	*/
	public function actionView($id){
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	/**
	* Creates a new model.
	* If creation is successful, the browser will be redirected to the 'view' page.
	*/
	public function actionCreate(){
		$model=new Post('create');
		$rnd = rand(0,9999);
		if(isset($_POST['Post'])){
			if ($_POST['Post']['created_date'] == NULL || empty($_POST['Post']['created_date'])){
				$date = date("Y-m-d");
				$_POST['Post']['created_date'] = $date;
			}else {
				$date = $_POST['Post']['created_date'];
			}
			$model->attributes=$_POST['Post'];
			
			$uploadedFile=CUploadedFile::getInstance($model,'image');
			$model->image =  CUploadedFile::getInstance($model,'image');
			$name = str_replace(' ', '-', trim($_POST['Post']['name'],' '));
			$model->slug = strtr($name,self::$translateString);
			$model->title = ucwords($_POST['Post']['name'].' | '.strtr(trim($_POST['Post']['name'],''),self::$translateString));
			$result = app()->db->createCommand()
                			->select('id')
                			->from('post')
                			->where('slug=:slug',array(':slug'=>$model->slug))
                			->queryAll();
			if (!empty($result)){
			    $model->slug .= rand(1,100000);
			}
			if ($model->validate()){
				if($uploadedFile instanceof CUploadedFile){
					$fileName = strtr($name,self::$translateString)."-{$rnd}".'.jpg';  // random number + file name
					$model->image = $fileName;
				}
			}
			if($model->save()){
				if($uploadedFile instanceof CUploadedFile){
					if (!file_exists(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)))) {
						mkdir(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)), 0755, true);
					}
					$uploadedFile->saveAs(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.'inq_'.$fileName);
					$image = new EasyImage(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.'inq_'.$fileName);
					$image->resize(NULL,app()->params['imageSizes']['og']);
					$image->save(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.'og_'.$fileName);
					$image = new EasyImage(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.'inq_'.$fileName);
					$image->resize(300);
					$image->save(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.$fileName);
					$image = new EasyImage(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.'inq_'.$fileName);
					$image->resize(app()->params['imageSizes']['sm']);
					$image->save(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.'sm_'.$fileName);
					$image = new EasyImage(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.'inq_'.$fileName);
					$image->resize(app()->params['imageSizes']['st']);
					$image->save(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.'st_'.$fileName);
					$image = new EasyImage(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.'inq_'.$fileName);
					$image->resize(app()->params['imageSizes']['slider']);
					$image->save(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.'slider_'.$fileName);
				}
				$model2 = new General();
				$model2->post_id = $model->id;
				$model2->created_date = $date;
				$model2->save();
				if(@strpos($model->text,' ',650)){
				    $firts_point = strpos($model->text,' ',650);
				    $model->text=substr($model->text,0,$firts_point+1);
				}
				if ($model->type !=1 && $model->home_page == 1){
    				$text = "Բարև ձեզ  մեր կայքում ավելացել է նոր նյութ։
    				     <br/> <br/><b>".$model->name
    			        ."</b><br/> <br/>".$model->text
    			       ."<br/><br/> Որին կարող եք ծանոթանալ հետևյալ հասցեով <a href=".'http://surbzoravor.am/'."/post/view/".$model->slug.">".'http://surbzoravor.am/'."/post/view".$model->slug."<a/>";
    				$subject = "New Post ";
    				$headers = "From:  Zoravor Surb Astvacacin Church <info@surbzoravor.am>". "\r\n" . 'content-type:text/html' . "\r\n";
    				$emails = Subscribe::model()->findAll();
    				foreach ($emails as $email){
    				    mail($email->email, $subject, $text,$headers);
    				}
				}
				
				
				$this->redirect(array('view','id'=>$model->id));
			}
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	/**
	* Updates a particular model.
	* If update is successful, the browser will be redirected to the 'view' page.
	* @param integer $id the ID of the model to be updated
	*/
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$rnd = rand(0,9999);
		$removeDate = date("Y-m",strtotime($model->created_date));
		if(isset($_POST['Post']))
		{
		  
			if ($_POST['Post']['created_date'] == NULL || empty($_POST['Post']['created_date'])){
				$date = date("Y-m-d");
				$_POST['Post']['created_date'] = $date;
			}else {
				$date = $_POST['Post']['created_date'];
			}
			$model->attributes=$_POST['Post'];
			
			if ($model->validate()){
				$uploadedFile=CUploadedFile::getInstance($model,'image');
				$removeImage = $model->image;
				
				if($uploadedFile instanceof CUploadedFile){
					$name = str_replace(' ', '-', $_POST['Post']['name']);
					$fileName = strtr($name,self::$translateString)."-{$rnd}".'.jpg';  // random number + file name
					$model->image = $fileName;
				}
			}
			$name = str_replace(' ', '-', trim($_POST['Post']['name'],' '));
			$model->slug = strtr($name,self::$translateString);
			$model->title = ucwords($_POST['Post']['name'].' | '.strtr(trim($_POST['Post']['name'],''),self::$translateString));
			$result = app()->db->createCommand()
                			->select('id')
                			->from('post')
                			->where('slug=:slug',array(':slug'=>$model->slug))
                			->queryAll();
			if (count($result)>1){
			    $model->slug .= rand(1,100000);
			}
			if($model->save()){
				if($uploadedFile instanceof CUploadedFile && $removeImage && $removeImage != ''){
					@unlink(FRONTEND_DIR.DS."images".DS."post".DS.$removeDate.DS.'inq_'.$removeImage);
					@unlink(FRONTEND_DIR.DS."images".DS."post".DS.$removeDate.DS.$removeImage);
					@unlink(FRONTEND_DIR.DS."images".DS."post".DS.$removeDate.DS.'sm_'.$removeImage);
					@unlink(FRONTEND_DIR.DS."images".DS."post".DS.$removeDate.DS.'og_'.$removeImage);
					@unlink(FRONTEND_DIR.DS."images".DS."post".DS.$removeDate.DS.'st_'.$removeImage);
					@unlink(FRONTEND_DIR.DS."images".DS."post".DS.$removeDate.DS.'slider_'.$removeImage);
					
				}
				if($uploadedFile instanceof CUploadedFile){
					if (!file_exists(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)))) {
						mkdir(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)), 0755, true);
					}
					$uploadedFile->saveAs(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.'inq_'.$fileName);
					$image = new EasyImage(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.'inq_'.$fileName);
					$image->resize(NULL,app()->params['imageSizes']['og']);
					$image->save(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.'og_'.$fileName);
					$image = new EasyImage(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.'inq_'.$fileName);
					$image->resize(300);
					$image->save(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.$fileName);
					$image = new EasyImage(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.'inq_'.$fileName);
					$image->resize(app()->params['imageSizes']['sm']);
					$image->save(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.'sm_'.$fileName);
					$image = new EasyImage(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.'inq_'.$fileName);
					$image->resize(app()->params['imageSizes']['st']);
					$image->save(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.'st_'.$fileName);
					$image = new EasyImage(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.'inq_'.$fileName);
					$image->resize(app()->params['imageSizes']['slider']);
					$image->save(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.'slider_'.$fileName);
				}elseif ( $removeImage && $removeImage != ''){
				    if (!file_exists(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)))) {
				        mkdir(FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)), 0755, true);
				    }
				    rename(
				        FRONTEND_DIR.DS."images".DS."post".DS.$removeDate.DS.'inq_'.$removeImage,
				        FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.'inq_'.$removeImage
				    );
				    rename(
				        FRONTEND_DIR.DS."images".DS."post".DS.$removeDate.DS.$removeImage,
				        FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.$removeImage
				    );
				    rename(
				        FRONTEND_DIR.DS."images".DS."post".DS.$removeDate.DS.'sm_'.$removeImage,
				        FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.'sm_'.$removeImage
				    );
				    rename(
				        FRONTEND_DIR.DS."images".DS."post".DS.$removeDate.DS.'og_'.$removeImage,
				        FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.'og_'.$removeImage
				    );
				    rename(
				        FRONTEND_DIR.DS."images".DS."post".DS.$removeDate.DS.'st_'.$removeImage,
				        FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.'st_'.$removeImage
				    );
				    rename(
				        FRONTEND_DIR.DS."images".DS."post".DS.$removeDate.DS.'slider_'.$removeImage,
				        FRONTEND_DIR.DS."images".DS."post".DS.date("Y-m",strtotime($date)).DS.'slider_'.$removeImage
				    );
				    
				}
				$this->redirect(array('view','id'=>$model->id));
			}
		}
		
		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	/**
	* Deletes a particular model.
	* If deletion is successful, the browser will be redirected to the 'admin' page.
	* @param integer $id the ID of the model to be deleted
	*/
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			
			
			$model = $this->loadModel($id);
			if ($model->image != null && $model->image != '' ){
				$removeDate = date("Y-m",strtotime($model->created_date));
				@unlink(FRONTEND_DIR.DS."images".DS."post".DS.$removeDate.DS.'inq_'.$model->image);
				@unlink(FRONTEND_DIR.DS."images".DS."post".DS.$removeDate.DS.$model->image);
				@unlink(FRONTEND_DIR.DS."images".DS."post".DS.$removeDate.DS.'sm_'.$model->image);
				@unlink(FRONTEND_DIR.DS."images".DS."post".DS.$removeDate.DS.'og_'.$model->image);
				@unlink(FRONTEND_DIR.DS."images".DS."post".DS.$removeDate.DS.'st_'.$model->image);
				@unlink(FRONTEND_DIR.DS."images".DS."post".DS.$removeDate.DS.'slider_'.$model->image);
			}
			$model->delete();
			General::model()->deleteAll('post_id = '.$id);
			if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
		throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
	/**
	* Lists all models.
	*/
	public function actionIndex()
	{
	$dataProvider=new CActiveDataProvider('Post');
	$this->render('index',array(
	'dataProvider'=>$dataProvider,
	));
	}
	
	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
	$model=new Post('search');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['Post']))
	$model->attributes=$_GET['Post'];
	$this->render('admin',array(
	'model'=>$model,
	));
	}
	
	/**
	* Returns the data model based on the primary key given in the GET variable.
	* If the data model is not found, an HTTP exception will be raised.
	* @param integer the ID of the model to be loaded
	*/
	public function loadModel($id)
	{
	$model=Post::model()->findByPk($id);
	if($model===null)
	throw new CHttpException(404,'The requested page does not exist.');
	return $model;
	}
	
	/**
	* Performs the AJAX validation.
	* @param CModel the model to be validated
	*/
	protected function performAjaxValidation($model)
	{
	if(isset($_POST['ajax']) && $_POST['ajax']==='post-form')
	{
	echo CActiveForm::validate($model);
	Yii::app()->end();
	}
	}
	public function actionFacebook(){
	    $facebookMessage = "Սիրելի քույրեր և եղբայրներ ի Քրիստոս,

Այսօրվա Ավետարանական ընթերցումը Մարկոսի Ավետարանի 11-րդ գլխի 27-33 համարներն է, որտեղ խոսվում է մեր Տեր Հիսուս Քրիստոսի իշխանության մասին: Բայց մինչ քարոզին անցնելը ուզում եմ ավելի լավ այն հասկանալու համար մեկ անգամ ևս ձեզ համար ընթերցել տվյալ հատվածը:

«Դարձյալ Երուսաղեմ եկան. և մինչ նա այնտեղ, տաճարում շրջում էր, նրա մոտ եկան քահանայապետները, օրենսգետները և ծերերը ու ասացին նրան.«Ի՞նչիշխանությամբ ես դու այդ անում, և ո՞վ տվեց քեզ այդ իշխանությունը»: Հիսուս պատասխան տվեց և ասաց նրանց.«Ես էլ ձե՛զ մի բան հարցնեմ, պատասխանեցե՛ք ինձ, և ես ձեզ կասեմ, թե ինչ իշխանությամբ եմ այս անում: ";
	    $fb = Yii::app()->facebookSDK;
	    $token = $fb->getAccessToken();
	    $pageID ='surbzoravor';
	 
	    $fb->setAccessToken($token);
	   
	$fbUser=$fb->getUser();
	$pageInfo = $fb->api("/{$pageID}?fields=access_token");
	//var_dump($pageInfo);die;

	    $PostData = array(
	        'message' =>$facebookMessage,
	        'name' => 'Հիսուս Քրիստոսի իշխանության մասին',
	        'access_token'=>  $fb->getAccessToken(),
	         'link' => 'http://surbzoravor.am/post/view/hisus-qristosi-ishkhanutyan-masin',
	        'description' => $facebookMessage,
	        ' picture' => "http://surbzoravor.am/images/post/2014-10/hisus-qristosi-ishkhanutyan-masin-7889.jpg",
	       
	        'actions' => array(
	            array(
	                'name' => 'Հիսուս Քրիստոսի իշխանության մասին',
	                'link' => 'http://surbzoravor.am/post/view/hisus-qristosi-ishkhanutyan-masin',
	               
	            )
	        )
	    );
	    $post_url = '/surbzoravor/feed';
	
	  
	    try {
	        $result = $fb->api($post_url, 'POST', $PostData);
	        echo "<pre>";
	      //  print_r($fb->api($post_url, 'post', $PostData));die;
	        //$result = $facebook->api('me/feed','post', $PostData);
	        if($result)
	        {
	            // session_destroy();
	            echo 'Done..';
	          //  die("<meta http-equiv=\"refresh\" content=\"2;URL=".$redirectUrl."?  success=1&fbp=".$facebookPageID."\" />");
	        }
	    }
	    catch (Exception $e)
	    {
	     echo 'aaa';
	     var_dump($e);
	}
	}
	
	public function actionUpdatePost(){
	   /*$models = Post::model()->findALL();
	    foreach ($models as $model){
	        $arry = explode('|', $model->title);
	        $model->title = $arry[1].'|'.$arry[0];
	        var_dump($model->save());
	    }*/
	}
}
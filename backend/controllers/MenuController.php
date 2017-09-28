<?php

class MenuController extends BackendController
{
	/**
	* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	* using two-column layout. See 'protected/views/layouts/column2.php'.
	*/
	public $layout='//layouts/column2';
	
	/**
	* @return array action filters
	*/
	public function filters()
	{
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
			'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>Menu::model()->with('menu')->findByPk($id),
		));
	}
	
	/**
	* Creates a new model.
	* If creation is successful, the browser will be redirected to the 'view' page.
	*/
	public function actionCreate()
	{
		$model=new Menu;
		$rnd = rand(0,9999);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Menu']))
		{
			$model->attributes=$_POST['Menu'];
			$uploadedFile=CUploadedFile::getInstance($model,'image');
			$model->image =  CUploadedFile::getInstance($model,'image');
			$name = str_replace(' ', '-', trim($_POST['Menu']['name'],' '));
			$model->slug = strtr($name,self::$translateString);
			$result = app()->db->createCommand()
    			->select('id')
    			->from('menu')
    			->where('slug=:slug',array(':slug'=>$model->slug))
    			->queryAll();
			if (isset($result[0]['id'])){
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
					if (!file_exists(FRONTEND_DIR.DS."images".DS."Menu".DS.date("Y-m",strtotime($model->created_date)))) {
						mkdir(FRONTEND_DIR.DS."images".DS."Menu".DS.date("Y-m",strtotime($model->created_date)), 0755, true);
					}
					$uploadedFile->saveAs(FRONTEND_DIR.DS."images".DS."menu".DS.date("Y-m",strtotime($model->created_date)).DS.'inq_'.$fileName);
					$image = new EasyImage(FRONTEND_DIR.DS."images".DS."menu".DS.date("Y-m",strtotime($model->created_date)).DS.'inq_'.$fileName);
					$image->resize(NULL,app()->params['imageSizes']['og']);
					$image->save(FRONTEND_DIR.DS."images".DS."Menu".DS.date("Y-m",strtotime($model->created_date)).DS.'og_'.$fileName);
					$image = new EasyImage(FRONTEND_DIR.DS."images".DS."menu".DS.date("Y-m",strtotime($model->created_date)).DS.'inq_'.$fileName);
					$image->resize(250);
					$image->save(FRONTEND_DIR.DS."images".DS."menu".DS.date("Y-m",strtotime($model->created_date)).DS.$fileName);
					$image = new EasyImage(FRONTEND_DIR.DS."images".DS."menu".DS.date("Y-m",strtotime($model->created_date)).DS.'inq_'.$fileName);
					$image->resize(app()->params['imageSizes']['sm']);
					$image->save(FRONTEND_DIR.DS."images".DS."menu".DS.date("Y-m",strtotime($model->created_date)).DS.'sm_'.$fileName);
					$image = new EasyImage(FRONTEND_DIR.DS."images".DS."menu".DS.date("Y-m",strtotime($model->created_date)).DS.'inq_'.$fileName);
					$image->resize(app()->params['imageSizes']['st']);
					$image->save(FRONTEND_DIR.DS."images".DS."menu".DS.date("Y-m",strtotime($model->created_date)).DS.'st_'.$fileName);
				
				}
			}
			$this->redirect(array('view','id'=>$model->id));
			
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
	public function actionUpdate($id){
		$model=$this->loadModel($id);
		$rnd = rand(0,9999);
		if(isset($_POST['Menu']))
		{
			$model->attributes=$_POST['Menu'];
			$name = str_replace(' ', '-',trim($_POST['Menu']['name'],' '));
			$model->slug = strtr($name,self::$translateString);
			if ($model->validate()){
				$uploadedFile=CUploadedFile::getInstance($model,'image');
				$removeImage = $model->image;
				$removeDate = date("Y-m",strtotime($model->created_date));
				if($uploadedFile instanceof CUploadedFile){
					$name = str_replace(' ', '-', $_POST['Menu']['name']);
					$fileName = strtr($name,self::$translateString)."-{$rnd}".'.jpg';  // random number + file name
					$model->image = $fileName;
				}
			}
			if($model->save()){
				if($uploadedFile instanceof CUploadedFile && $removeImage && $removeImage != ''){
					@unlink(FRONTEND_DIR.DS."images".DS."menu".DS.$removeDate.DS.'inq_'.$removeImage);
					@unlink(FRONTEND_DIR.DS."images".DS."menu".DS.$removeDate.DS.$removeImage);
					@unlink(FRONTEND_DIR.DS."images".DS."menu".DS.$removeDate.DS.'sm_'.$removeImage);
					@unlink(FRONTEND_DIR.DS."images".DS."menu".DS.$removeDate.DS.'og_'.$removeImage);
					@unlink(FRONTEND_DIR.DS."images".DS."menu".DS.$removeDate.DS.'st_'.$removeImage);
				}
				if($uploadedFile instanceof CUploadedFile){
					if (!file_exists(FRONTEND_DIR.DS."images".DS."menu".DS.date("Y-m",strtotime($model->created_date)))) {
						mkdir(FRONTEND_DIR.DS."images".DS."menu".DS.date("Y-m",strtotime($model->created_date)), 0755, true);
					}
					$uploadedFile->saveAs(FRONTEND_DIR.DS."images".DS."menu".DS.date("Y-m",strtotime($model->created_date)).DS.'inq_'.$fileName);
					$image = new EasyImage(FRONTEND_DIR.DS."images".DS."menu".DS.date("Y-m",strtotime($model->created_date)).DS.'inq_'.$fileName);
					$image->resize(NULL,app()->params['imageSizes']['og']);
					$image->save(FRONTEND_DIR.DS."images".DS."menu".DS.date("Y-m",strtotime($model->created_date)).DS.'og_'.$fileName);
					$image = new EasyImage(FRONTEND_DIR.DS."images".DS."menu".DS.date("Y-m",strtotime($model->created_date)).DS.'inq_'.$fileName);
					$image->resize(250);
					$image->save(FRONTEND_DIR.DS."images".DS."menu".DS.date("Y-m",strtotime($model->created_date)).DS.$fileName);
					$image = new EasyImage(FRONTEND_DIR.DS."images".DS."menu".DS.date("Y-m",strtotime($model->created_date)).DS.'inq_'.$fileName);
					$image->resize(app()->params['imageSizes']['sm']);
					$image->save(FRONTEND_DIR.DS."images".DS."menu".DS.date("Y-m",strtotime($model->created_date)).DS.'sm_'.$fileName);
					$image = new EasyImage(FRONTEND_DIR.DS."images".DS."menu".DS.date("Y-m",strtotime($model->created_date)).DS.'inq_'.$fileName);
					$image->resize(app()->params['imageSizes']['st']);
					$image->save(FRONTEND_DIR.DS."images".DS."menu".DS.date("Y-m",strtotime($model->created_date)).DS.'st_'.$fileName);
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
		// we only allow deletion via POST request
		$model = $this->loadModel($id);
		if ($model->image != null && $model->image != '' ){
			$removeDate = date("Y-m",strtotime($model->created_date));
			@unlink(FRONTEND_DIR.DS."images".DS."menu".DS.$removeDate.DS.'inq_'.$model->image);
			@unlink(FRONTEND_DIR.DS."images".DS."menu".DS.$removeDate.DS.$model->image);
			@unlink(FRONTEND_DIR.DS."images".DS."menu".DS.$removeDate.DS.'sm_'.$model->image);
			@unlink(FRONTEND_DIR.DS."images".DS."menu".DS.$removeDate.DS.'og_'.$model->image);
			@unlink(FRONTEND_DIR.DS."images".DS."menu".DS.$removeDate.DS.'st_'.$model->image);
		}	
		$model->delete();
	
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
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
	    $this->actionAdmin();
	$dataProvider=new CActiveDataProvider('Menu');
	$this->render('index',array(
	'dataProvider'=>$dataProvider,
	));
	}
	
	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
		$model=new Menu('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Menu']))
			$model->attributes=$_GET['Menu'];
		
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
	$model=Menu::model()->findByPk($id);
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
	if(isset($_POST['ajax']) && $_POST['ajax']==='menu-form')
	{
	echo CActiveForm::validate($model);
	Yii::app()->end();
	}
	}
}

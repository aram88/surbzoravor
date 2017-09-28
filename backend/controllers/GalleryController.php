<?php

class GalleryController extends BackendController
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
		$model =$this->loadModel($id);
		$model->image= $model->getImage();
		$this->render('view',array(
			'model'=>$model,
			
		));
	}
	
	/**
	* Creates a new model.
	* If creation is successful, the browser will be redirected to the 'view' page.
	*/
	public function actionCreate()
	{
		$rnd = rand(0,9999);
		$model=new Gallery('create');
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Gallery']))
		{
			
			$model->attributes=$_POST['Gallery'];
			$uploadedFile=CUploadedFile::getInstance($model,'image');
			$model->image =  CUploadedFile::getInstance($model,'image');
			if ($model->validate()){
				if($uploadedFile instanceof CUploadedFile){
					$name = str_replace(' ', '-', $_POST['Gallery']['name']);
					$fileName = strtr($name,self::$translateString)."-{$rnd}".'.jpg';  // random number + file name
					$model->image = $fileName;
				}
			}
		
			if($model->save()){
				if (!file_exists(FRONTEND_DIR.DS."images".DS."gallery".DS.date("Y-m"))) {
					mkdir(FRONTEND_DIR.DS."images".DS."gallery".DS.date("Y-m"), 0755, true);
				}
				$uploadedFile->saveAs(FRONTEND_DIR.DS."images".DS."gallery".DS.date("Y-m").DS.'inq_'.$fileName);
				$image = new EasyImage(FRONTEND_DIR.DS."images".DS."gallery".DS.date("Y-m").DS.'inq_'.$fileName);
				$image->resize(NULL,app()->params['imageSizes']['og']);
				$image->save(FRONTEND_DIR.DS."images".DS."gallery".DS.date("Y-m").DS.'og_'.$fileName);
				$image = new EasyImage(FRONTEND_DIR.DS."images".DS."gallery".DS.date("Y-m").DS.'inq_'.$fileName);
				$image->resize(250);
				$image->save(FRONTEND_DIR.DS."images".DS."gallery".DS.date("Y-m").DS.$fileName);
				$image = new EasyImage(FRONTEND_DIR.DS."images".DS."gallery".DS.date("Y-m").DS.'inq_'.$fileName);
				$image->resize(app()->params['imageSizes']['sm']);
				$image->save(FRONTEND_DIR.DS."images".DS."gallery".DS.date("Y-m").DS.'sm_'.$fileName);
				
				$this->redirect(array('view','id'=>$model->id));
			}
		}
		$galleryList = GalleryGroup::model()->getGalleryGroupList();
		$this->render('create',array(
			'model'=>$model,'galleryList'=>$galleryList
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
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Gallery']))
		{
			$model->attributes=$_POST['Gallery'];
			if ($model->validate()){
				$uploadedFile=CUploadedFile::getInstance($model,'image');
				$removeImage = $model->image;
				$removeDate = date("Y-m",strtotime($model->created_date)); 
				if($uploadedFile instanceof CUploadedFile){
					$name = str_replace(' ', '-', $_POST['Gallery']['name']);
					$fileName = strtr($name,self::$translateString)."-{$rnd}".'.jpg';  // random number + file name
					$model->image = $fileName;
				}
			}
			if($model->save()){
				if($uploadedFile instanceof CUploadedFile){
					unlink(FRONTEND_DIR.DS."images".DS."gallery".DS.$removeDate.DS.'inq_'.$removeImage);
					unlink(FRONTEND_DIR.DS."images".DS."gallery".DS.$removeDate.DS.$removeImage);
					unlink(FRONTEND_DIR.DS."images".DS."gallery".DS.$removeDate.DS.'sm_'.$removeImage);
					unlink(FRONTEND_DIR.DS."images".DS."gallery".DS.$removeDate.DS.'og_'.$removeImage);
					if (!file_exists(FRONTEND_DIR.DS."images".DS."gallery".DS.date("Y-m"))) {
						mkdir(FRONTEND_DIR.DS."images".DS."gallery".DS.date("Y-m"), 0755, true);
					}
					$uploadedFile->saveAs(FRONTEND_DIR.DS."images".DS."gallery".DS.date("Y-m").DS.'inq_'.$fileName);
					$image = new EasyImage(FRONTEND_DIR.DS."images".DS."gallery".DS.date("Y-m").DS.'inq_'.$fileName);
					$image->resize(NULL,app()->params['imageSizes']['og']);
					$image->save(FRONTEND_DIR.DS."images".DS."gallery".DS.date("Y-m").DS.'og_'.$fileName);
					$image = new EasyImage(FRONTEND_DIR.DS."images".DS."gallery".DS.date("Y-m").DS.'inq_'.$fileName);
					$image->resize(250);
					$image->save(FRONTEND_DIR.DS."images".DS."gallery".DS.date("Y-m").DS.$fileName);
					$image = new EasyImage(FRONTEND_DIR.DS."images".DS."gallery".DS.date("Y-m").DS.'inq_'.$fileName);
					$image->resize(app()->params['imageSizes']['sm']);
					$image->save(FRONTEND_DIR.DS."images".DS."gallery".DS.date("Y-m").DS.'sm_'.$fileName);
				}
				$this->redirect(array('view','id'=>$model->id));
			}	
		}
			
		$galleryList = GalleryGroup::model()->getGalleryGroupList();
		$this->render('update',array(
			'model'=>$model,'galleryList'=>$galleryList
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
				$removeDate = date("Y-m",strtotime($model->created_date));
				unlink(FRONTEND_DIR.DS."images".DS."gallery".DS.$removeDate.DS.'inq_'.$model->image);
				unlink(FRONTEND_DIR.DS."images".DS."gallery".DS.$removeDate.DS.$model->image);
				unlink(FRONTEND_DIR.DS."images".DS."gallery".DS.$removeDate.DS.'sm_'.$model->image);
				unlink(FRONTEND_DIR.DS."images".DS."gallery".DS.$removeDate.DS.'og_'.$model->image);
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
		$dataProvider=new CActiveDataProvider('Gallery');
			$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
		$model=new Gallery('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Gallery']))
			$model->attributes=$_GET['Gallery'];
		
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
		$model=Gallery::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='Gallery-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

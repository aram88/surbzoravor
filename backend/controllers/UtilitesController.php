<?php

class UtilitesController extends BackendController {

    public function actionUpload() {

        Yii::import("common.extensions.EAjaxUpload.qqFileUploader");

        $folder = Yii::getPathOfAlias('root') . '/frontend/www/images/'; // folder for uploaded files
        $allowedExtensions = array("jpg", "jpeg", "gif", "png", "JPG", "JPEG", "GIF", "PNG"); //array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 10 * 1024 * 1024; // maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        $result['filename'] = Yii::app()->params['frontend.url'] . 'images/' . $result['filename'];
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);


        //$fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
        //$fileName=$result['filename'];//GETTING FILE NAME



        echo $return; // it's array
    }
    
    public function actionImage() {
    
    	Yii::import("common.extensions.EAjaxUpload.qqFileUploader");
    
    	$folder = Yii::getPathOfAlias('root') . '/frontend/www/images/'; // folder for uploaded files
    	$allowedExtensions = array("jpg", "jpeg", "gif", "png", "JPG", "JPEG", "GIF", "PNG"); //array("jpg","jpeg","gif","exe","mov" and etc...
    	$sizeLimit = 10 * 1024 * 1024; // maximum file size in bytes
    	$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
    	$result = $uploader->handleUpload($folder);
    	$result['filename'] =  'images/' . $result['filename'];
    	$return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
    
    
    	//$fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
    	//$fileName=$result['filename'];//GETTING FILE NAME
    
    
    
    	echo $return; // it's array
    }
    
    

    public function actionUploadpdf($id,$path='customer/') {
        Yii::import("common.extensions.EAjaxUpload.qqFileUploader");

        $folder = Yii::getPathOfAlias('root') . '/frontend/www/pdf/'.$path.'/'; // folder for uploaded files
        $allowedExtensions = array("pdf"); //array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 10 * 1024 * 1024; // maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        $result['filename'] = Yii::app()->params['frontend.url'] . 'pdf/'.$path. $result['filename'];
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
        echo $return; // it's array
    }
    public function actionPdf($id,$path='customer/') {
    	Yii::import("common.extensions.EAjaxUpload.qqFileUploader");
    
    	$folder = Yii::getPathOfAlias('root') . '/frontend/www/pdf/'.$path.'/'; // folder for uploaded files
    	$allowedExtensions = array("pdf"); //array("jpg","jpeg","gif","exe","mov" and etc...
    	$sizeLimit = 10 * 1024 * 1024; // maximum file size in bytes
    	$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
    	$result = $uploader->handleUpload($folder);
    	$result['filename'] =  'pdf/'.$path. $result['filename'];
    	$return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
    	echo $return; // it's array
    }
    public function actionUploadicon($id) {
        Yii::import("common.extensions.EAjaxUpload.qqFileUploader");
        
        $folder = Yii::getPathOfAlias('root') . '/frontend/www/icon/category/'; // folder for uploaded files
        $allowedExtensions = array("jpg", "jpeg", "gif", "png", "JPG", "JPEG", "GIF", "PNG"); //array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 10 * 1024 * 1024; // maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        $result['filename'] = Yii::app()->params['frontend.url'] . 'icon/category/' . $result['filename'];
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
        echo $return; // it's array
    }
    public function actionCropImg() {
        Yii::app()->clientScript->scriptMap = array(
            (YII_DEBUG ? 'jquery.js' : 'jquery.min.js') => false,);
        $imageUrl = Yii::app()->params['frontend.url'] . '/upload/' . $_GET['fileName'];
        $this->renderPartial('cropImg', array('imageUrl' => $imageUrl, 'model' => $_GET['model']), false, true);
    }

    public function actionSendPackageMail() {

        $result = app()->db->createCommand()->
                select('Entity.email,EntityTranslate.name')
                ->from('entity as Entity')
                ->join('entity_translate as EntityTranslate', 'EntityTranslate.entity_id =Entity.id
							 AND EntityTranslate.language_id="' . app()->params['default.language'] . '"')
                ->where('Entity.id=:id')
                ->bindParam(":id", $_POST['id'], PDO::PARAM_INT)
                ->queryAll();
        
        if (!isset($result['0'])) {
            throw new CHttpException(404, 'The user not found');
        }
        if ($this->_sendPackageInfoMail($result['0'])) {
            $model=Entity::model()->findByPk($_POST['id']);
            $model->send_mail=1;
            $model->send_mail_date=time();
            $model->save(false);
           
            echo TRUE;
        } else {
           
            echo FALSE;
        }
       
        app()->End();
    }

  private function _sendPackageInfoMail($user) {
  	Yii::import('common.extensions.phpmailer.JPhpMailer');
  	$from = Settings::model()->getFromMail();
  	$name = 'e-locate.org';
  	$mail = new JPhpMailer();
  	$mail->AddAddress($user['email']);
  	$mail->From         = $from;
  	$mail->FromName     = $name;
  	$mail->Subject      = 'e-locate Info';
  	$mail->ContentType = 'text/html';
  	$mail->Body         = app()->parse->parseMailPackageInfo($user['name']);
	$mail_attachment = FRONTEND_DIR.DS.Settings::model()->getInfoPDF();
  	$mail->AddAttachment($mail_attachment);
  	return $mail->Send();
   }
   
   public function actionUploadFile() {
       Yii::import("common.extensions.EAjaxUpload.qqFileUploader");
   
       $folder = Yii::getPathOfAlias('root') . '/frontend/www/media/'.date("Y").'/'; // folder for uploaded files
       if (!file_exists($folder)){
           mkdir($folder, 0755, true);
       }
       $allowedExtensions = array("pdf","jpg", "jpeg", "gif", "png", "JPG", "JPEG", "GIF", "PNG","doc","mp3"); //array("jpg","jpeg","gif","exe","mov" and etc...
       $sizeLimit = 50 * 1024 * 1024; // maximum file size in bytes
       $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
       $result = $uploader->handleUpload($folder);
       $result['filename'] = Yii::app()->params['frontend.url'] . 'media/'.date("Y").'/'.$result['filename'];
       $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
       echo $return; // it's array
       app()->end();
   }
}

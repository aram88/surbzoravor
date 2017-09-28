<?php
class AjaxController extends FrontendController{
	public function actionValidate($mod,$scenario=NULL){
		if (isset($_POST['ajax']))
		{
			$model = new $mod;
			$model->scenario = $scenario;
			echo CActiveForm::validate($model);
			app()->end();
				
		} else {
			throw new CHttpException(500, 'No valid validation combination used');
		}
	}
}
?>
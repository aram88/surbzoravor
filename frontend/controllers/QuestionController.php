<?php
class QuestionController extends  FrontendController{
    
    public  function actionIndex(){
        $criterina =  new CDbCriteria();
        $criterina->with = array('questions'=>array('on'=>'publish = 0','joinType'=>'LEFT JOIN'));
        $criterina->order = 't.position ASC';
        $questions  = Qgroup::model()->findAll($criterina);
        
        $this->pageTitle = "Harc Qahanajin | Հարց քահանային";
        $model = new Question();
        if (isset($_POST['Question'])){
            $model->attributes = $_POST['Question'];
            if ($model->save()){
                Yii::app()->user->setFlash('success', "Շնորհակալություն ձեր հարցի համար մենք շուտով ձեզ կպատասխանենք");
                $this->redirect('/');
            }else{
                debug($model->errors);
            }
        }
        $this->render('index',array('model'=>$model,'questions'=>$questions));
    }
    public function actionView($id){
        $question  = Question::model()->findByPk($id);
        $this->pageTitle = $question->text;
        if (!$question){
            $this->redirect('/');
        }
        $this->render('view',array('question'=>$question));
    }
    
}
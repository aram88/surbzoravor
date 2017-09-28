<?php
class DCForm extends CWidget{
    public function run (){
        $model = new MessageModel();
        
        if (isset($_POST['MessageModel'])){
            $model->attributes = $_POST['MessageModel'];
            if ($model->validate()){
                $to = "daycenter.am@gmail.com";
        
                $subject = $_POST['MessageModel']['subject'];
                $txt = $_POST['MessageModel']['text'];
                $headers = "From: {$_POST['MessageModel']['mail']} ";
                if (mail($to,$subject,$txt,$headers)) {
                    Yii::app()->user->setFlash('success', "Շնորհակալություն ձեր նամակի համար։ Մենք շուտով ձեզ կպատասխանենք։");;
                    $this->controller->redirect('/');
                } else {
                    Yii::app()->user->setFlash('success', "Չհաջողվեց ուղարկել նամակը խնդրում ենք նորց փորձեք");
                }
            }
        }
        $this->render('index',array('model'=>$model));
    }
}
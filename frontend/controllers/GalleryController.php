<?php
class GalleryController extends FrontendController{
    public function  actionIndex(){
        $this->pageTitle = "Նկարներ";
        $galleries =  new CActiveDataProvider('GalleryGroup',array(
            'criteria'=> array(
                'order'=>'created_date DESC',
            ),
            'pagination'=>array(
                'pageSize'=>15,
            ),
        ));
        $this->render('index',array('galleries'=>$galleries));
        
    }
    public function actionView($id){
        $galleries =  Gallery::model()->getGaleriesByGroupId($id);
        $this->layout = 'main2';
        $this->render('view',array('galleries'=>$galleries));
    }
}
<?php
class PostController extends FrontendController{
    public function actionView ($slug){
        $result =  Post::model()->getPostBySlug($slug);
        if (count($result) ==0){
            throw new CHttpException(403,'Մուտքագրված հասցեն գոյություն չունի');
        }
        $this->pageTitle = $result[0]['title'];
        $this->render('view',array('post'=>$result[0]));
    }
}
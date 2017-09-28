<?php
class MenuController extends FrontendController{
      public function actionView ($slug){
          $criteria =  new CDbCriteria();
          $criteria->with = 'menus';
          $criteria->condition = 't.slug =:slug';
          $criteria->params =  array(':slug'=>$slug);
          $menu = Menu::model()->find($criteria);
          if (!$menu){
              $this->redirect('/');
          }
          $dataProvider  = new CActiveDataProvider('Post',array(
              'criteria'=> array(
                  'condition' =>'menu_id=:menuId',
                  'order'=>($menu->id==25)?'name ASC':'created_date DESC, id DESC',
                  'params'=>array(':menuId'=>$menu->id)
              
              ),
              'pagination'=>array(
                  'pageSize'=>($menu->id==25)?40:15,
              ),
          ));

          $this->pageTitle = $menu->name;
          if ($menu->id == 6){
              $this->render('dc',array('dataProvider'=>$dataProvider,'menu'=>$menu));
          }else {
             $this->render('view',array('dataProvider'=>$dataProvider,'menu'=>$menu));
          }
      }
      public function actionOwn($slug){
          $criteria =  new CDbCriteria();
          $criteria->with = 'menus';
          $criteria->condition = 't.slug =:slug';
          $criteria->params =  array(':slug'=>$slug);
          $menu = Menu::model()->find($criteria);
          if (!$menu){
              $this->redirect('/');
          }
          $this->pageTitle = $menu->name;
          $this->render('own',array('menu'=>$menu));
          
      }
}
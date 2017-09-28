<?php
/**
 * Most basic landing page rendering action possible.
 *
 * @package YiiBoilerplate\Frontend\Actions
 */
class LandingPageAction extends CAction
{
    /**
     * What to do when this action will be called.
     *
     * Just render the `index` view file from current controller.
     */
    public function run()
    {
        
    	$dataProvider=new CActiveDataProvider('Post',array(
	    		'criteria'=> array(
	    			'condition' =>'home_page =1 AND visible =1',
	    		    'order'=>'created_date DESC',
	    				
	    		),
    			'pagination'=>array(
    					'pageSize'=>15,
    			),
    	));
        $this->controller->render('index',array('posts'=>$dataProvider));
    }
} 
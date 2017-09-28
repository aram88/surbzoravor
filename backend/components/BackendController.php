<?php
/**
 * Base class for the controllers in backend entry point of application.
 *
 * In here we have the behavior common to all backend routes, such as registering assets required for UI
 * and enforcing access control policy.
 *
 * @package YiiBoilerplate\Backend
 */
abstract class BackendController extends CController
{
	public static  $translateString = array(
			'ք'=>'q','ո'=>'o','ե'=>'e','ռ'=>'r','տ'=>'t','ը'=>'y',
			'ու'=>'u','ի'=>'i','օ'=>'o','պ'=>'p','խ'=>'kh','ծ'=>'ts',
			'շ'=>'sh','ա'=>'a','ս'=>'s','դ'=>'d','ֆ'=>'f','գ'=>'g',
			'հ'=>'h','յ'=>'y','կ'=>'k','լ'=>'l','զ'=>'z','ղ'=>'gh',
			'ց'=>'c','վ'=>'v','բ'=>'b','ն'=>'n','մ'=>'m','է'=>'e',
			'թ'=>'t','փ'=>'p','ձ'=>'dz','ջ'=>'j','և'=>'ev','ր'=>'r',
			'չ'=>'ch','ճ'=>'ch','ւ'=>'','Ւ'=>'i','ժ' =>'j','Ժ'=>'j', 
			'Ք'=>'q','Ո'=>'o','Ե'=>'e','Ռ'=>'r','Տ'=>'t','Ը'=>'y',
			'ՈՒ'=>'u','Ի'=>'i','Օ'=>'o','Պ'=>'p','Խ'=>'kh','Ծ'=>'ts',
			'Շ'=>'sh','Ա'=>'a','Ս'=>'s','Դ'=>'d','Ֆ'=>'f','Գ'=>'g',
			'Հ'=>'h','Յ'=>'y','Կ'=>'k','Լ'=>'l','Զ'=>'z','Ղ'=>'gh',
			'Ց'=>'c','Վ'=>'v','Բ'=>'b','Ն'=>'n','Մ'=>'m','Է'=>'e',
			'Թ'=>'t','Փ'=>'p','Ձ'=>'dz','Ջ'=>'j','ԵՎ'=>'ev','Ր'=>'r',
			'Չ'=>'ch','Ճ'=>'ch','
			'=>'j',','=>'','՛'=>'','՜ '=>'','՝'=>'','՞'=>'',
			'я'=>'ya','ш'=>'sh','е'=>'e','р'=>'r','т'=>'t','ы'=>'i','у'=>'u',
			'и'=>'i','о'=>'o','п'=>'p','ю'=>'u','щ'=>'sch','э'=>'e','а'=>'a',
			'с'=>'c','д'=>'d','ф'=>'f','г'=>'g','ч'=>'ch','й'=>'ih','к'=>'c',
			'л'=>'l','ь'=>'','ж'=>'j','з'=>'z','х'=>'x','ц'=>'c','в'=>'v','б'=>'b',
			'н'=>'n','м'=>'m','ё'=>'ъ','՝'=>'','«'=>'','»'=>'','.'=>'','...'=>'', ')'=>'', ')'=>'', ':'=>''
	);
	/** @var array This will be pasted into breadcrumbs widget in layout */
	public $breadcrumbs = array();

	/** @var array This will be pasted into menu widget in sidebar portlet in two-column layout */
	public $menu = array();

    /**
     * Additional behavior associated with different routes in the controller.
     *
     * This is base class for all backend controllers, so we apply CAccessControlFilter
     * and on all actions except `actionDelete` we make the YiiBooster library to be available.
     *
     * @see http://www.yiiframework.com/doc/api/1.1/CController#filters-detail
     * @see http://www.yiiframework.com/doc/api/1.1/CAccesControlFilter
     * @see http://yii-booster.clevertech.biz/getting-started.html#initialization
     *
     * @return array
     */
    public function filters()
    {
        return array(
            'accessControl',
            array('bootstrap.filters.BootstrapFilter - delete'),
        );
    }

    /**
     * Rules for CAccessControlFilter.
     *
     * We allow all actions to logged in users and disable everything for others.
     *
     * @see http://www.yiiframework.com/doc/api/1.1/CController#accessRules-detail
     *
     * @return array
     */
    public function accessRules()
    {
        return [
            ['allow', 'users' => ['@'] ],
			['deny'],
		];
    }

    /**
     * Before rendering anything we register all of CSS and JS assets we require for backend UI.
     *
     * @see CController::beforeRender()
     *
     * @param string $view
     * @return bool
     */
    protected function beforeRender($view)
    {
        $result = parent::beforeRender($view);
        $this->registerAssets();
        return $result;
    }

    private function registerAssets()
    {
        $publisher = Yii::app()->assetManager;
        $libraries = $publisher->publish(ROOT_DIR.'/common/packages');

        // NOTE that due to limitations of CClientScript.registerPackage
        // we cannot specify the javascript files to be registered before closing </body> tag.
        // So our only option until Yii 2 is to open up the package and manually register everything in it.

        $registry = Yii::app()->clientScript;
        $registry
            ->registerCssFile("{$libraries}/html5boilerplate/normalize.css")
            ->registerCssFile("{$libraries}/html5boilerplate/main.css")
            // See the Modernizr library documentation about the description of why we have to put it into HEAD tag and not before end of BODY, as everything else.
            ->registerScriptFile("{$libraries}/modernizrjs/modernizr-2.6.2.min.js", CClientScript::POS_HEAD)
            ->registerScriptFile("{$libraries}/html5boilerplate/plugins.js", CClientScript::POS_END)
            ->registerScriptFile("{$libraries}/underscorejs/underscore-min.js", CClientScript::POS_END)
            ->registerScriptFile("{$libraries}/backbonejs/backbone-min.js", CClientScript::POS_END);

        $backend = $publisher->publish(ROOT_DIR.'/backend/packages');
        $registry
            ->registerCssFile("{$backend}/main-ui/main.css")
            ->registerScriptFile("{$backend}/main-ui/main.js", CClientScript::POS_END);
    }
}

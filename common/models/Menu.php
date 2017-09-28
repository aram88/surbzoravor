<?php

/**
 * This is the model class for table "menu".
 *
 * The followings are the available columns in table 'menu':
 * @property integer $id
 * @property string $name
 * @property integer $sub_show
 * @property string $text
 * @property string $image
 * @property integer $visible
 * @property string $created_date
 * @property string $modified_date
 * @property integer $position
 * @property integer $menu_id
 * @property integer $location
 * @property string $image_name
 * @property integer $main_show
 * @property string $icon
 * @property string $slug
 * @property integer $read
 *
 * The followings are the available model relations:
 * @property Menu $menu
 * @property Menu[] $menus
 * @property Post[] $posts
 */
class Menu extends CActiveRecord
{    
	public $locationData = array(0=>'Վերև',1=>'Ներքև',2=>'Ձախ',3=>'Աջ');
    public  $shortText;
	const  TOP = 0;
	const BOTTOM = 1;
	const LEFT = 2;
	const  RIGHT = 3;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('read,sub_show, visible, position, menu_id, location, main_show', 'numerical', 'integerOnly'=>true),
			array('name, text, image, created_date, modified_date, image_name, icon,read', 'safe'),
			array('image', 'file','types'=>'jpg, gif, png,jpeg,JPG,JPEG,PNG,GIF', 'allowEmpty'=>true,  'message'=>'Սա նկար չէ' ),
			array('name','required','message'=>'{attribute} պարտադիր է'),	
		    array('slug','unique','message'=>'Խնդրում եմ փոխեք այս նյութի անունը։ Այս անունով նյութ գոյություն ունի '),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id,read,name, sub_show, text, image, visible, created_date, modified_date, position, menu_id, location, image_name, main_show', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'menu' => array(self::BELONGS_TO, 'Menu', 'menu_id'),
			'menus' => array(self::HAS_MANY, 'Menu', 'menu_id'),
			'posts' => array(self::HAS_MANY, 'Post', 'menu_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Անուն',
			'sub_show' => 'Սուբմենուն երևա',
			'text' => 'Տեքստ',
			'image' => 'Նկար',
			'visible' => 'Տեսանելիություն',
			'created_date' => 'Հրապարակման Ժամանակ',
			'modified_date' => 'Փոփոխման Ժամանակ',
			'position' => 'Դիրք',
			'menu_id' => 'Ծնող մենու',
			'location' => 'Տեղ',
			'image_name' => 'Նկարի անուն',
			'icon' => 'Իկոնա',
			'main_show' => 'Գլխավոր երևա',
		    'read'=>'Կարդալ ավելին'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('sub_show',$this->sub_show);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('visible',$this->visible);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('position',$this->position);
		$criteria->compare('menu_id',$this->menu_id);
		$criteria->compare('location',$this->location);
		$criteria->compare('image_name',$this->image_name,true);
		$criteria->compare('main_show',$this->main_show);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Menu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function getMenusList(){
		return CHtml::listData($this->findAll(), 'id', 'name');
	}
	public function behaviors(){
		return array(
				'CTimestampBehavior' => array(
						'class' => 'zii.behaviors.CTimestampBehavior',
						'createAttribute'=>'created_date',
						'updateAttribute'=>'modified_date',
						'enabled'=>true,
						'setUpdateOnCreate'=>true,
						'timestampExpression'=>"date('Y-m-d H:m:s')",
				)
		);
	}
	public function getImage($size=''){
	    $fileName = app()->params['frontend.url'].DS.'images'.DS.'menu'.
				DS.date("Y-m",strtotime($this->created_date)).DS.$size.$this->image;
	    if (file_exists($fileName)){
	       	return app()->params['frontend.url'].DS.'images'.DS.'menu'.
				DS.date("Y-m",strtotime($this->created_date)).DS.$size.$this->image;
	    }
	    return NULL;
	}
	public function getMenusByLocation ($location=NULL){
		return app()->db
			->createCommand() 
			->select('name,icon,slug,id')
			->from('menu')
			->where('location=:location AND visible =1',array(':location'=>$location))
			->order('position ASC')
			->queryAll();
	}
	public function beforeFind(){
	    if ($this->read){
	        if(@strpos($this->text,' ',800)){
	            $firts_point = strpos($this->text,' ',800);
	            $this->shortText=substr($this->text,0,$firts_point+1);
	        }
	    }
	    return parent::beforeFind();
	}
}

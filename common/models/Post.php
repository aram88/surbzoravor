<?php

/**
 * This is the model class for table "post".
 *
 * The followings are the available columns in table 'post':
 * @property integer $id
 * @property integer $menu_id
 * @property integer $stick
 * @property string $name
 * @property string $text
 * @property string $path
 * @property integer $visible
 * @property string $created_date
 * @property string $modified_date
 * @property integer $home_page
 * @property integer $type
 * @property string $image
 * @property string $image_name
 * @property integer $read_all
 * @property integer $read
 * @property string $slug
 * @property string $title
 * @property string $meta-key
 * 
 *
 * The followings are the available model relations:
 * @property General[] $generals
 * @property Menu $menu
 */
class Post extends CActiveRecord
{
    public $postType = array(0=>'Նյութ',1=>'Գիրք',2=>'Աուդիո');
    public $shortText ;
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('menu_id, stick, visible, home_page, type, read_all, read', 'numerical', 'integerOnly'=>true),
			array('name, text, path, created_date, modified_date, image, image_name,slug,title,meta-key', 'safe'),
			array('image', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true,  'message'=>'Սա նկար չէ' ),
			array('name','required','message'=>'{attribute} պարտադիր է '),
			array('slug','unique','message'=>'Խնդրում եմ փոխեք այս նյութի անունը։ Այս անունով նյութ գոյություն ունի ','on'=>'carete'),	
				
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, menu_id, stick, name, text, path, visible, created_date, modified_date, home_page, type, image, image_name, read_all, read', 'safe', 'on'=>'search'),
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
			'generals' => array(self::HAS_MANY, 'General', 'post_id'),
			'menu' => array(self::BELONGS_TO, 'Menu', 'menu_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'menu_id' => 'Ծնող մենյուն',
			'stick' => 'Ստիկ Նյութ',
			'name' => 'Անուն',
			'text' => 'Տեքստ',
			'path' => 'Ճանապարհը',
			'visible' => 'Տեսանելիություն',
			'created_date' => 'Հրապարակման Ժամանակ',
			'modified_date' => 'Modified Date',
			'home_page' => 'Գլխավոր Էջում',
			'type' => 'Տեսակը',
			'image' => 'Նկար',
			'image_name' => 'Նկարի անունը',
			'read_all' => 'Նյութը ամբողջություն',
			'read' => 'Կառդալ Ավելին',
			'meta-key'=>'Բառեր'	
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
		$criteria->compare('menu_id',$this->menu_id);
		$criteria->compare('stick',$this->stick);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('path',$this->path,true);
		$criteria->compare('visible',$this->visible);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('home_page',$this->home_page);
		$criteria->compare('type',$this->type);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('image_name',$this->image_name,true);
		$criteria->compare('read_all',$this->read_all);
		$criteria->compare('read',$this->read);

		$criteria->order = 'id DESC';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Post the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function getImage($size=''){
		return app()->params['frontend.url'].DS.'images'.DS.'post'.
				DS.date("Y-m",strtotime($this->created_date)).DS.$size.$this->image;
	}
    
	public function getPostBySlug ($slug){
	    return app()->db->createCommand()
	           ->select('*')
	           ->from('post')
	           ->limit(1)
	           ->where('slug =:slug',array(':slug'=>$slug))
	           ->queryAll();
	}
	public function getRandomPost($type){
	   if ($type ==0 ) {
           return app()->db->createCommand()
               ->select('name,id,image,created_date,slug,path')
               ->from('post')
               ->limit(10)
               ->where(" created_date > '2015-09-30' AND type = :type AND id >= FLOOR( RAND( ) * (
	    SELECT MAX( k.id) from post as k))", array(":type" => $type))->queryAll();
       }
        return app()->db->createCommand()
            ->select('name,id,image,created_date,slug,path')
            ->from('post')
            ->limit(10)
            ->where("type = :type AND id >= FLOOR( RAND( ) * (
	    SELECT MAX( k.id) from post as k))", array(":type" => $type))->queryAll();
	}
	public function getPostByDate($day, $month, $year){
	    $data =  $year.'-'.$month.'-'.$day;
	    $criteria =  new CDbCriteria();
	    $criteria->compare('created_date', $data);
	   return $this->findAll($criteria);
	}
	public function afterFind(){
	    $largText = strip_tags($this->text);
	    if ($this->image != NULL && !empty($this->image) ){
    	    if(@strpos($largText ,' ',800)){
    	        $firts_point = strpos($largText ,' ',800);
    	        $this->shortText=substr($largText,0,$firts_point+1);
    	    }
	    }else {
	        if(@strpos($largText,' ',300)){
	            $firts_point = strpos($largText,' ',300);
	            $this->shortText=substr($largText,0,$firts_point+1);
	        }
	        
	    }
	    if ($this->shortText ==''){
	        $this->shortText =$this->text;
	    }
	    return parent::afterFind();
	    
	}
}
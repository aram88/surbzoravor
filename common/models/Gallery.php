<?php

/**
 * This is the model class for table "gallerie".
 *
 * The followings are the available columns in table 'gallerie':
 * @property integer $id
 * @property integer $gallery_group_id
 * @property string $name
 * @property string $image
 * @property string $created_date
 * @property string $modified_date
 *
 * The followings are the available model relations:
 * @property GalleryGroup $galleryGroup
 */
class Gallery extends CActiveRecord
{
	public $nameGalleryGroup;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gallery';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gallery_group_id', 'required','on'=>'create'),
			array('gallery_group_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('name', 'required', 'message'=>'Անվան դաշտը պարտադիր է'),
			array('image', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true,  'message'=>'Սա նկար չէ' ),
			array('image', 'file','types'=>'jpg, gif, png','message'=>'Սա նկար չէ', 'on'=>'create'   ),
			array('image','required','on'=>'create','message'=>'Նկարը պարտադիր է',),
			array('image, created_date, nameGalleryGroup,  modified_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, gallery_group_id, name, image, nameGalleryGroup, created_date, modified_date', 'safe', 'on'=>'search'),
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
			'galleryGroup' => array(self::BELONGS_TO, 'GalleryGroup', 'gallery_group_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'gallery_group_id' => 'Նկարների խումբ',
			'nameGalleryGroup' => 'Նկարների խումբ',
			'name' => 'Անուն',
			'created_date' => 'Ստեղծվել է',
			'modified_date' => 'Փոփոխվել է',
			'image' => 'Նկար',
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
		//$criteria->with=array('galleryGroup'=>array('joinType'=>'INNER  JOIN'));
	   // $criteria->together = true;

		$criteria->compare('id',$this->id);
		$criteria->compare('gallery_group_id',$this->gallery_group_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);
	
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Gallerie the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
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
		
		return app()->params['frontend.url'].DS.'images'.DS.'gallery'.
				DS.date("Y-m",strtotime($this->created_date)).DS.$size.$this->image;
	}
	public function getGaleriesByGroupId($id){
	    return app()->db->createCommand()
	           ->select('name,image,created_date')
	           ->from('gallery')
	           ->where('gallery_group_id =:id',array('id'=>$id))
	           ->queryAll();
	    
	}
}

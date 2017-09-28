<?php

/**
 * This is the model class for table "gallery_group".
 *
 * The followings are the available columns in table 'gallery_group':
 * @property integer $id
 * @property string $name
 * @property string $created_date
 * @property string $modified_date
 * @property string $image
 *
 * The followings are the available model relations:
 * @property Gallerie[] $galleries
 */
class GalleryGroup extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gallery_group';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'length', 'max'=>255),
			array('name', 'required'),
			array('image', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'update'),
			array('image','required','on'=>'create'),	
			array('created_date, modified_date, image', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, created_date, modified_date, image', 'safe', 'on'=>'search'),
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
			'galleries' => array(self::HAS_MANY, 'Gallery', 'gallery_group_id'),
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('image',$this->image,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GalleryGroup the static model class
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
	public function getImage(){
		return app()->params['frontend.url'].DS.'images'.DS.'galleryGroup'.
				DS.date("Y-m",strtotime($this->created_date)).DS.$this->image;
	}
	public function getGalleryGroupList(){
		return CHtml::listData($this->findAll(), 'id', 'name');
	}
}

<?php

/**
 * This is the model class for table "reading".
 *
 * The followings are the available columns in table 'reading':
 * @property integer $id
 * @property integer $day_id
 * @property string $name
 * @property string $text
 * @property string $created_date
 * @property string $modified_date
 * @property integer $position
 *
 * The followings are the available model relations:
 * @property Day $day
 */
class Reading extends CActiveRecord
{
	
	public  $dayName;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reading';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('day_id,name,text,created_date', 'required', 'message'=>"{attribute} պարտադիր է"),
			array('day_id, position', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('text, created_date, modified_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, day_id, name, text, dayName, created_date, modified_date, position', 'safe', 'on'=>'search'),
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
			'day' => array(self::BELONGS_TO, 'Day', 'day_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'day_id' => 'Օրը',
			'dayName' => 'Օրը',
			'name' => 'Անունը',
			'text' => 'Տեքստը',
			'created_date' => 'Հրապարակման Ժամանակը',
			'position' => 'Դիրքը',
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
		$criteria->with = 'day';
		$criteria->compare('id',$this->id);
		$criteria->compare('day.name',$this->dayName,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('position',$this->position);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
				'sort' => array(
						'attributes' => array(
								'dayName' => array(
										'asc' => 'day.name ASC',
										'desc' => 'day.name DESC',
								), '*'
						),
				),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Reading the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function afterFind(){
		$this->created_date = date('Y-m-d',strtotime($this->created_date));
		return parent::afterFind();
	}
	public function getReadingById($id){
		return app()->db->createCommand()
				->select('*')
				->from('reading')
				->where('id =:id',array(':id'=>$id))
				->queryAll();
	}
	public function getReadingByParenId($id){
	    return app()->db->createCommand()
	    ->select('*')
	    ->from('reading')
	    ->where('day_id =:id',array(':id'=>$id))
	    ->queryAll();
	}
	
}

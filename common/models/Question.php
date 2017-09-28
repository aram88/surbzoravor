<?php

/**
 * This is the model class for table "question".
 *
 * The followings are the available columns in table 'question':
 * @property integer $id
 * @property integer $qgroup_id
 * @property string $first_name
 * @property string $subject
 * @property string $text
 * @property integer $publish
 * @property string $created_date
 * @property string $ans_text
 * @property string $mail
 * @property integer $position
 *
 * The followings are the available model relations:
 * @property Qgroup $qgroup
 */
class Question extends CActiveRecord
{
    public  $qgroupRel;
    public $publishName;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'question';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('qgroup_id, publish, position', 'numerical', 'integerOnly'=>true),
			array('first_name', 'length', 'max'=>200),
			array('mail', 'length', 'max'=>60),
		    array('mail,text,', 'required','message'=>'{attribute} պարտադիր է'),
		    array('ans_text,', 'required','message'=>'{attribute} պարտադիր է','on'=>'admin' ),
		    array('ans_text,', 'required','message'=>'{attribute} պարտադիր է','on'=>'create'),
		    array('mail','email','message'=>'Սա Էլեկտրոնային հասցե չէ'),
			array('subject, text, created_date, ans_text', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, qgroup_id, first_name, subject, text, publish, created_date, ans_text, mail, position', 'safe', 'on'=>'search'),
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
			'qgroup' => array(self::BELONGS_TO, 'Qgroup', 'qgroup_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'qgroup_id' => 'Հարցի Խումբը',
		    'qgroupRel' => 'Հարցի Խումբը',
			'first_name' => 'Անունը',
			'subject' => 'Subject',
			'text' => 'Հարցը',
			'publish' => 'Ես չեմ կամենում,որ իմ հարցը հրապարակվի',
			'created_date' => 'Ստեղծման Ժամանակը',
			'ans_text' => 'Պատասխանը',
			'mail' => 'էլեկտրոնային հասցեն ',
			'position' => 'Դիրքը',
		    'publishName'=>'հարցը չհրապարակվի'
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
		$criteria->with = 'qgroup';
		$criteria->order = 'ans_text ASC';

		$criteria->compare('id',$this->id);
		$criteria->compare('qgroup.name',$this->qgroupRel);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('publish',$this->publish);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('ans_text',$this->ans_text,true);
		$criteria->compare('mail',$this->mail,true);
		$criteria->compare('position',$this->position);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
				'sort' => array(
						'attributes' => array(
								'qgroupRel' => array(
										'asc' => 'qgroup.name ASC',
										'desc' => 'qgroup.name DESC',
								), '*'
						),
				),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Question the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

<?php

/**
 * This is the model class for table "tbl_file".
 *
 * The followings are the available columns in table 'tbl_file':
 * @property integer $id
 * @property integer $project_id
 * @property string $file_ba
 * @property string $file_ts
 * @property string $file_testscenario
 * @property string $file_brs
 * @property string $file_srs
 * @property string $file_mom
 *
 * The followings are the available model relations:
 * @property TblData $project
 */
class File extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_file';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	 
	public $file_test;
	public $ba;
	public $ts;
	public $brs;
	public $srs;
	public $mom;
	
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('file_ba, file_ts, file_testscenario, file_brs, file_srs, file_mom','required','on'=>'validate'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('id','unique','message'=>'This id already exists.','on'=>'create,update'),
			array('ba, ts, brs, srs, mom', 'file', 'types'=>'doc, docx', 'allowEmpty'=>true, 'safe'=>true),
			array('file_test', 'file', 'types'=>'xls, xlsx, doc, docx, zip, rar', 'allowEmpty'=>true, 'safe'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, file_ba, file_ts, file_testscenario, file_brs, file_srs, file_mom', 'safe', 'on'=>'search'),
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
			 'project' => array(self::BELONGS_TO, 'TblData', 'id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'file_ba' => 'File Ba',
			'file_ts' => 'File Ts',
			'file_testscenario' => 'File Testscenario',
			'file_brs' => 'File Brs',
			'file_srs' => 'File Srs',
			'file_mom' => 'File Mom',
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
		$criteria->compare('file_ba',$this->file_ba,true);
		$criteria->compare('file_ts',$this->file_ts,true);
		$criteria->compare('file_testscenario',$this->file_testscenario,true);
		$criteria->compare('file_brs',$this->file_brs,true);
		$criteria->compare('file_srs',$this->file_srs,true);
		$criteria->compare('file_mom',$this->file_mom,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return File the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

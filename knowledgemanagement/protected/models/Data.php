<?php

/**
 * This is the model class for table "tbl_data".
 *
 * The followings are the available columns in table 'tbl_data':
 * @property integer $no
 * @property string $no_br
 * @property string $cr_number
 * @property string $status
 * @property integer $BA
 * @property integer $TS
 * @property integer $SRS
 * @property integer $BRS
 * @property integer $MOM
 * @property string $reflex
 * @property string $application_name
 * @property integer $IT_dev_PIC
 * @property integer $departement_PIC
 * @property integer $IT_testing_PIC
 * @property string $request_date
 * @property string $start_date
 * @property string $end_date
 * @property string $key_achievement
 * @property integer $n_status
 */
class Data extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('no_br, cr_number, BA, TS, SRS, BRS, MOM, application_name, IT_dev_PIC, departement_PIC, IT_testing_PIC, request_date, start_date, end_date, key_achievement, n_status', 'required'),
			array('BA, TS, SRS, BRS, MOM, IT_dev_PIC, departement_PIC, IT_testing_PIC, n_status', 'numerical', 'integerOnly'=>true),
			array('no_br, cr_number', 'length', 'max'=>50),
			array('status, application_name', 'length', 'max'=>100),
			array('reflex', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('no, no_br, cr_number, status, BA, TS, SRS, BRS, MOM, reflex, application_name, IT_dev_PIC, departement_PIC, IT_testing_PIC, request_date, start_date, end_date, key_achievement, n_status', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'no' => 'No',
			'no_br' => 'No Br',
			'cr_number' => 'Cr Number',
			'status' => 'Status',
			'BA' => 'Ba',
			'TS' => 'Ts',
			'SRS' => 'Srs',
			'BRS' => 'Brs',
			'MOM' => 'Mom',
			'reflex' => 'Reflex',
			'application_name' => 'Application Name',
			'IT_dev_PIC' => 'It Dev Pic',
			'departement_PIC' => 'Departement Pic',
			'IT_testing_PIC' => 'It Testing Pic',
			'request_date' => 'Request Date',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'key_achievement' => 'Key Achievement',
			'n_status' => 'N Status',
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

		$criteria->compare('no',$this->no);
		$criteria->compare('no_br',$this->no_br,true);
		$criteria->compare('cr_number',$this->cr_number,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('BA',$this->BA);
		$criteria->compare('TS',$this->TS);
		$criteria->compare('SRS',$this->SRS);
		$criteria->compare('BRS',$this->BRS);
		$criteria->compare('MOM',$this->MOM);
		$criteria->compare('reflex',$this->reflex,true);
		$criteria->compare('application_name',$this->application_name,true);
		$criteria->compare('IT_dev_PIC',$this->IT_dev_PIC);
		$criteria->compare('departement_PIC',$this->departement_PIC);
		$criteria->compare('IT_testing_PIC',$this->IT_testing_PIC);
		$criteria->compare('request_date',$this->request_date,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('key_achievement',$this->key_achievement,true);
		$criteria->compare('n_status',$this->n_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Data the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

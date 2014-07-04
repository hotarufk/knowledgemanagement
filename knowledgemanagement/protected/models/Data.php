<?php

/**
 * This is the model class for table "tbl_data".
 *
 * The followings are the available columns in table 'tbl_data':
 * @property integer $id
 * @property string $no_br
 * @property string $cr_number
 * @property integer $status
 * @property string $reflex
 * @property string $application_name
 * @property integer $user
 * @property string $departement_PIC
 * @property integer $IT_testing_PIC
 * @property string $request_date
 * @property string $start_date
 * @property string $end_date
 * @property integer $key_achievement
 * @property string $month_of_register
 *
 * The followings are the available model relations:
 * @property TblUser $user0
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
			array('no_br, cr_number, status, application_name, user, departement_PIC, IT_testing_PIC, request_date, start_date, key_achievement, month_of_register', 'required'),
			array('status, user, IT_testing_PIC, key_achievement', 'numerical', 'integerOnly'=>true),
			array('no_br, cr_number', 'length', 'max'=>50),
			array('application_name, month_of_register', 'length', 'max'=>100),
			array('reflex, end_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, no_br, cr_number, status, reflex, application_name, user, departement_PIC, IT_testing_PIC, request_date, start_date, end_date, key_achievement, month_of_register', 'safe', 'on'=>'search'),
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
			'user0' => array(self::BELONGS_TO, 'User', 'user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'no_br' => 'No Br',
			'cr_number' => 'Cr Number',
			'status' => 'Status',
			'reflex' => 'Reflex',
			'application_name' => 'Application Name',
			'user' => 'User',
			'departement_PIC' => 'Departement Pic',
			'IT_testing_PIC' => 'It Testing Pic',
			'request_date' => 'Request Date',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'key_achievement' => 'Key Achievement',
			'month_of_register' => 'Month Of Register',
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
		$criteria->compare('no_br',$this->no_br,true);
		$criteria->compare('cr_number',$this->cr_number,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('reflex',$this->reflex,true);
		$criteria->compare('application_name',$this->application_name,true);
		$criteria->compare('user',$this->user);
		$criteria->compare('departement_PIC',$this->departement_PIC,true);
		$criteria->compare('IT_testing_PIC',$this->IT_testing_PIC);
		$criteria->compare('request_date',$this->request_date,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('key_achievement',$this->key_achievement);
		$criteria->compare('month_of_register',$this->month_of_register,true);

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
	
	//fungsi untuk memrubah kode angka menjadi  textdomain
	
	function KAchievementText($val){
		return $val == 1 ? 'Achieved' : 'not Achieved';
	}

	function StatusText($val){
		$text=' ';
		switch ($val) {
		  case 1 :
			$text='Pre-Register';
			break;
		  case 2 :
			$text='In Progress';
			break;
		  case 3 :
			$text='Closed-Cancelled';
			break;
		  case 4 :
			$text='Closed-Pending';
			break;
		  case 5 :
			$text='Closed-Finished';
			break;
		  default:
			$text='error data invalid !';
		}
		return $text;
	}
		//1'=>'I GP Witraguna','2'=>'Setiawan','3'=>'Sofie Y chaerang','4'=>'Tulus Hamdani'
		function TestingPICText($val){
		$text=' ';
		switch ($val) {
		  case 1 :
			$text='I GP Witraguna';
			break;
		  case 2 :
			$text='Setiawan';
			break;
		  case 3 :
			$text='Sofie Y Chaerang';
			break;
		  case 4 :
			$text='Tulus Hamdani';
			break;
		  default:
			$text='error data invalid !';
		}
		return $text;
	}
	
		function MORText($val){
		
		$text = explode(".",$val);
		$message = "$val $text[0]";
		switch ($text[0]) {
		case '01' :
			$text='Januari';
			break;
		case '02' :
			$text='Februari';
			break;
		case '03' :
			$text='Maret';
			break;
		case '04' :
			$text='April';
			break;
		case '05' :
			$text='Mei';
			break;
		case '06' :
			$text='Juni';
			break;
		case '07' :
			$text='Juli';
			break;
		case '08' :
			$text='Agustus';
			break;
		case '09' :
			$text='September';
			break;
		case '10' :
			$text='Oktober';
			break;
		case '11' :
			$text='November';
			break;
		case '12' :
			$text='Desember';
			break;
		default:
			$text='error data invalid !';
		}
		
		$category="Debugging MOR Text";
		Yii::trace($message, $category);
		return $text;
	}
	
}

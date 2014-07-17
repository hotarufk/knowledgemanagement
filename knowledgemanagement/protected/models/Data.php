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


	//kamus
	public $from_date;
	public $to_date;
	
	//function
	
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
			array('start_date,end_date','dateValidator'),
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
		$criteria->with=array('User');
		//$criteria->toghether= true;


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
		
		$criteria->with = array(
			'user0'=>array('select'=>'user.nama'),
		);
		if(!empty($this->from_date) && empty($this->to_date))
        {
            $criteria->condition = "end_date >= '$this->from_date'";  // date is database date column field
        }elseif(!empty($this->to_date) && empty($this->from_date))
        {
            $criteria->condition = "start_date < '$this->to_date'";
        }elseif(!empty($this->to_date) && !empty($this->from_date))
        {
            $criteria->condition = "(start_date  < '$this->to_date' and( end_date >= '$this->from_date' or(start_date!='0000-00-00' and  end_date = '0000-00-00')))";
        }
		
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
	
	public static function KAchievementText($val){
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
	public static function TestingPICText($val){
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
	
	public static function MORText($val){
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
	
	//////////
	public static function dateValidator($attribute,$params)
    {
		//kamus lokal
		$d=mktime(0, 0, 0, 0, 00, 0000);
	
		//function
        if (($this->start_date <$this->end_date) OR ($this->end_date === date("Y-m-d", $d))){
			$message="valid";
			$category="date debugging";
			Yii::trace($message, $category);
		}else{
				$message="invalid";
				$category="date debugging";
				Yii::trace($message, $category);
			$this->addError('start_date', 'date invalid');
		}
		
		if (($this->start_date >$this->request_date) OR ($this->start_date === date("Y-m-d", $d))){
			$message="valid";
			$category="date debugging";
			Yii::trace($message, $category);
		}else{
				$message="invalid";
				$category="date debugging";
				Yii::trace($message, $category);
			$this->addError('start_date', 'date invalid');
		}
		
	
	}

	//fungsi count by date filter and 
	public function countReport($val){ //type di iisi oleh angka
		
		
		//buat criteria
		$criteria=new CDbCriteria;
		//$criteria->with=array('User');
		
		//memastikan ada date filter atau engga
		if(!empty($this->from_date) && empty($this->to_date))
        {
            $criteria->condition = "end_date >= '$this->from_date'";  // date is database date column field
        }elseif(!empty($this->to_date) && empty($this->from_date))
        {
            $criteria->condition = "start_date < '$this->to_date'";
        }elseif(!empty($this->to_date) && !empty($this->from_date))
        {
            $criteria->condition = "start_date  < '$this->to_date' and end_date >= '$this->from_date'";
        }
		
		
		switch ($val) {
		  case 1://status
			$criteria->group='t.status';
			$criteria->select ='count(t.status) as count(status),t.status';
			break;
		  case 2://no_br
			$criteria->group='no_br';
			$criteria->select ='count(no_br),no_br';
			break;
		  case 3://cr_number
			$criteria->group='cr_number';
			$criteria->select ='count(cr_number),cr_number';
			break;
		  case 4://reflex
			$criteria->group='reflex';
			$criteria->select ='count(reflex),reflex';
			break;
		  case 5://application_name
			$criteria->group='application_name';
			$criteria->select ='count(application_name),application_name';
			break;
		  case 6://tbl_user.nama
			$criteria->with = array(
				'user0'=>array('select'=>'count(user.nama),user.nama','group'=>'user.nama'),
			);		  
			//$criteria->group='user.nama';
			//$criteria->select ='count(user.nama),user.nama';
			break;
		  case 7://departement_PIC
			$criteria->group='departement_PIC';
			$criteria->select ='count(departement_PIC),departement_PIC';
			break;
		  case 8://IT_testing_PIC
			$criteria->group='IT_testing_PIC';
			$criteria->select ='count(IT_testing_PIC),IT_testing_PIC';
			break;
		  case 9://key_achievement
			$criteria->group='key_achievement';
			$criteria->select ='count(key_achievement),key_achievement';
			break;
		  case 10://month_of_register
			$criteria->group='month_of_register';
			$criteria->select ='count(month_of_register),month_of_register';
			break;
		  default:
			echo "Your favorite color is neither red, blue, or green!";
		}
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));	
	}
	
	
	
	
	
	
}

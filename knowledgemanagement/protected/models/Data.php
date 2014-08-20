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
			array('no_br, cr_number, status, application_name','required','on'=>'page1'),//rule data di halaman 1 create/update
			array('user,departement_PIC, IT_testing_PIC,key_achievement','required','on'=>'page2'),//rule data di halaman 2 create/update
			array('month_of_register,request_date', 'required','on'=>'page3'),//rule data di halaman 3 create/update
			array('status, user, IT_testing_PIC, key_achievement', 'numerical', 'integerOnly'=>true),
			array('no_br, cr_number', 'length', 'max'=>50,'allowEmpty'=>false),
			//array('no_br, cr_number,application_name','exist','allowEmpty'=>false,'on'=>'page1'),//rule data gak boleh blank
			array('application_name, month_of_register,reflex', 'length','max'=>100,'allowEmpty'=>false),
			array('reflex,end_date', 'safe'),
			//array('request_date,start_date,end_date', 'date', 'format'=>'yyyy-mm-dd','on'=>'page3'),
			array('month_of_register', 'date', 'format'=>'mm.yyyy'),
			array(
            'no_br, cr_number,departement_PIC,application_name',
            'match', 'not' => true, 'pattern' => '/[^a-zA-Z0-9_-]/',
			'on'=>'page1,page2,page3',
            'message' => 'Invalid characters. Only use a-z , A-Z , 0-9 , _ , or -',
            ),
			array('request_date,start_date,end_date','dateValidator','on'=>'page3'),//rule data di halaman 3 mengenai penanggalan
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
			'tblFiles' => array(self::HAS_MANY, 'TblFile', 'id'),
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
	public function dateValidator($attribute,$params)
    {
		//kamus lokal
		$d=mktime(0, 0, 0, 0, 00, 0000);
		$message ='start date : '.$this->start_date.'  end date : '.$this->end_date;
		$category = 'date initial in validator cek value';
		Yii::trace($message, $category);
		//function
        if (($this->start_date <= $this->end_date) OR ($this->end_date === date("Y-m-d", $d))OR ($this->end_date === "")){
			$message="valid";
			$category="date debugging";
			Yii::trace($message, $category);
		}else{
				$message="invalid";
				$category="date debugging";
				Yii::trace($message, $category);
			$this->addError('start_date', 'Start date invalid, must be >= than end Date');
		}
		
		if (($this->start_date >= $this->request_date) OR ($this->start_date === date("Y-m-d", $d)) OR ($this->start_date === "")){
			$message="valid";
			$category="date debugging";
			Yii::trace($message, $category);
		}else{
				$message="invalid , start date : ".$this->start_date."   request Date : ".$this->request_date;
				$category="date debugging";
				Yii::trace($message, $category);
			$this->addError('request_date', 'Request Date invalid, must be <= Start Date');
		}
		
	
	}
	
	
	
}

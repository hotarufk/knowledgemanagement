<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $nama
 * @property integer $role
 *
 * The followings are the available model relations:
 * @property TblData[] $tblDatas
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('nama,role', 'required','on'=>'create,update'),
            array('username, password', 'required'),
			array('username,nama','unique','message'=>'This username already exists.'),
            array(
            'username,password',
            'match', 'not' => true, 'pattern' => '/[^a-zA-Z0-9_-]/',
            'on'=>'create,update,login',
            'message' => 'Invalid characters in username/password. Only use a-z , A-Z , 0-9 , _ , or -',
            ),
			array('role', 'numerical', 'integerOnly'=>true),
			array('username, password, nama', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, nama, role', 'safe', 'on'=>'search'),
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
			'tblDatas' => array(self::HAS_MANY, 'TblData', 'user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'nama' => 'Nama',
			'role' => 'Role',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('role',$this->role);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	////////
	    
    //Custom Validation
    public function passwordStrength($attribute,$params)
    {
        if ($params['strength'] === self::WEAK)
            $pattern = '/^(?=.*[a-zA-Z0-9]).{5,}$/';  
        elseif ($params['strength'] === self::STRONG)
            $pattern = '/^(?=.*\d(?=.*\d))(?=.*[a-zA-Z](?=.*[a-zA-Z])).{5,}$/';  
     
        if(!preg_match($pattern, $this->$attribute))
          $this->addError($attribute, 'your password is not strong enough!');
    }
	
	
	///
	public function roleText($val){
	$text=' ';
		switch ($val) {
		  case 0 :
			$text='Administrator';
			break;
		  case 1 :
			$text='User';
			break;
		  default:
			$text='error data invalid !';
		}
		return $text;
	
	
	}

}

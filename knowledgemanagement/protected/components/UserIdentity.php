<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	private $_id;
    public function authenticate()
    {
        $record=User::model()->findByAttributes(array('username'=>$this->username));
		// This is in the PHP file and sends a Javascript alert to the client
		//$message = $this->password;
		//echo "<script type='text/javascript'>alert('$message');</script>";
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->password!==$this->password)
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
        {
            $this->_id=$record->id;
			if($record->role == 1)
				$this->setState('roles','user');
			else if ($record->role == 0)
				$this->setState('roles','admin');
            $this->errorCode=self::ERROR_NONE;
        }
		//$message=$record->password;
		//$category="emon.debug.authenticate";
		//Yii::trace($message, $category);
		//echo "<script type='text/javascript'>alert('$message');</script>";
        return !$this->errorCode;
    }
 
    public function getId()
    {
        return $this->_id;
    }
	
}
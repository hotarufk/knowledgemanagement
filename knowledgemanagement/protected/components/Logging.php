<?php 
 
class Logging extends CApplicationComponent
{
    private $_model=null;
 
 
    public function setModel($id)
    {
        $this->_model=Log::model()->findByPk($id);
    }
 
    public function getModel()
    {
        if (!$this->_model)
        {
            if (isset($_GET['Log']))
                $this->_model=Log::model()->findByAttributes(array('url_name'=> $_GET['Log']));
            else
                $this->_model=Log::model()->find();
        }
        return $this->_model;
    }
 
    public function getId()
    {
        return $this->model->id;
    }
 
    // public function getName()
    // {
        // return $this->model->name;
    // }
	
	//create Log
	public function AutoLog($jenis,$text,$userid){
		 $this->_model =new Log;
		$data = array(
			"user" => $userid,
			"Keterangan" => $text,
			"Jenis"=>$jenis,
			"timestamp"=> date("Y-m-d"), 
		);
		
		 $this->_model->setAttributes($data,false);
		//_model->save();
		if( $this->_model->save())
			Yii::trace("log added !","do Log");
		else
			Yii::trace("log gagal :v !","do Log");
		
		}
}
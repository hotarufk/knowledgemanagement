<?php 
 
class FileTrigger extends CApplicationComponent
{
    private $_model=null;
 
 
    public function setModel($id)
    {
        $this->_model=File::model()->findByPk($id);
    }
 
    public function getModel()
    {
        if (!$this->_model)
        {
            if (isset($_GET['Log']))
                $this->_model=File::model()->findByAttributes(array('url_name'=> $_GET['Log']));
            else
                $this->_model=File::model()->find();
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
	public function AutoFile($id){
		$this->_model =new File;
		$data = array(
			"id" => $id,
		);
		
		 $this->_model->setAttributes($data,false);
		//_model->save();
		if( $this->_model->save())
			Yii::trace("File added !","do File");
		else
			Yii::trace("File gagal :v !","do File");
		
		}
}
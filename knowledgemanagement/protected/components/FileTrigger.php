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
		
	public function Download($id,$jenis){
		$this->_model=File::model()->findByPk($id);
		$name;
		$text;
		$file;
		$success= false;
		if($this->_model===null){
			//redirect to create file model
			AutoFile($id);
			$this->_model=File::model()->findByPk($id);
			//$this->redirect(array('create','id'=>$id));
		}
					Yii::trace("try download !","do File");
		echo "<script>alert('download test');</script>";
		switch ($jenis) {
			  case 1 :
				$file='file_ba';
				break;
			  case 2 :
				$file='file_ts';
				break;
			  case 3 :
				$file='file_testscenario';
				break;
			  case 4 :
				$file='file_brs';
				break;
			  case 5 :
				$file='file_srs';
				break;
			  case 6 :
				$file='file_mom';			
				break;
			  default:
				$file='error data invalid !';
		}
		if($model[$file] != null){
			$text = explode("/",$this->_model[$file]);
			$name = $text[1];
			if( file_exists( $this->_model[$file] ) ){
				//extension harus ada di nama
				Yii::app()->getRequest()->sendFile( $name , file_get_contents($this->_model[$file]) );
				$success = true;
			}
		}
		else{
			Yii::app()->user->setFlash('error', "Data not found, plese upload corresponding file !");
			//$this->render('download404');
		}
	
		//return $success;
	}
	public function delete($id){
		$this->setModel($id);
		
		//loop delete file fisik nya
		$jenis;
		$file;
		for ($jenis=1; $jenis<=6; $jenis++) {
			switch ($jenis) {
			  case 1 :
				$file='file_ba';
				break;
			  case 2 :
				$file='file_ts';
				break;
			  case 3 :
				$file='file_testscenario';
				break;
			  case 4 :
				$file='file_brs';
				break;
			  case 5 :
				$file='file_srs';
				break;
			  case 6 :
				$file='file_mom';			
				break;
			  default:
				$file='error data invalid !';
		}
			
			if(!empty($this->_model[$file])){
					unlink($this->_model[$file]);
			}
		}
		$this->_model->delete();
	}
}
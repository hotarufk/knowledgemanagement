<?php

class FileController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update','download'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','index','view'),
				//'users'=>array('admin'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new File;
		$data;
		
		if(isset($_GET['id'])){
				$id = $_GET['id'];
				$data = array(
				"id"=>$id,
				);
			$model->setAttributes($data,false);
		}
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	// $type = isset($_GET['type']) ?
	//$_GET['type'] : 'post';
		$document_name='';
		if(isset($_POST['File']))
		{
			$id;
			$model->attributes=$_POST['File'];
		$path;
		$extension;
			//// Pastikan File di upload
			if(isset($model['file_test'])){
			$model->file_test= CUploadedFile::getInstance($model,'file_test'); //testscenario
			$path = realpath(Yii::app()->basePath.'/../document/file_testscenario');
			$extension = strtolower($model->file_test->extensionName);
			$model->file_testscenario = $path.'/file_testscenario-'.$model->id.'.'.$extension;
			}
			// $model->ba= CUploadedFile::getInstance($model,'ba'); //ba
			// $path = realpath(Yii::app()->basePath.'/../document/file_ba');
			// $model->file_ba = Yii::app()->basePath.'/../document/file_ba'.$model->ba;
			
			// $model->ts= CUploadedFile::getInstance($model,'ts'); //ts
			// $path = realpath(Yii::app()->basePath.'/../document/file_ts');
			// $model->file_ts = Yii::app()->basePath.'/../document/file_ts'.$model->ts;
			
			// $model->brs= CUploadedFile::getInstance($model,'brs'); //brs
			// $path = realpath(Yii::app()->basePath.'/../document/file_brs');
			// $model->file_brs = Yii::app()->basePath.'/../document/file_brs'.$model->brs;
			
			// $model->srs= CUploadedFile::getInstance($model,'srs'); //srs
			// $path = realpath(Yii::app()->basePath.'/../document/file_srs');
			// $model->file_srs = Yii::app()->basePath.'/../document/file_srs'.$model->srs;
			
			// $model->mom= CUploadedFile::getInstance($model,'mom'); //mom
			// $path = realpath(Yii::app()->basePath.'/../document/file_mom');
			// $model->file_mom = Yii::app()->basePath.'/../document/file_mom'.$model->mom;
			
			Yii::trace('ini path nya : '.$path,"path");
			if($model->save()){
                $model->file_test->saveAs($model->file_testscenario);	
				// $model->ba->saveAs($path. '/' . $model->id);
				// $model->ts->saveAs($path. '/' . $model->id);	
				// $model->brs->saveAs($path. '/' . $model->id);	
				// $model->srs->saveAs($path. '/' . $model->id);	
				// $model->mom->saveAs($path. '/' . $model->id);					
				$this->redirect(array('view','id'=>$model->id));
			}			
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['File']))
		{
			$model->attributes=$_POST['File'];
			$path;$extension;
			if(isset($model['file_test'])){
			$model->file_test= CUploadedFile::getInstance($model,'file_test'); //testscenario
			$path = realpath(Yii::app()->basePath.'/../document/file_testscenario');
			$extension = strtolower($model->file_test->extensionName);
			$model->file_testscenario = $path.'/file_testscenario-'.$model->id.'.'.$extension;
			}			
			// $model->ba= CUploadedFile::getInstance($model,'ba'); //ba
			// $path = realpath(Yii::app()->basePath.'/../document/file_ba');
			// $model->file_ba = Yii::app()->basePath.'/../document/file_ba'.$model->ba;
			
			// $model->ts= CUploadedFile::getInstance($model,'ts'); //ts
			// $path = realpath(Yii::app()->basePath.'/../document/file_ts');
			// $model->file_ts = Yii::app()->basePath.'/../document/file_ts'.$model->ts;
			
			// $model->brs= CUploadedFile::getInstance($model,'brs'); //brs
			// $path = realpath(Yii::app()->basePath.'/../document/file_brs');
			// $model->file_brs = Yii::app()->basePath.'/../document/file_brs'.$model->brs;
			
			// $model->srs= CUploadedFile::getInstance($model,'srs'); //srs
			// $path = realpath(Yii::app()->basePath.'/../document/file_srs');
			// $model->file_srs = Yii::app()->basePath.'/../document/file_srs'.$model->srs;
			
			// $model->mom= CUploadedFile::getInstance($model,'mom'); //mom
			// $path = realpath(Yii::app()->basePath.'/../document/file_mom');
			// $model->file_mom = Yii::app()->basePath.'/../document/file_mom'.$model->mom;
			
			//Yii::trace('ini path nya : '.$path,"path");
			if($model->save()){
				if(isset($model['file_test'])) 
					$model->file_test->saveAs($model->file_testscenario);	
				// $model->ba->saveAs($path. '/' . $model->id);
				// $model->ts->saveAs($path. '/' . $model->id);	
				// $model->brs->saveAs($path. '/' . $model->id);	
				// $model->srs->saveAs($path. '/' . $model->id);	
				// $model->mom->saveAs($path. '/' . $model->id);					
				//$this->redirect(array('view','id'=>$model->id));
				$this->redirect(array('data/view','id'=>$model->id));
			}			
		}
		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('File');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new File('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['File']))
			$model->attributes=$_GET['File'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return File the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=File::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param File $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='file-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionDownload($id,$jenis){
	$model=File::model()->findByPk($id);
	$name;
	$text;
	$file;
	if($model===null){
		//redirect to create file model
		Yii::app()->fileTrigger->AutoFile($id);
		$model=File::model()->findByPk($id);
		//$this->redirect(array('create','id'=>$id));
	}
	
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
	if(isset($model[$file])){
		$text = explode("/",$model[$file]);
		$name = $text[1];
		if( file_exists( $model[$file] ) ){
			//extension harus ada di nama
			Yii::app()->getRequest()->sendFile( $name , file_get_contents( $model[$file]) );
		}
		else
			Yii::app()->user->setFlash('error', "Data not found, plese upload corresponding file !");
	}
	else{
		Yii::app()->user->setFlash('error', "Data not found, plese upload corresponding file !");
		//$this->render('download404');
		}
	}
	
}

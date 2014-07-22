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
				'actions'=>array('create','update','index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	// $type = isset($_GET['type']) ?
	//$_GET['type'] : 'post';
		if(isset($_POST['File']))
		{
			$model->attributes=$_POST['File'];
			if ($model->file_ba=CUploadedFile::getInstance($model,'file_ba')){
				 $model->data=file_get_contents($model->file_ba->tempName);
        $model->file_ba->mime=$file_ba->type;
		};
			if ($model->file_ts=CUploadedFile::getInstance($model,'file_ts')){
				 $model->data=file_get_contents($model->file_ts->tempName);
        $model->file_ts->mime=$file_ts->type;
		};
			if ($model->file_testscenario=CUploadedFile::getInstance($model,'file_testscenario')){
				 $model->data=file_get_contents($model->file_testscenario->tempName);
        $model->file_testscenario->mime=$file_testscenario->type;
		};
			if ($model->file_brs=CUploadedFile::getInstance($model,'file_brs')){
				 $model->data=file_get_contents($model->file_brs->tempName);
        $model->file_brs->mime=$file_brs->type;
		};
			if ($model->file_srs=CUploadedFile::getInstance($model,'file_srs')){
				 $model->data=file_get_contents($model->file_srs->tempName);
        $model->file_srs->mime=$file_srs->type;
		};
			if ($model->file_mom=CUploadedFile::getInstance($model,'file_mom')){
				 $model->data=file_get_contents($model->file_mom->tempName);
        $model->file_ba->mime=$file_mom->type;
		};
			if($model->validate()){
				$model->file_ba->saveAs(Yii::app()->baseUrl.'/source/file_ba/'.$model->file_ba); //'localhost/knowledgedb/knowledgemanagement/source/file_ba'
				$model->file_ts->saveAs(Yii::app()->baseUrl.'/source/file_ts/'.$model->file_ts); //'localhost/knowledgedb/knowledgemanagement/source/file_ts'
				$model->file_testscenario->saveAs(Yii::app()->baseUrl.'/source/file_testscenario/'.$model->file_testscenario); //'localhost/knowledgedb/knowledgemanagement/source/file_testscenario'
				$model->file_brs->saveAs(Yii::app()->baseUrl.'/source/file_brs/'.$model->file_brs); //'localhost/knowledgedb/knowledgemanagement/source/file_brs'
				$model->file_srs->saveAs(Yii::app()->baseUrl.'/source/file_srs/'.$model->file_srs); //'localhost/knowledgedb/knowledgemanagement/source/file_srs'
				$model->file_mom->saveAs(Yii::app()->baseUrl.'/source/file_mom/'.$model->file_mom); //'localhost/knowledgedb/knowledgemanagement/source/file_mom'
				$this->redirect(array('view','id'=>$model->id));}
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
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
}

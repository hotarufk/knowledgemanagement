<?php

class DataController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','report','test'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','report'),
				'roles'=>array('admin'),
				//'users'=>array('@'),//isi admin agar hanya admin yang bisa membukanya
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
		$model=new Data;
		$view='_page1';
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		
		if(isset($_POST['page1']))
		{
			$model = new Data('page1');
			$this->checkPageState($model, $_POST['Data']);
			$view = '_page1';
			$model->scenario = 'page1';
		}
		elseif(isset($_POST['page2']))
		{
			$model = new Data('page1');
			$this->checkPageState($model, $_POST['Data']);
			if($model->validate())
			{
				$view = '_page2';
				$model->scenario = 'page2';
			}
			else
			{
				$model->scenario = 'page1';
				$view = '_page1'; //or page 3 sih
			}
		}
		elseif(isset($_POST['page3']))
		{
			$model = new Data('page2');
			$this->checkPageState($model, $_POST['Data']);
			if($model->validate())
			{
				$view = '_page3';
				$model->scenario = 'page3';
			}
			else
			{
				$model->scenario = 'page2';
				$view = '_page2';
			}
		}
		elseif(isset($_POST['create']))
		{	
			$model = new Data('page3');
			$this->checkPageState($model, $_POST['Data']);
			//$model->attributes=$_POST['Data'];
			if($model->save()){
				$jenis=1;// 1 == create
				
				$text = "Data dengan ID ".$model->id." telah dibuat" ;
				$userid=Yii::app()->user->getId();
		
				Yii::app()->logging->AutoLog($jenis,$text,$userid);
				Yii::app()->fileTrigger->AutoFile($model->id);
				$this->redirect(array('view','id'=>$model->id));
				
				}
			else
			{			
				$model->scenario = 'page3';
				$view = '_page3';
			}
		}
		
		$this->render($view,array(
			'model'=>$model,
		));		
	}
	
	///validation function
	private function checkPageState(&$model, $data)
	{
		$model->attributes = $this->getPageState('page',
		array());
		$model->attributes = $data;
		$this->setPageState('page', $model->attributes);
	}	

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$view='_page1';
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		
		
		if(isset($_POST['page1']))
		{
			//$model = new Data('page1');
			$this->checkPageState($model, $_POST['Data']);
			$view = '_page1';
			$model->scenario = 'page1';
		}
		elseif(isset($_POST['page2']))
		{
			//$model = new Data('page1');
			$this->checkPageState($model, $_POST['Data']);
			if($model->validate())
			{
				$view = '_page2';
				$model->scenario = 'page2';
			}
			else
			{
				$model->scenario = 'page1';
				$view = '_page1'; //or page 3 sih
			}
		}
		elseif(isset($_POST['page3']))
		{
			//$model = new Data('page2');
			$this->checkPageState($model, $_POST['Data']);
			if($model->validate())
			{
				$view = '_page3';
				$model->scenario = 'page3';
			}
			else
			{
				$model->scenario = 'page2';
				$view = '_page2';
			}
		}
		elseif(isset($_POST['create']))
		{	
			$model = new Data('page3');
			$this->checkPageState($model, $_POST['Data']);
			//$model->attributes=$_POST['Data'];
			if($model->save()){
				
				$jenis=2;//update
				$text = "data dengan id ".$model->id." telah di update" ;
				$userid=Yii::app()->user->getId();;
				
				Yii::app()->logging->AutoLog($jenis,$text,$userid);
				
				$this->redirect(array('view','id'=>$model->id));
				
				}
			else
			{			
				$model->scenario = 'page3';
				$view = '_page3';
			}
		}
		
		$this->render($view,array(
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

		//create log for delete
				$jenis=3;//delete
				$text = "data dengan id ".$model->id." telah di delete" ;
				$userid=Yii::app()->user->getId();;
				
				Yii::app()->logging->AutoLog($jenis,$text,$userid);
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
	$model=new Data('search');  // your model
	$model->unsetAttributes();  // clear any default values
	 
	  if(!empty($_POST))
	  {
		Yii::app()->request->cookies['Bulan'] = new CHttpCookie('Bulan', $_POST['Bulan']);  // define cookie for from_date
		Yii::app()->request->cookies['year'] = new CHttpCookie('year', $_POST['year']);
		
		$from=mktime(0, 0, 0, $_POST['Bulan'],1,$_POST['year']);
		$to=mktime(0, 0, 0,$_POST['Bulan']+1,1,$_POST['year']);
		$model->from_date = date("Y-m-d", $from);
		$model->to_date = date("Y-m-d", $to);
		
		Yii::app()->request->cookies['from_date'] = new CHttpCookie('from_date',$model->from_date );  // define cookie for from_date
		Yii::app()->request->cookies['to_date'] = new CHttpCookie('to_date', $model->to_date);
		
		$message = 'from date : '.$model->from_date.'  to_date :  '.$model->to_date;
		$category = 'tarik data bulanan report';
		Yii::trace($message, $category);
	}	
	/////////////////////
		if(isset($_GET['Data']))
			$model->attributes=$_GET['Data'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
	$model=new Data('search');  // your model
	$model->unsetAttributes();  // clear any default values
	 
	  if(!empty($_POST))
	  {
		Yii::app()->request->cookies['from_date'] = new CHttpCookie('from_date', $_POST['from_date']);  // define cookie for from_date
		Yii::app()->request->cookies['to_date'] = new CHttpCookie('to_date', $_POST['to_date']);
		$model->from_date = $_POST['from_date'];
		$model->to_date = $_POST['to_date'];
	}	
		/////////////////////
		if(isset($_GET['Data']))
			$model->attributes=$_GET['Data'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionReport()
	{ 
	$model=new Data('search');  // your model
	$model->unsetAttributes();  // clear any default values
	 
	  if(!empty($_POST))
	  {
		Yii::app()->request->cookies['Bulan'] = new CHttpCookie('Bulan', $_POST['Bulan']);  // define cookie for from_date
		Yii::app()->request->cookies['year'] = new CHttpCookie('year', $_POST['year']);
		
		$from=mktime(0, 0, 0, $_POST['Bulan'],1,$_POST['year']);
		$to=mktime(0, 0, 0,$_POST['Bulan']+1,1,$_POST['year']);
		$model->from_date = date("Y-m-d", $from);
		$model->to_date = date("Y-m-d", $to);
		
		Yii::app()->request->cookies['from_date'] = new CHttpCookie('from_date',$model->from_date );  // define cookie for from_date
		Yii::app()->request->cookies['to_date'] = new CHttpCookie('to_date', $model->to_date);
		
		$message = 'from date : '.$model->from_date.'  to_date :  '.$model->to_date;
		$category = 'tarik data Module Report';
		Yii::trace($message, $category);
	}	
		/////////////////////
		if(isset($_GET['Data']))
			$model->attributes=$_GET['Data'];

		$this->render('report',array(
			'model'=>$model,
		));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Data the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Data::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Data $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='data-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/////////////////////////////////
	 public function behaviors()
    {
        return array(
            'eexcelview'=>array(
                'class'=>'ext.eexcelview.EExcelBehavior',
            ),
        );
    }
	
		public function actionTest()
	{
		//date Range
		$valueEnd = isset(Yii::app()->request->cookies['to_date'])?Yii::app()->request->cookies['to_date']->value: '9999-00-00';
		$valueStart =  isset(Yii::app()->request->cookies['from_date'])?Yii::app()->request->cookies['from_date']->value: '0000-00-00';
		$sqlQuery = "SELECT `tbl_data`.`id` as `id` ,`no_br` , `cr_number` , case `status` when '1' then 'Pre-Register' when '2' then 'In Progress' when '3' then 'Closed-Cancelled' when '4' then 'Closed-Pending' when '5' then 'Closed-Finished' else 'Unon' end 'Status', `reflex` , `application_name`, `b`.nama as `IT_DEV_PIC`, `departement_PIC` as `Departement_PIC`, case `IT_testing_PIC` when '1' then 'I GP Witraguna' when '2' then 'Setiawan' when '3' then 'Sofie Y Chaerang' when '4' then 'Tulus Hamdani' else 'Unon' end 'IT_Testing_PIC', `request_date`, `start_date` , `end_date`, case `key_achievement` when '0' then 'not Achieved' when '1' then 'Achieved' else 'Unon' end 'Key_Achievement', `month_of_register` as `Month_of_Register` from `tbl_data` join `tbl_user` as `b` on `b`.`id` = `tbl_data`.`user` where `start_date` < '$valueEnd' and `end_date` >= '$valueStart'"; 
		//debugging
		$dataProvider=new CSqlDataProvider($sqlQuery, array(
	
		
		));
		$reportname = 'Report '.$valueStart.'-'.$valueEnd;
		//$author=
		//Export it
		$this->toExcel(
		$dataProvider,array(
		'no_br',
		'cr_number',
		'Status',
		'reflex',
		'application_name',
		'IT_DEV_PIC',
		'Departement_PIC',
		'IT_Testing_PIC',
		'request_date',
		'start_date',
		'end_date',
		'Key_Achievement',
		'Month_of_Register',
		),
			$reportname,
        array(
            'creator' => 'Zen',
        )
		);
		// $results=$dataProvider->getData();
		 
		$message = 'from date : '.$valueStart.' to date : '.$valueEnd;
		$category ='excel validator';
		//Yii::trace($results, $category);
	}
	
	
	//////////////////////////////////
	
	
}

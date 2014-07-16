<?php

class ItemController extends CController
{
    public function actionCreate()
    {
        $model=new Item;
        if(isset($_POST['Item']))
        {
            $model->attributes=$_POST['Item'];
            $model->files=CUploadedFile::getInstance($model,'files');
			$model->testsc=CUploadedFile::getInstance($model,'testsc');
            if($model->save())
            {
                $model->files->saveAs('source/file');
				$model->testsc->saveAs('source/testsc');
                // redirect to success page
            }
        }
        $this->render('create', array('model'=>$model));
    }
}
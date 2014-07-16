<?php

$form = $this->beginWidget(
    'CActiveForm',
    array(
        'id' => 'upload-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )
);
// ...
echo $form->labelEx($model, 'files');
echo $form->fileField($model, 'files');
echo $form->error($model, 'files');
echo $form->labelEx($model, 'testsc');
echo $form->fileField($model, 'testsc');
echo $form->error($model, 'testsc');

// ...
echo CHtml::submitButton('Submit');
$this->endWidget();
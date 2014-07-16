<?php
class Item extends CActiveRecord
{
    public $files;
	public $testsc;
    // ... other attributes
 
 public function tableName()
	{
		return 'tbl_file';
	}
 
    public function rules()
    {
        return array(
            array('files', 'file', 'types'=>'doc'),
			array('testsc', 'file', 'types'=>'xls, doc, zip'), 
        );
    }
}

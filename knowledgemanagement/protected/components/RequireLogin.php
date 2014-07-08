<?php
class RequireLogin extends CBehavior
{
	public function attach($owner)
	{
		$owner->attachEventHandler('onBeginRequest', array($this, 'handleBeginRequest'));
	}
	public function handleBeginRequest($event)
	{
		if (Yii::app()->user->isGuest && (!isset($_GET['r']) || $_GET['r'] != 'site/login')) {
			Yii::app()->user->loginRequired();
		}
	}
}
?>
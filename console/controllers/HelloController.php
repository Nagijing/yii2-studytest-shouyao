<?php
namespace console\controllers;

use yii\console\Controller;
use common\models\Durg;

class HelloController extends Controller
{
	public $rev;
	
	public function options()
	{
		return ['rev'];
	}
	
	public function optionAliases()
	{
		return['r'=>'rev'];
	}
	
	public function actionIndex()
	{
		if($this->rev == 1)
		{
			echo strrev("Hello World!")."\n";
		}
		else
		{
			echo "Hello World!\n";	
		}
	}
	
	
	/**public function actionIndex() //index 是默认动作
	{
		echo "Hello World! \n";
	}**/
	
	public function actionList()
	{
		$drugs = Drug::find()->all();
		
		foreach ($drugs as $aDrug)
		{
			echo ($aDrug['id']. " - ".$aDrug['drugname'] ."\n");
		}
	}
	
	public function actionWho($name)
	{
		echo ("Hello ". $name . "!\n");
	}
	
	public function actionBoth($name,$another)
	{
		echo ("Hello ".$name." and ". $another ."!\n");
	}
	
	public function actionAll(array $names)
	{
		var_dump($names);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
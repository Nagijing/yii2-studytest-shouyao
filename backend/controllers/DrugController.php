<?php

namespace backend\controllers;

use Yii;
use common\models\Drug;
use common\models\DrugSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
/**
 * DrugController implements the CRUD actions for Drug model.
 */
class DrugController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        	'access' =>[
        		'class' => AccessControl::className(),
        		'rules' =>[
        				[
        						'actions' => ['index'],
        						'allow' => false,
        						'roles' => ['?'],
        				],
        				[
        						'actions' => ['index'],
        						'allow' => true,
        						'roles' => ['@'],
        				],
						
       	],
       	],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Drug models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $searchModel = new DrugSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Drug model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Drug model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		//Yii::$app->user->can()方法是用来对当前用户进行权限检查
		if(!Yii::$app->user->can('createDrug'))
		{
			throw new ForbiddenHttpException('对不起你没有权限访问该页面。');
		}		
        $model = new Drug();
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) 
		{
            return $this->redirect(['view', 'id' => $model->id]);
        } 
		else 
		{
            return $this->render('create', [
                'model' => $model,
            ]);
		}
    }

    /**
     * Updates an existing Drug model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		if(!Yii::$app->user->can('updateDrug'))
		{
			throw new ForbiddenHttpException('对不起你没有权限访问该页面。');
		}
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Drug model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
			if(!Yii::$app->user->can('deleteDrug'))
		{
			throw new ForbiddenHttpException('对不起你没有权限访问该页面。');
		}
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	
	/**public function uploadFiles($name){

        $uploadedFile=Drug::getInstanceByName($name);

        if($uploadedFile === null || $uploadedFile->hasError){
            return '文件不存在';
        }
        //创建时间
        $ymd=date("Ymd");
        //存储到本地的路径
        $save_path=\Yii::getAlias('@uploads').'/'.$ymd.'/';
        //存储到数据库的地址
        $save_url='uploads'.'/'.$ymd.'/';
        //file_exists() 函数检查文件或目录是否存在
        //mkdir() 函数创建目录
        if(!file_exists($save_path)){

            mkdir($save_path);

        }
        //图片名称
        $file_name = $uploadedFile->getBaseName();

        //图片格式
        $file_ext = $uploadedFile->getExtension();

        //新文件名
        $new_file_name=date("YmdHis").'_'.rand(10000,99999).'.'.$file_ext;
        //图片信息
        $uploadedFile->saveAs($save_path.$new_file_name);

        return ['path'=>$save_path,'url'=>$save_url,'name'=>$file_name,'new_name'=>$new_file_name,'ext'=>$file_ext];
    }


	
    public function actionUpload()
    {
        $model = new Drug();

    if($model->load(Yii::$app->request->post()) && $model->validate()){
        

        if($model->save()){

           return $this->redirect(['view', 'id' => $model->id]);
        }
    }
    return $this->render('update',[
        'model'=>$model,
    ]);
    }

    /**
     * Finds the Drug model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Drug the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Drug::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

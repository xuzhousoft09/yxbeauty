<?php

class ProjectController extends Controller
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
				array('allow',
						'actions'=>array('index','view','adduser'),
						'users'=>array('@'),
				),
			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
	/*  public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}   */
	
	public function actionView($id)
	{
		$model=$this->loadModel($id);
		if(!Yii::app()->user->checkAccess('readProject',array('project'=>$model)))
		{
			throw new CHttpException(403,'You are not authorized to per-form this action');
		}
	    $issueDataProvider=new CActiveDataProvider('Issue', array(
	        'criteria'=>array(
	            'condition'=>'project_id=:projectId',
	            'params'=>array(':projectId'=>$this->loadModel($id)->id),
	        ),
	        'pagination'=>array(
	            'pageSize'=>1,
	        ),
	    ));
	    $this->render('view',array(
	        'model'=>$this->loadModel($id),
	        'issueDataProvider'=>$issueDataProvider,
	    ));
	}  

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Project;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(!Yii::app()->user->checkAccess('updateProject',array('project'=>$model)))
		{
			throw new CHttpException(403,'You are not authorized to per-form this action');
		}
		if(isset($_POST['Project']))
		{
			$model->attributes=$_POST['Project'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		/* var_dump(Yii::app()->user->checkAccess('updateProject',array('project'=>$model)));exit; */ //returned fals.
		if(!Yii::app()->user->checkAccess('updateProject',array('project'=>$model)))
		{
			throw new CHttpException(403,'You are not authorized to per-form this action');
		}
		/* $form=new ProjectUserForm; */
		if(isset($_POST['Project']))
		{
			$model->attributes=$_POST['Project'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();
			
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		
		/* if(!Yii::app()->user->checkAccess('readProject',array('project'=>$project)))
		{
			throw new CHttpException(403,'You are not authorized to per-form this action');
		} */
		$dataProvider=new CActiveDataProvider('Project');
	/* 	var_dump($this); */
		/* $this->render('index',array(
			'dataProvider'=>$dataProvider,
		)); */
		
	
	$sysMessage = SysMessage::model()->find(array('order'=>'t.update_time DESC',));
	if($sysMessage != null)
	$message = $sysMessage->message;
	else
	$message = null;
	$this->render('index',array(
	'dataProvider'=>$dataProvider,
	'sysMessage'=>$message,
	));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Project('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Project']))
			$model->attributes=$_GET['Project'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Project::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='project-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAdduser($id)
	{
		$project = $this->loadModel($id);
		if(!Yii::app()->user->checkAccess('createUser',array('project'=>$project)))
		{
			throw new CHttpException(403,'You are not authorized to per-form this action');
		}
		$form=new ProjectUserForm;
		/* var_dump($form); 
		exit;  successfully created a object*/		
		// collect user input data
		if(isset($_POST['ProjectUserForm']))
		{
			$form->attributes=$_POST['ProjectUserForm'];
			$form->project = $project;
			// validate user input and set a sucessfull flassh message if valid
			if($form->validate())
			{
				Yii::app()->user->setFlash('success',$form->username .
						" has been added to the project." );
				$form=new ProjectUserForm;
			}
		}
		// display the add user form
		$users = User::model()->findAll();
		$usernames=array();
		foreach($users as $user)
		{
			$usernames[]=$user->username;
		}
		$form->project = $project;
		$this->render('adduser',array('model'=>$form,
				'usernames'=>$usernames));
	}
}

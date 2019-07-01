<?php

class IssueController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
    
    private $_project = null;
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	
	protected function loadProject($project_id) {
	    //if the project property is null, create it based on input id
	    if($this->_project===null)
	    {
	        $this->_project=Project::model()->findbyPk($project_id);
	        
	        if($this->_project===null)
	        {
	            throw new CHttpException(404,'The requested project does not exist.');
	        }
	    }
	    return $this->_project;
	}
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		    'projectContext + create index admin',
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
			array('allow',  // allow only authenticated users to perform 'index' and 'view' actions
			'actions'=>array('index','view'),
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
				/* array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'users'=>array('deleteIssue'),
				), */
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
		$model=$this->loadModel($id);
		
		$project=$this->loadProject($model->project_id);
		
		$params=array('project'=>$project);
		
		if(Yii::app()->user->checkAccess('readIssue',$params))
		{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));}
		else
		{
		throw new CHttpException(403,'You are not authorized to per-form this action');
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Issue;
		
		$model->project_id = $this->_project->id;
		
		$project=$this->loadProject($model->project_id);
		$params=array('project'=>$project);
		if(!Yii::app()->user->checkAccess('createIssue',$params))
		{
			throw new CHttpException(403,'You are not authorized to per-form this action');
		}
	   
		if(isset($_POST['Issue']))
		{
			 
			
			
			$model->attributes=$_POST['Issue'];
			
			if($model->save())
				
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionUpdate($id)
	{
	
		$model=$this->loadModel($id);        
		$this->loadProject($model->project_id);
		$model->project_id = $this->_project->id;
		$project=$this->loadProject($model->project_id);
		$params=array('project'=>$project);
		if(!Yii::app()->user->checkAccess('updateIssue',$params))
		{
			throw new CHttpException(403,'You are not authorized to per-form this action');
		}
		   
		if(isset($_POST['Issue']))
		{
		    
			$model->attributes=$_POST['Issue'];
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
		
		
		
		/* var_dump(Yii::app()->user->checkAccess('deleteIssue',$params));exit;  */ //returned true
		
		
		if(Yii::app()->request->isPostRequest)
		{
			
			$model=$this->loadModel($id);
			$project=$this->loadProject($model->project_id);
			$params=array('project'=>$project);
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();
			if(!Yii::app()->user->checkAccess('deleteIssue',$params))
			{
				throw new CHttpException(403,'You are not authorized to per-form this action');
			}
			

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	} 
	
	
	

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Issue',array(
		    'criteria'=>array(
		        'condition'=>'project_id=:projectId',
		        'params'=>array(':projectId'=>$this->_project->id),
		    ),
		));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Issue('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Issue']))
			$model->attributes=$_GET['Issue'];

			$model->project_id=$this->_project->id;
			
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
		$model=Issue::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='issue-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function filterProjectContext($filterChain)
	{
	    //set the project identifier based on either the GET or POST input
	    //request variables, since we allow both types for our actions
	    $projectId = null;
	    if(isset($_GET['pid']))
	        $projectId = $_GET['pid'];
	        else
	            if(isset($_POST['pid']))
	                $projectId = $_POST['pid'];
	                $this->loadProject($projectId);
	                //complete the running of other filters and execute the requested action
	                $filterChain->run();
	
}

    public function getProject()
      {
        return $this->_project;
       } 

}
